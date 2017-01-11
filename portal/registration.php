<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title>2017 Boston Area Training on Eldership</title>
</head>
<body>

<?php include("../includes/navigation.php"); ?>
<?php include_once("../includes/functions.php"); ?>

<div class="content">
    <center><b>2017 Boston Area Training on Eldership<br/>
    <b>Second Term Registration</b></center><br/>
    <div class="application_section">
        <form method="post"  action="submit_registration_update.php" name="registration_update">
            <b>Note: if you are registering for the first time, please click <u><a href="registration_new.php"/>HERE</a></u>.</b><br/><br/>
            <b>If you are currently in the training, please enter the following information:</b><br/><br/>
               <b>E-mail Address:</b> (Use the same email as the one on your registration form)<br/><br/>
               <input type="text" name="email" id="email" size=40/><br/><br/>
            <b> OR </b><br/><br/>
            <b>First Name:</b><br/>
               <input type="text" name="first_name" id="first_name"/><br/><br/>
               <b>Last Name:</b><br/>
               <input type="text" name="last_name" id="last_name"/><br/><br/>
               <b>Locality:</b><br/>
               <select id="locality" name="locality">
                <option value="">----</option>
<?php echo get_provinces('../includes/localities.txt'); ?>
               </select><br/><br/><br/>
        <input type="submit" value="Submit"/>
    </div>
</div>

</body>
</html>
