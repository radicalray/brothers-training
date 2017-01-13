<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title><?php echo date("Y"); ?> Boston Area Training on Eldership Training Mass Update Attendance</title>
</head>
<body>

<?php include("../includes/navigation.php"); ?>

<div class="content">

<center>
    <b>2017 Boston Training on Eldership <br/>
    Plenary Session Update Attendance Form</b>
</center><br/>

<form action="admin/attendance_rollcall.php" method="post">
    <input type="hidden" name="attendance_table" value="attendance"/>
    <div class="application_section">
    <b><center>This script will set the Plenary Session Training Attendance table with 'Present' for any rows that are not marked yet.</b><br/>
    <br/><br/>Please enter the attendance status:<br/><br/>
    <select id="status" name="status">
        <option value=''>------------</option>
	<option value='P'>Present</option>
    </select></center><br/>

    <br/><br/><center>Please enter the Plenary Session date for the update:<br/><br/>
    <select id="training_date" name="training_date">
        <option value=''>-----------</option>
        <?php
        include("../includes/global-config.php");
        foreach($training_dates as $value => $text) {
            echo "<option value='$value'>$text</option>";
        }
        ?>
    </select></center><br/>
    </div>

    <center><input type="submit" value="Submit" class="application_submit"/></center><br/><br/>
<center>Click <b><a href="../portal/attendance.php">HERE</b></a> to go back.</center><br/><br/>
</form>

</div>

</body>
</html>
