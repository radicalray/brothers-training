<!DOCTYPE html>
<html>
    <head>
        <title>Secure Login: Log In</title>
        <script type="text/JavaScript" src="js/sha512.js"></script>
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" type="text/css" href="../styles.css" />
    </head>
<?php include("../../includes/navigation.php"); ?>
<body>
<div class="content">
<br/><br/>

    <center><b><?php echo $year; ?> Boston Area Training on Eldership<br/>Register Locality Administrators</b></center><br/>
     <b>For Locality Administrators Only</b>
     <div class="application_section">
        <ul>
        <?php
        if (!$debug) {
            $register_link = "/portal/admin/register.php";
        } else {
            $register_link = "/portal/admin/adminregister.php";
        }
        ?>
        <li><p><b><u><a href="<?= $register_link ?>">Create New Account</a></u></b></p></li>
        <li><p><b><u><a href="reset_password.php">Reset Account Password</a></u></b></p></li>
        </ul>
     </div>
</div>
</body>
</html>
