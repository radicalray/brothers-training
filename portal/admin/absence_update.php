<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';

sec_session_start();

$attendance_table = $_POST['attendance_table'];
$user = $_POST['user_id'];
$date = $_POST['training_date'];
$field = $_POST['update_field'];
$value = $_POST['update_value'];

   get_attendance($attendance_table, $user, $date, $mysqli);
   if (mysqli_affected_rows($mysqli) > 0){ // if we already have the record then update
         update_absence($attendance_table, $user, $date, $field, $value, $mysqli);
   }

header("Location:/portal/admin/attendance_list.php?attendance_table=$attendance_table");

?>
