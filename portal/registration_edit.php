<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';

sec_session_start();
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title> 2017 Boston Area Training on Eldership Application Form</title>
</head>

<?php include("../includes/navigation.php"); ?>

<body>

<?php

$id = $_GET['id'];
$res = getlist($mysqli, '', '', 'id', $id);
if ($res != 0) {
    $row = $res->fetch_assoc();
    if (!$row) {
        echo "Record not found!!";
    exit;
    }
}
?>

<div class="content">

<center><b>2017 Boston Area Training on Eldership <br/>Application Form</b></center><br/>

<form action="update_registration.php" method="post">
    <b>Edit Personal Information</b><br/>
    <div class="application_section">
    <input type="hidden" name="id" value="<? echo "$row[id]" ?>" />
    First Name (required)<br/>
    <input type="text" id="first_name" name="first_name" size="25" value="<? echo "$row[first_name]" ?>" /><br/><br/>

    Last Name (required)<br/>
    <input type="text" id="last_name" name="last_name" size="25" value="<? echo "$row[last_name]" ?>"/><br/><br/>

    Age<br/>
    <input type="text" id="age" name="age" size="2" value="<? echo "$row[age]" ?>"/><br/><br/>

    E-mail (required)<br/>
    <input type="text" id="email" name="email" size="50" value="<? echo "$row[email]" ?>"/><br/><br/>

    Phone<br/>
    <input type="text" id="phone" name="phone" size="25" value="<? echo "$row[phone]" ?>"/><br/><br/>

    Sending Locality (required)<br/>
    <select id="locality" name="locality">
        <option value="<? echo "$row[locality]" ?>"><? echo "$row[locality]" ?></option>
<?php echo get_provinces('../includes/localities.txt'); ?>

    </select><br/><br/>

    Occupation<br/>
    <input type="text" id="occupation" name="occupation" size="50" value="<? echo "$row[occupation]" ?>"/><br/><br/>

    If you need translation, please specify your language preference<br/>
    <input type="text" id="language" name="language" size="25" value="<? echo "$row[language]" ?>"/><br/>
    </div>

    <b>Edit Personal History</b><br/>
    <div class="application_section">

    Date Saved<br/>
    <input type="text" id="date_saved" name="date_saved" size="25" value="<? echo "$row[date_saved]" ?>"/><br/><br/>

    Date Baptized<br/>
    <input type="text" id="date_baptized" name="date_baptized" size="25" value="<? echo "$row[date_baptized]" ?>"/><br/><br/>

    Were you raised in the church?<br/>
    <input type="text" id="church_raised" name="church_raised" size="50" value="<? echo "$row[church_raised]" ?>"/><br/><br/>

    Date you came into the church<br/>
    <input type="text" id="date_entered_church" name="date_entered_church" size="50" value="<? echo "$row[date_entered_church]" ?>"/><br/><br/>

    Areas of church service you have been involved in<br/>
    <input type="text" id="services" name="services" size="50" value="<? echo "$row[services]" ?>"/><br/><br/>

    Have you previously attended a full-time training for at least one full term?<br/>
    <input type="text" id="training" name="training" size="25" value="<? echo "$row[training]" ?>"/><br/>
    </div>

    <b>Edit Payment</b><br/>
    <div class="application_section">
    Registration fee is <b>$60.00</b> for the training.<br/>
    <ul>
    <li>If you pay by check, give your check to the responsible brother in your locality.<br/></li>
    </ul>
    Payment Method:
    <select id="payment_method" name="payment_method">
        <option value="<? echo "$row[payment_method]" ?>"><? echo "$row[payment_method]" ?></option>
        <option value="check">check</option>
    </select><br/>
    </div>

    <input type="hidden" name="third_term" id="third_term" value="1">
    <center><b>Please only click the submit button once.</b><br/><input type="submit" value="Submit" class="application_submit"/></center>
</form>

</div>

</body>
</html>
