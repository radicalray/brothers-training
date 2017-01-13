<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Secure Login: Protected Page</title>
    <link rel="stylesheet" type="text/css" href="../styles.css" />
<style>
body {
   background-color: #FEFFE6;
}
</style>
</head>
<?php include("../../includes/navigation.php"); ?>
<?php include("../../includes/global-config.php"); ?>
<body>

  <div class="report-content">
<?php
    if (login_check($mysqli) == true) :
?>
<h2>Trainee Attendance</h2>
<p class="info">
  Attendence codes: <b>P</b> - Present; <b>U</b> - Unexcused Absence; <b>E</b> - Excused Absence
  <br>
  <i style="color: #c77777; font-weight: bold;">Please do not record lesson viewing attendance; only lesson study sessions.</i>
</p>
<?php
$order_by = $_GET['order_by'];
$order = $_GET['order'];
$filter_by = $_GET['filter_by'];
$filter = $_GET['filter'];
$filter_url = "filter_by=$filter_by&filter=$filter";

$display_values = [
    "first_name" => "First Name",
    "last_name" => "Last Name",
    "locality" => "Locality",
];

if (isset($_GET['attendance_task'])) {
   $attendance_task = $_GET['attendance_task'];
   if ($attendance_task == "attendance") { // we are dealing with training attendancee
      $attendance_table = "attendance";
      $date_array = $training_dates;
   } else {
      $attendance_table = "group_attendance";
      $date_array = $group_dates;
  }
}

if (isset($_GET['attendance_table'])) {
   $attendance_table = $_GET['attendance_table'];
   if ($attendance_table == "attendance") {
      $date_array = $training_dates;
   } else {
      $date_array = $group_dates;
   }
}

if (isset($_POST['submit_attendance_table'])) {
   $attendance_table = $_POST['submit_attendance_table'];
   if ($attendance_table == "attendance") {
      $date_array = $training_dates;
   } else {
      $date_array = $group_dates;
  }
}
$attendance = get_attendance_list($attendance_table, $mysqli);
//print $attendance['8']['2014-12-30'];

$res = getlist($mysqli, $order_by, $order, $filter_by, $filter);
if ($res != 0) {
    echo "<table border=1><tr>";
    foreach (array_keys($display_values) as $key) {
        echo "<th>";
        if ($order_by == $key) {
            if ($order == 'asc') {
                echo "<a href=\"attendance_list.php?attendance_table=$attendance_table&order_by=$key&order=desc&$filter_url\">{$display_values[$key]} &uarr;</a>";
            }
            elseif ($order == 'desc') {
                echo "<a href=\"attendance_list.php?attendance_table=$attendance_table&$filter_url\">{$display_values[$key]} &darr;</a>";
            }
            else {
                echo "<a href=\"attendance_list.php?attendance_table=$attendance_table&order_by=$key&order=desc&$filter_url\">{$display_values[$key]}</a>";
            }
        }
        else {
            echo "<a href=\"attendance_list.php?attendance_table=$attendance_table&order_by=$key&order=asc&$filter_url\">{$display_values[$key]}</a>";
        }
        echo "</th>";
    }
    foreach (array_keys($date_array) as $date) {
        echo "<th>{$date_array[$date]}</th>";
    }
    echo "</tr>";

    $count = 0;
    $excused = [];
    $unexcused = [];
    while ($row = $res->fetch_assoc()) {
        echo "<tr><td>{$row['first_name']}</td>".
             "<td>{$row['last_name']}</td>".
             "<td class='nowrap'>{$row['locality']}</td>";
        foreach(array_keys($date_array) as $date) {
           if ($attendance[$row['id']][$date]) {
             echo "<td><a href=\"attendance.php?attendance_table=$attendance_table&user_id={$row['id']}&date={$date}&code=".code($row['id'] + $date)."\">{$attendance[$row['id']][$date]['status']}</a></td>";
           }
           else {
                echo "<td><a href=\"attendance.php?attendance_table=$attendance_table&user_id={$row['id']}&date={$date}&code=".code($row['id'] + $date)."\">??</a></td>";
           }
           if ($attendance[$row['id']][$date]['status'] == 'E') {
              $excused[$date]++;
           }
           elseif ($attendance[$row['id']][$date]['status'] == 'U') {
              $unexcused[$date]++;
           }
        }
        echo "<td><a href=\"attendance_view.php?attendance_table=$attendance_table&user_id={$row['id']}&first_name={$row['first_name']}&last_name={$row['last_name']}\"><u><b>View</u></b></a></td>";
        echo "</tr>";
        $count++;
    }
    echo "</table>";
    echo "<br/><br/>";
    echo "Total number of trainees: ", $count, "<br/><br/>";
    echo "Number of excused absences on:<br/>";
    foreach(array_keys($date_array) as $date) {
      if (!$excused[$date]) {
        $excused[$date] = 0;
      }
      echo $date, " is ", $excused[$date], "<br/>";
    }
    echo "<br/><br/>Number of unexcused absences on:<br/>";
    foreach(array_keys($date_array) as $date) {
      if (!$unexcused[$date]) {
        $unexcused[$date] = 0;
      }
      echo $date, " is ", $unexcused[$date], "<br/>";
    }
}
?>

        <p>Logged in as: <?php echo htmlentities($_SESSION['username']); ?></p>
<?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span><br/><br/><br/>Please <a href="index.php">login</a>.
    </p>
<?php endif; ?>

    <br/>Click <b><a href="../attendance.php">HERE</b></a> to go back.<br/><br/>
    </div>
</body>
</html>
