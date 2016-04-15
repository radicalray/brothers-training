<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';

sec_session_start();

$attendance_table = $_POST['submit_attendance_table'];
$user = $_POST['user_id'];
$date = $_POST['date'];
$code = $_POST['code'];
$status = $_POST['status'];
$type = $_POST['excuse'];
$reason = $_POST['reason'];
if (!$reason) {
    $reason = '';
}
$makeup = $_POST['makeup'];
if (!$makeup) {
    $makeup = '';
}

/*
print "user $user<br/>";
print "date $date<br/>";
print "code $code<br/>";
print "status $status<br/>";
print "type $type<br/>";
print "reason $reason<br/>";
print "makeup $makeup<br/>";
*/

if (!verify_code($user + $date, $code)) {
   print "error";
}
else {
   get_attendance($attendance_table, $user, $date, $mysqli);
   if (mysqli_affected_rows($mysqli) > 0){ // if we already have the record then update
      if ($status != 'absent') {
         $type = 'P';
      }
         update_attendance($attendance_table, $user, $date, $type, $reason, $makeup, $mysqli);
   } else {
     if ($status != 'absent') {
        $type = 'P';
     }
        insert_attendance($attendance_table, $user, $date, $type, $reason, $makeup, $mysqli);
  }
}
header("Location:/portal/admin/attendance_list.php?attendance_table=$attendance_table");

?>
