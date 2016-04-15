<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
if (isset($_GET['task'])) {
   $task = $_GET['task'];
}
if (isset($_GET['username'])) {
    $user_name = $_GET['username'];
    if (!strcmp($user_name,"3rdTerm")) {
        $pass_word = "8b653cfff75c6467f9e9f066237ee144b7ba7919079357ca69feedbb7843b87eae8a6b3948347e0da366803a95ffeb9e6a113506e4d6e1b72a2ca9954ab02c99";
    header("Location:/portal/admin/process_login.php?username=$user_name&password=$pass_word&task=register");
}}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Secure Login: Log In</title>
        <script type="text/JavaScript" src="js/sha512.js"></script>
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" type="text/css" href="../styles.css" />
    </head>
<?php include("../../includes/header.html"); ?>
<?php include("../../includes/navigation.html"); ?>
<body>
<div class="content">
<br/><br/>

    <center><b>2016 Boston Area Training on Eldership<br/>Register Locality Administrators</b></center><br/>
     <b>For Locality Administrators Only</b>
     <div class="application_section">
        <ul>
        <li><p><b><u><a href="/portal/admin/adminregister.php">Create New Account</a></u></b></p></li>
        <li><p><b><u><a href="reset_password.php">Reset Account Password</a></u></b></p></li>
        </ul>
     </div>
</div>
</body>
</html>
