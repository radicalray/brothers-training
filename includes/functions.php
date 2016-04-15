<?php
include_once 'psl-config.php';

function sec_session_start() {
    $session_name = 'sec_session_id';   // Set a custom session name
    $secure = SECURE;
    // This stops JavaScript being able to access the session id.
    $httponly = true;
    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); // Sets the session name to the one set above.
    session_name($session_name);
    session_start();            // Start the PHP session
    session_regenerate_id();    // regenerated the session, delete the old one.
}

function login($username, $password, $mysqli) {
    // Using prepared statements means that SQL injection is not possible.
    if ($stmt = $mysqli->prepare("SELECT id, username, password, salt, locality
        FROM members
       WHERE username = ?
        LIMIT 1")) {
        $stmt->bind_param('s', $username);  // Bind "$username" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();

        // get variables from result.
        $stmt->bind_result($user_id, $username, $db_password, $salt, $locality);
        $stmt->fetch();

        // hash the password with the unique salt.
        $password = hash('sha512', $password . $salt);
        if ($stmt->num_rows == 1) {
            // If the user exists we check if the account is locked
            // from too many login attempts

            if (checkbrute($user_id, $mysqli) == true) {
                // Account is locked
                // Send an email to user saying their account is locked
                return false;
            } else {
                // Check if the password in the database matches
                // the password the user submitted.
                if ($db_password == $password) {
                    // Password is correct!
                    // Get the user-agent string of the user.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // XSS protection as we might print this value
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    // XSS protection as we might print this value
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/",
                                                                "",
                                                                $username);
                    $_SESSION['username'] = $username;
                    $_SESSION['login_string'] = hash('sha512',
                              $password . $user_browser);
                    $_SESSION['locality'] = $locality;
                    // Login successful.
                    return true;
                } else {
                    // Password is not correct
                    // We record this attempt in the database
                    $now = time();
                    $mysqli->query("INSERT INTO login_attempts(user_id, time)
                                    VALUES ('$user_id', '$now')");
                    return false;
                }
            }
        } else {
            // No user exists.
            return false;
        }
    }
}

function checkbrute($user_id, $mysqli) {
    // Get timestamp of current time
    $now = time();

    // All login attempts are counted from the past 2 hours.
    $valid_attempts = $now - (2 * 60 * 60);

    if ($stmt = $mysqli->prepare("SELECT time
                             FROM login_attempts
                             WHERE user_id = ?
                            AND time > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);

        // Execute the prepared query.
        $stmt->execute();
        $stmt->store_result();

        // If there have been more than 5 failed logins
        if ($stmt->num_rows > 5) {
            return true;
        } else {
            return false;
        }
    }
}

function getlist($mysqli, $order_by, $order, $filter_by, $filter) {
    $mysqli->real_escape_string($order_by);
    $mysqli->real_escape_string($order);
    $mysqli->real_escape_string($filter_by);
    $mysqli->real_escape_string($filter);
    $order_sql = '';
    $filter_sql = '';
    $locality = $_SESSION['locality'];
    if ($order_by != '' && $order != '') {
        $order_sql = "ORDER BY $order_by $order";
    }
    if ($filter_by != '' && $filter != '') {

        $filter_sql = "WHERE $filter_by = '$filter' AND locality = '$locality'";

        if (strpos($locality,',') !== false) {
          $filter_sql = "WHERE $filter_by = '$filter' AND locality in ('$locality')";
        }

	if ($locality == 'Admin') {
	  $filter_sql = "WHERE $filter_by = '$filter'";
    	}

    }

    else {
        $filter_sql = "WHERE locality = '$locality'";

	if (strpos($locality,',') !== false) {
	  $filter_sql = "WHERE locality in ('$locality')";
        }

	if ($locality == 'Admin') {
	  $filter_sql = '';
    	}
    }

    if (login_check($mysqli)) {
        // print "SELECT * FROM applications $filter_sql $order_sql";
        $res = $mysqli->query("SELECT * FROM applications $filter_sql $order_sql");
        return $res;
    }
    else {
        return 0;
    }
}

function getsig($mysqli, $id) {
    $mysqli->real_escape_string($id);
    $res = $mysqli->query("SELECT response FROM consecration WHERE application_id = \"$id\" LIMIT 1");
    $row = $res->fetch_assoc();
    return $row['response'];
}

function getemail($mysqli, $id) {
    $mysqli->real_escape_string($id);
    $res = $mysqli->query("SELECT email from applications WHERE id = \"$id\" LIMIT 1");
    $row = $res->fetch_assoc();
    return $row['email'];
}

function approve($mysqli, $id, $approved, $not_approved, $comments) {
    $mysqli->real_escape_string($id);
    $mysqli->real_escape_string($approved);
    $mysqli->real_escape_string($comments);

    if (login_check($mysqli)) {
        if ($not_approved) $approved = 0;
        $query = "UPDATE applications SET approved = \"$approved\", approved_by = \"{$_SESSION['username']}\", approved_date = NOW(), comments = \"$comments\" WHERE id = $id";
        $res = $mysqli->query($query);
    }
}

function verify_payment($mysqli, $id, $payment) {
    $mysqli->real_escape_string($id);
    $mysqli->real_escape_string($payment);
    if (login_check($mysqli)) {
        $mysqli->query("UPDATE applications SET payment_verification = $payment WHERE id = $id");
    }
}

function login_check($mysqli) {
    // Check if all session variables are set
    if (isset($_SESSION['user_id'],
                        $_SESSION['username'],
                        $_SESSION['login_string'])) {

        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];

        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];

        if ($stmt = $mysqli->prepare("SELECT password
                                      FROM members
                                      WHERE id = ? LIMIT 1")) {
            // Bind "$user_id" to parameter.
            $stmt->bind_param('i', $user_id);
            $stmt->execute();   // Execute the prepared query.
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                // If the user exists get variables from result.
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = hash('sha512', $password . $user_browser);

                if ($login_check == $login_string) {
                    // Logged In!!!!
                    return true;
                } else {
                    // Not logged in
                    return false;
                }
            } else {
                // Not logged in
                return false;
            }
        } else {
            // Not logged in
            return false;
        }
    } else {
        // Not logged in
        return false;
    }
}

