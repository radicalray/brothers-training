<?php
include_once '../../includes/register.inc.php';
include_once '../../includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Attendance Task Form</title>
        <link rel="stylesheet" type="text/css" href="../styles.css" />
<style>
body {
   background-color: #FEFFE6;
}
</style>
</head>
<?php include("../../includes/header.html"); ?>
<?php include("../../includes/navigation.html"); ?>
   <body>
        <h1>Attendance Task Form</h1>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <b>Please choose the attendance task you wish to perform.</b><br/><br/>
        <form action="attendance_list.php" 
                method="post" 
                name="attendance task form">
            Task:  <select id="attendance_task" name="attendance_task">
        <option value="">-------------------------</option>
        <option value="attendance">Monthly Training Meeting Attendance</option>
        <option value="group_attendance">Weekly Group Meeting Attendance</option>
    </select><br/><br/>
        <input type="submit" value="Go"/>
        </form>
        <br/><br/>Return to the <b><a href="../attendance.html">Attendance page</a></b>.
    </body>
</html>
