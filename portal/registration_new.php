<?php include '../includes/register.inc.php'; ?>
<?php include '../includes/functions.php'; ?>

<!Doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title> <?php echo date("Y"); ?> Boston Area Training on Eldership Application Form</title>
</head>
<body>

<?php include("../includes/navigation.php"); ?>

<div class="content">

<center><b><?php echo $year; ?> Boston Area Training on Eldership <br/>Application Form</b></center><br/>

<form action="submit.php" method="post">
    <b>Personal Information</b><br/>
    <div class="application_section">
    First Name (required)<br/>
    <input type="text" id="first_name" name="first_name" size="25" /><br/><br/>

    Last Name (required)<br/>
    <input type="text" id="last_name" name="last_name" size="25" /><br/><br/>

    Home Address (required)<br/>
    <input type="text" id="home_address" name ="home_address" size="25" /><br/><br/>

    City<br/>
    <input type="text" id="city" name ="city" size="25" /><br/><br/>

    State<br/>
    <input type="text" id="state" name ="state" size="25" /><br/><br/>

    ZIP Code<br/>
    <input type="text" id="zip_code" name ="zip_code" size="5" /><br/><br/>

    Age<br/>
    <input type="text" id="age" name="age" size="2" /><br/><br/>

    E-mail (required)<br/>
    <input type="email" id="email" name="email" size="25" /><br/><br/>

    Phone<br/>
    <input type="text" id="phone" name="phone" size="25" /><br/><br/>

    Locality (required)<br/>
    <select id="locality" name="locality">
    <option value="">----</option>
    <option value="Amherst, MA">Amherst, MA</option>
    <option value="Boston, MA">Boston, MA</option>
    <option value="Cambridge, MA">Cambridge, MA</option>
    <option value="Lowell, MA">Lowell, MA</option>
    <option value="Middleboro, MA">Middleboro, MA</option>
    <option value="Newton, MA">Newton, MA</option>
    <option value="Worcester, MA">Worcester, MA</option>
    <option value="North Providence, RI">North Providence, RI</option>
<!--    <php echo get_provinces('../includes/localities.txt');> -->

    </select><br/><br/>

    Marital Status<br/>
    <select id="marital_status" name="marital_status">
      <option value="Married">Married</option>
      <option value="Single">Single</option>
    </select><br/><br/>

    # of Children<br/>
    <input type="text" id="children" name="children" size="2" /><br/>
    </div>

    <b>Personal History</b><br/>
    <div class="application_section">

<!--    Date Saved<br/>
    <input type="text" id="date_saved" name="date_saved" size="25" /><br/><br/>

    Date Baptized<br/>
    <input type="text" id="date_baptized" name="date_baptized" size="25" /><br/><br/>
-->
    Were you raised in the church?<br/>
    <input type="text" id="church_raised" name="church_raised" size="50" /><br/><br/>

    In what year did you begin meeting with the saints?<br/>
    <input type="text" id="date_entered_church" name="date_entered_church" size="50" /><br/><br/>

    What areas of church service you have been involved in?<br/>
    <input type="text" id="services" name="services" size="50" /><br/><br/>

    Have you previously attended a full-time training for at least one full term?<br/>
    <input type="text" id="training" name="training" size="25" /><br/>
    </div>

    <b>Payment</b><br/>
    <div class="application_section">
    Registration fee is <b>$60.00</b> for the training.<br/>
    <ul>
    <li>For training donations by check, please make the check payable to your locality, designated in the 'memo section' for the "GBA Training on Eldership", and give the check (or cash), to a responsible brother in your locality.<br/></li>
    </ul>
<!--    Payment Method:
    <select id="payment_method" name="payment_method">
        <option value="check">Check or cash</option>
    </select><br/><br/>
-->
    <b>Do you want a copy of your application to be sent to your email account?</b><br/>
    <input type="radio" name="email_report" id="email_report" value="1" checked>Yes<br/>
    <input type="radio" name="email_report" id="email_report" value="0">No<br/>
    </div>
    <input type="hidden" name="first_term" id="first_term" value="1"/>
    <center><b>Please only click the submit button once.</b><br/><br/><input type="submit" value="Submit" class="application_submit"/></center><br/><br/>
</form>

</div>

</body>
</html>