function esc_url($url) {

    if ('' == $url) {
        return $url;
    }

    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);

    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;

    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }

    $url = str_replace(';//', '://', $url);

    $url = htmlentities($url);

    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);

    if ($url[0] !== '/') {
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}

function code($value) {
    return md5($value + "secret_key");
}

function verify_code($value, $code) {
    if (md5($value + "secret_key") == $code) {
        return True;
    }
    else {
        return False;
    }
}

function get_attendance($attendance_table, $user_id, $date, $mysqli) {
    if (!$date) {
      $res = $mysqli->query("SELECT * FROM $attendance_table WHERE user_id = $user_id");
    } else {
      $res = $mysqli->query("SELECT * FROM $attendance_table WHERE user_id = $user_id and training_date = '$date'");
    }
    return $res;
}

function get_attendance_list($attendance_table, $mysqli) {
    $list = [];
    $res = $mysqli->query("SELECT * FROM $attendance_table");

    while ($row = $res->fetch_assoc()) {
        $list[$row['user_id']][$row['training_date']] = ['status' => $row['status'], 'absence_reason' => $row['absence_reason'], 'makeup_date' => $row['makeup_date']];
    }

    return $list;
}

function update_attendance($attendance_table, $user_id, $date, $status, $reason, $makeup, $mysqli) {
   $res = $mysqli->query("UPDATE $attendance_table SET status = '$status', absence_reason = '$reason', makeup_date = '$makeup' WHERE user_id = '$user_id' and training_date = '$date'");
   return $res;
}

function insert_attendance($attendance_table, $user_id, $date, $status, $reason, $makeup, $mysqli) {

    $query = "INSERT INTO $attendance_table (user_id, training_date, status, absence_reason, makeup_date) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param('sssss', $user_id, $date, $status, $reason, $makeup);
        $stmt->execute();
    }
}

function update_absence($attendance_table, $user_id, $date, $field, $value, $mysqli) {
   if (!strcmp($field,"absence_reason")) {
      $res = $mysqli->query("UPDATE $attendance_table SET absence_reason = '$value' WHERE user_id = '$user_id' and training_date = '$date'");
   } else { // update makeup_date
      $res = $mysqli->query("UPDATE $attendance_table SET makeup_date = '$value' WHERE user_id = '$user_id' and training_date = '$date'");
   }
   return $res;
}

function get_report_list($mysqli, $order_by, $order, $filter_by, $filter) {
    $mysqli->real_escape_string($order_by);
    $mysqli->real_escape_string($order);
    $mysqli->real_escape_string($filter_by);
    $mysqli->real_escape_string($filter);
    $order_sql = '';
    $filter_sql = '';
    $locality = $_SESSION['locality'];

    if ($order_by != '' && $order != '') {
        $order_sql = "ORDER BY $order_by $order";
    }
    if ($filter_by != '' && $filter != '') {

        $filter_sql = "WHERE $filter_by = '$filter' AND locality = '$locality'";

        if (strpos($locality,',') !== false) {
          $filter_sql = "WHERE $filter_by = '$filter' AND locality in ('$locality')";
        }

        if ($locality == 'Admin') {
          $filter_sql = "WHERE $filter_by = '$filter'";
        }


    }
    else {
        $filter_sql = "WHERE locality = '$locality'";

        if (strpos($locality,',') !== false) {
          $filter_sql = "WHERE locality in ('$locality')";
        }

        if ($locality == 'Admin') {
          $filter_sql = "";
        }

    }

    if (login_check($mysqli)) {
        $res = $mysqli->query("SELECT * FROM study_reports $filter_sql $order_sql");
        return $res;
    }
    else {
        return 0;
    }
}

function get_reports($mysqli) {
    $reports = [];
    $res = $mysqli->query("SELECT * FROM study_reports");

    while ($row = $res->fetch_assoc()) {
        $reports[$row['id']][$row['lesson']] = ['attendees' => $row['attendees'], 'study_report' => $row['study_report']];
    }
    return $reports;
}

