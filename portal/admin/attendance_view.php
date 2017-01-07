<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>View Attendance</title>
    <link rel="stylesheet" type="text/css" href="../styles.css" />
<style>
body {
   background-color: #FEFFE6;
}
</style>
</head>
<?php include("../../includes/navigation.php"); ?>
<body>
<?php if (login_check($mysqli) == true) : ?>

<?php

$display = [
   "training_date"=>"Training Date",
   "status"=>"Status",
   "absence_reason"=>"Absence Reason",
   "makeup_date"=>"Make-up Date"
];

$attendance_table = $_GET['attendance_table'];
$user_id = $_GET['user_id'];
$first_name = $_GET['first_name'];
$last_name = $_GET['last_name'];

$res = get_attendance($attendance_table, $user_id, '', $mysqli);
if ($res != 0) {
    echo "<center>Attendance record(s) for $first_name $last_name:</center><br/><br/>";
    echo "<table border=1>";
    echo "<tr>";
    foreach (array_keys($display) as $key) {
        echo "<td>{$display[$key]}</td>";
    }
    echo "</tr>";
    while ($row = $res->fetch_assoc()) {
           $training_date = $row['training_date'];
           echo "<tr><td>$training_date</td>".
                "<td>{$row['status']}</td>";
            if ($row['status'] == 'E') {
               if ($row['absence_reason'] == '') {
                  echo "<td><a href=\"absence_submit.php?update_field=absence_reason&attendance_table=$attendance_table&user_id=$user_id&training_date=$training_date\">??</a></td>";
               } else {
                  echo "<td><a href=\"absence_submit.php?update_field=absence_reason&attendance_table=$attendance_table&user_id=$user_id&training_date=$training_date\">{$row['absence_reason']}</a></td>";
               }
            } else {
               echo "<td>{$row['absence_reason']}</a></td>";
            }
            if ($row['status'] == 'E') {
               if ($row['makeup_date'] == '') {
                  echo "<td><a href=\"absence_submit.php?update_field=makeup_date&attendance_table=$attendance_table&user_id=$user_id&training_date=$training_date\">??</a></td>";
               } else {
                  echo "<td><a href=\"absence_submit.php?update_field=makeup_date&attendance_table=$attendance_table&user_id=$user_id&training_date=$training_date\">{$row['makeup_date']}</a></td>";
               }
            } else {
               echo "<td>{$row['makeup_date']}</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "<br/><br/>";
}

        echo "<br/><br/>";
        echo "<a href=\"attendance_list.php?attendance_table=$attendance_table\"><b>BACK</a> to Attendance List | <a href=\"/brotherstraining/portal/index.html\"><b>HOME</a></b>";
        echo "<br /><br/>";
?>

<?php else : ?>
<p>
    <span class="error">You are not authorized to access this page.</span><br/><br/><br/>Please <a href="index.php">login</a>.
</p>
<?php endif; ?>
</body>
</html>
