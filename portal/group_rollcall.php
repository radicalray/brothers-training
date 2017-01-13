<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title><?php echo date("Y"); ?> Boston Area Training on Eldership Training Mass Update Attendance</title>
</head>
<body>

<?php include("../includes/navigation.php"); ?>

<div class="content">

<center><b><?php echo $year; ?> Boston Area Training on Eldership <br/>Weekly Group Meeting Attendance Update Form</b></center><br/>

<form action="admin/attendance_rollcall.php" method="post">
    <input type="hidden" name="attendance_table" value="group_attendance"/>
    <div class="application_section">
    <center><b>This script will set the Weekly Group Attendance table with 'Present' for any rows that are not marked yet.</b><br/>
    <br/><br/>Please enter the attendance status:<br/><br/>
    <select id="status" name="status">
        <option value=''>------------</option>
	<option value='P'>Present</option>
    </select></center><br/>

    <br/><br/><center>Please select the group meeting for the update:<br/><br/>
    <select id="training_date" name="training_date">
        <option value=''>-----------</option>
        <?php
        include("../includes/global-config.php");
        foreach($group_dates as $value => $text) {
            echo "<option value='$value'>$text</option>";
        }
        ?>
    </select></center><br/>
    </div>

    <center><input type="submit" value="Submit" class="application_submit"/></center><br/><br/>
<center>Click <b><a href="../attendance.php">HERE</b></a> to go back.</center><br/><br/>
<form>

</div>

</body>
</html>