function get_accounting_list($mysqli, $order_by, $order, $filter_by, $filter) {
    $mysqli->real_escape_string($order_by);
    $mysqli->real_escape_string($order);
    $mysqli->real_escape_string($filter_by);
    $mysqli->real_escape_string($filter);
    $order_sql = '';
    $filter_sql = '';
    $locality = $_SESSION['locality'];

    if ($order_by != '' && $order != '') {
        $order_sql = "ORDER BY $order_by $order";
    }
    if ($filter_by != '' && $filter != '') {

        $filter_sql = "WHERE $filter_by = '$filter' AND locality = '$locality'";

        if (strpos($locality,',') !== false) {
          $filter_sql = "WHERE $filter_by = '$filter' AND locality in ('$locality')";
        }

        if ($locality == 'Admin') {
          $filter_sql = "WHERE $filter_by = '$filter'";
        }

    }
    else {

        $filter_sql = "WHERE locality = '$locality'";

        if (strpos($locality,',') !== false) {
          $filter_sql = "WHERE locality in ('$locality')";
        }

        if ($locality == 'Admin') {
          $filter_sql = "";
        }

    }

    if (login_check($mysqli)) {
        $res = $mysqli->query("SELECT * FROM accounting $filter_sql $order_sql");
        return $res;
    }
    else {
        return 0;
    }
}

function accounting_approve($mysqli, $id, $approved1, $approved2, $payment_comment1, $payment_comment2) {
    $mysqli->real_escape_string($id);
    $mysqli->real_escape_string($approved1);
    $mysqli->real_escape_string($approved2);
    $mysqli->real_escape_string($payment_comment1);
    $mysqli->real_escape_string($payment_comment2);

    if (login_check($mysqli)) {
    	 if($approved1) {
    	 	$query = "UPDATE accounting SET approved1 = \"$approved1\", approved_date1 = NOW(), payment_comment1 = \"$payment_comment1\" WHERE id = $id";
    	 }
    	 else {
         $query = "UPDATE accounting SET approved2 = \"$approved2\", approved_date2 = NOW(), payment_comment2 = \"$payment_comment2\" WHERE id = $id";
       }
    $res = $mysqli->query($query);
    }
}

function get_group_list($mysqli, $order_by, $order, $filter_by, $filter) {
    $mysqli->real_escape_string($order_by);
    $mysqli->real_escape_string($order);
    $mysqli->real_escape_string($filter_by);
    $mysqli->real_escape_string($filter);
    $order_sql = '';
    $filter_sql = '';
    $locality = $_SESSION['locality'];

    if ($order_by != '' && $order != '') {
        $order_sql = "ORDER BY $order_by $order";
    }
    if ($filter_by != '' && $filter != '') {
        $filter_sql = "WHERE $filter_by = '$filter' AND locality = '$locality'";

        if (strpos($locality,',') !== false) {
          $filter_sql = "WHERE $filter_by = '$filter' AND locality in ('$locality')";
        }

        if ($locality == 'Admin') {
          $filter_sql = "WHERE $filter_by = '$filter'";
        }

    }
    else {
        $filter_sql = "WHERE locality = '$locality'";

        if (strpos($locality,',') !== false) {
          $filter_sql = "WHERE locality in ('$locality')";
        }

	if ($locality == 'Admin') {
          $filter_sql = "";
        }

    }

    if (login_check($mysqli)) {
        $res = $mysqli->query("SELECT * FROM study_groups $filter_sql $order_sql");
        return $res;
    }
    else {
        return 0;
    }
}

function get_group($mysqli) {
    $members = [];
    $res = $mysqli->query("SELECT * FROM study_groups");

    while ($row = $res->fetch_assoc()) {
        $members[$row['id']] = ['member_name' => $row['member_name']];
    }
    return $members;
}

function accounting_paid($mysqli, $id, $payment) {
    $mysqli->real_escape_string($id);
    $mysqli->real_escape_string($payment);
    if (login_check($mysqli)) {
        $mysqli->query("UPDATE accounting SET expense_paid = $payment WHERE id = $id");
    }
}

function delete_record($mysqli, $id, $table) {
    $mysqli->real_escape_string($id);
    $mysqli->real_escape_string($table);
    if (login_check($mysqli)) {
        $mysqli->query("DELETE FROM $table WHERE id = $id");
    }
}

function update_link($mysqli, $id, $field, $value) {
    $mysqli->real_escape_string($id);
    $mysqli->real_escape_string($field);
    $mysqli->real_escape_string($value);
    if (login_check($mysqli)) {
        $mysqli->query("UPDATE accounting SET $field = \"$value\" WHERE id = $id");
   }
}

function get_provinces($filename) {

  $provinces = file($filename);
  $options = '';
  foreach ($provinces as $province_line) {
      $province = explode("|", $province_line);
      $options .= '<option value="'.$province[0].'">'.$province[1].'</option>';
  }

  return $options;
}

?>
