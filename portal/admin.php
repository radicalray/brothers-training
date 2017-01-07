<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title><?php echo date("Y"); ?> Boston Area Training on Eldership Training Administration</title>
</head>
<body>

<?php include("../includes/navigation.php"); ?>

<div class="content">

<center><b><?php echo $year; ?> Boston Area Training on Eldership <br/>Training Administration</b></center><br/>
    <b>Administrators</b><br>
    <div class="application_section">
    Each locality should designate a brother as the administrator to perform the following tasks for the training:
    <ul>
    <li>Monitor progression of application process</li>
    <li>Approve qualified applications</li>
    <li>Collect payment from trainees who choose to pay by check</li>
    <li>Record attendance and excused absences</li></ul>
    </div>

    <b>Login</b><br/>
    <div class="application_section">
    Click <b><a href="admin/signin.php">Here</a></b> to login.<br><br>
    </div>

    <b>Register</b><br/>
    <div class="application_section">
    Only locality adminstrators will need to register for accounts.<br/>
    To register for a new account:
    <ol type="1">
     <li>Email admin@churchincambridge.org for the username/password to register.</li>
     <li>After you have obtained the username/password, click <b><a href="admin/register.php">Here</a></b> to enter.</li>
     </ol>
    </div>

</div>

</body>
</html>
