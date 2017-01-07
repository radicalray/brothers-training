<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title>2017 Boston Area Training on Eldership Training Mass Update Attendance</title>
</head>
<body>

<?php include("../includes/navigation.php"); ?>

<div class="content">

<center><b>2016 Canada Training on Eldership <br/>Training Meeting Update Attendance Form</b></center><br/>

<form action="admin/attendance_rollcall.php" method="post">
    <input type="hidden" name="attendance_table" value="attendance"/>
    <div class="application_section">
    <b><center>This script will set the Monthly Training Attendance table with 'Present' for any rows that are not marked yet.</b><br/>
    <br/><br/>Please enter the attendance status:<br/><br/>
    <select id="status" name="status">
        <option value=''>------------</option>
	<option value='P'>Present</option>
    </select></center><br/>

    <br/><br/><center>Please enter the training date for the update:<br/><br/>
    <select id="training_date" name="training_date">
        <option value=''>-----------</option>
        <option value='2016-04-16'>04-16-2016</option>
        <option value='2016-05-21'>05-21-2016</option>
        <option value='2016-06-25'>06-25-2016</option>
        <option value='2016-08-06'>08-06-2016</option>
        <option value='2016-09-24'>09-24-2016</option>
        <option value='2016-10-22'>10-22-2016</option>
    </select></center><br/>
    </div>

    <center><input type="submit" value="Submit" class="application_submit"/></center><br/><br/>
<center>Click <b><a href="../portal/attendance.php">HERE</b></a> to go back.</center><br/><br/>
</form>

</div>

</body>
</html>
