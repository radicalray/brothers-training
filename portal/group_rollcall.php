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
        <option value='group mtg 1'>Session 1</option>
        <option value='group mtg 2'>Session 2</option>
        <option value='group mtg 3'>Session 3</option>
        <option value='group mtg 4'>Session 4</option>
        <option value='group mtg 5'>Session 5</option>
        <option value='group mtg 6'>Session 6</option>
        <option value='group mtg 7'>Session 7</option>
        <option value='group mtg 8'>Session 8</option>
        <option value='group mtg 9'>Session 9</option>
        <option value='group mtg 10'>Session 10</option>
        <option value='group mtg 11'>Session 11</option>
        <option value='group mtg 12'>Session 12</option>
        <option value='group mtg 13'>Session 13</option>
        <option value='group mtg 14'>Session 14</option>
        <option value='group mtg 15'>Session 15</option>
        <option value='group mtg 16'>Session 16</option>
        <option value='group mtg 17'>Session 17</option>
        <option value='group mtg 18'>Session 18</option>
        <option value='group mtg 19'>Session 19</option>
        <option value='group mtg 20'>Session 20</option>
        <option value='group mtg 21'>Session 21</option>
        <option value='group mtg 22'>Session 22</option>
        <option value='group mtg 23'>Session 23</option>
        <option value='group mtg 24'>Session 24</option>
        <option value='group mtg 25'>Session 25</option>
        <option value='group mtg 26'>Session 26</option>
        <option value='group mtg 27'>Session 27</option>
        <option value='group mtg 28'>Session 28</option>
        <option value='group mtg 29'>Session 29</option>
        <option value='group mtg 30'>Session 30</option>
        <option value='group mtg 31'>Session 31</option>
        <option value='group mtg 32'>Session 32</option>
        <option value='group mtg 33'>Session 33</option>
        <option value='group mtg 34'>Session 34</option>
        <option value='group mtg 35'>Session 35</option>
        <option value='group mtg 36'>Session 36</option>
    </select></center><br/>
    </div>

    <center><input type="submit" value="Submit" class="application_submit"/></center><br/><br/>
<center>Click <b><a href="../attendance.php">HERE</b></a> to go back.</center><br/><br/>
<>form>

</div>

</body>
</html>
