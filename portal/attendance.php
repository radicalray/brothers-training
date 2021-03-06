<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title><?php echo date("Y"); ?> Boston Area Training on Eldership Training Attendance Record</title>
</head>
<body>

<?php include("../includes/navigation.php"); ?>

<div class="content">

<center><b><?php echo $year; ?> Boston Area Training on Eldership <br/>Training Attendance</b></center><br/>
    <b>Plenary Session Attendance Tracking</b><br/>
    <div class="application_section">
    Plenary Session Attendance:
    <ol>
    <li>Click <b><a href="/portal/admin/index.php?task=month_attendance">Here</a></b> and login to update the trainee's monthly meeting attendance.</li>

<ol>
    <li>Update the monthly meeting attendance records of trainees from their localities.</li>
    <li>Provide the reasons for the absences and the dates for the make-up lessons.</li>
    <li>Mark the absences as 'unexcused' if they were not notified prior to the training sessions.</li>
    </ol>

    <li>Click <b><a href="training_rollcall.php">Here</a></b> to mark the rest of the trainees in your locality as present.
    </ol>

       </div>

   <b>Study Group Meeting Attendance Tracking</b><br/>
    <div class="application_section">
    Group meeting attendance taker should do the following steps:
    <ol>
    <li>Click <b><a href="/portal/admin/index.php?task=week_attendance">Here</a></b> and login to update the trainee's weekly group study attendance</li>
<ol>
    <li>Update the monthly meeting attendance records of trainees from their localities.</li>
    <li>Provide the reasons for the absences and the dates for the make-up lessons.</li>
    <li>Mark the absences as 'unexcused' if they were not notified prior to the training sessions.</li>
    </ol>
    <li>Click <b><a href="group_rollcall.php">Here</a></b> to mark the rest of the trainees as present.
    </ol>
    </div>
</div>

</body>
</html>
