<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';

sec_session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <link href="signature/assets/jquery.signaturepad.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script type="text/javascript">
    function validateForm()
    {
        var fn = document.forms["report"]["first_name"].value;
        var ln = document.forms["report"]["last_name"].value;
        var lc = document.forms["report"]["locality"].value;
        var em = document.forms["report"]["email"].value;
        var ls = document.forms["report"]["lesson"].value;
        if (fn == null || fn == "")
        {
            alert("Please enter your first name");
            return false;
        }
        else if (ln == null || ln == "")
        {
            alert("Please enter your last name");
            return false;
        }
        else if (lc == null || lc == "")
        {
            alert("Please enter your locality");
            return false;
        }
        else if (em == null || em == "")
        {
            alert("Please enter your email");
            return false;
        }
        else if (ls == null || ls == "")
        {
	    alert("Please enter your lesson number");
            return false;
        }
        else
        {
            return true;
        }
    }
    </script>
    <title>2016 Boston Area Training on Eldership</title>
</head>
<?php include("../includes/header.html"); ?>
<?php include("../includes/navigation.html"); ?>

<body>

<?php

$id = $_GET['id'];
$res = get_report_list($mysqli, '', '', 'id', $id);
if ($res != 0) {
    $row = $res->fetch_assoc();
    if (!$row) {
        echo "not found";
    }
}
?>

<div class="content">
    <center><b>2016 Canada Training on Eldership<br/>
    Group Study Report</b></center><br/>

    <b>Edit Study Reports</b><br/>
    <div class="application_section">
        <form method="post" onsubmit="return validateForm()" action="update_report.php"  name="report">
            <input type="hidden" name="id" value="<? echo "$row[id]"?>" />
            <b>First Name:</b><br/>
            <input type="text" name="first_name" id="first_name" value="<? echo "$row[first_name]"?>" /><br/><br/>
            <b>Last Name:</b><br/>
            <input type="text" name="last_name" id="last_name" value="<? echo "$row[last_name]"?>" /><br/><br/>
            <b>Email:</b><br/>
            <input type="text" name="email" id="email" value="<? echo "$row[email]" ?>" /><br/><br/>
            <b>Locality:</b><br/>
            <select id="locality" name="locality">
                <option value="<? echo "$row[locality]"?>"><? echo "$row[locality]" ?></option>
<?php echo get_provinces('../includes/localities.txt'); ?>

            </select><br/><br/>
        <b>Language:</b><br/>
        <select id="language" name="language">
                <option value="<? echo "$row[language]"?>"><?echo "$row[language]"?></option>
                <option value="English">English</option>
                <option value="Chinese">Chinese</option>
                <option value="French">French</option>
            </select><br/><br/>
       <b>Group Number:</b><br/>(Check with your local administrator if you don't know your group number.)</br>
       <select id="group_no" name="group_no">
                <option value="<? echo "$row[group_no]"?>"><? echo "$row[group_no]"?></option>
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option value=5>5</option>
                <option value=6>6</option>
                <option value=7>7</option>
                <option value=8>8</option>
                <option value=9>9</option>
                <option value=10>10</option>
            </select><br/><br/>   
        <b>Lesson:</b><br/>
        <select id="lesson" name="lesson">
        <option value="<? echo "$row[lesson]"?>"><? echo "$row[lesson]"?></option>
        <option value='Lesson 1'>Lesson 1</option>
        <option value='Lesson 2'>Lesson 2</option>
        <option value='Lesson 3'>Lesson 3</option>  
        <option value='Lesson 4'>Lesson 4</option>  
        <option value='Lesson 5'>Lesson 5</option>  
        <option value='Lesson 6'>Lesson 6</option>  
        <option value='Lesson 7'>Lesson 7</option>  
        <option value='Lesson 8'>Lesson 8</option>  
        <option value='Lesson 9'>Lesson 9</option>  
        <option value='Lesson 10'>Lesson 10</option>  
        <option value='Lesson 11'>Lesson 11</option>  
        <option value='Lesson 12'>Lesson 12</option>  
        <option value='Lesson 13'>Lesson 13</option>  
        <option value='Lesson 14'>Lesson 14</option>  
        <option value='Lesson 15'>Lesson 15</option>  
        <option value='Lesson 16'>Lesson 16</option>  
        <option value='Lesson 17'>Lesson 17</option>  
        <option value='Lesson 18'>Lesson 18</option>  
        <option value='Lesson 19'>Lesson 19</option>  
        <option value='Lesson 20'>Lesson 20</option>  
        <option value='Lesson 21'>Lesson 21</option>  
        <option value='Lesson 22'>Lesson 22</option>  
        <option value='Lesson 23'>Lesson 23</option>  
        <option value='Lesson 24'>Lesson 24</option>  
        <option value='Lesson 25'>Lesson 25</option>  
        <option value='Lesson 26'>Lesson 26</option>  
        <option value='Lesson 27'>Lesson 27</option>  
        <option value='Lesson 28'>Lesson 28</option>  
        <option value='Lesson 29'>Lesson 29</option>  
        <option value='Lesson 30'>Lesson 30</option>  
        <option value='Lesson 31'>Lesson 31</option>  
        <option value='Lesson 32'>Lesson 32</option>  
        <option value='Lesson 33'>Lesson 33</option>  
        <option value='Lesson 34'>Lesson 34</option>  
        <option value='Lesson 35'>Lesson 35</option>  
        <option value='Lesson 36'>Lesson 36</option>  
    </select><br/><br/>
        <b>Attendees:</b><br/>
        <input type="text" name="attendees" id="attendees" size="50" value="<? echo "$row[attendees]"?>"/><br/><br/>
        <b>Absentees:</b><br/>
        <input type="text" name="absentees" id="absentees" size="50" value="<? echo "$row[absentees]"?>"/><br/><br/>
        <b>Study Report: (100-200 words)</b><br/>
        <textarea name="study_report" id="study_report" rows="10" cols="50"><? echo "$row[study_report]"?></textarea><br/><br/>
        <b>Suggestions: (matters related to the training, what worked and what didn't)</b></br>
        <textarea name="suggestions" id="suggestions" rows="5" cols="40"><? echo "$row[suggestions]"?></textarea><br/><br/>
        <b>Do you want a copy of this report to be sent to your email account?</b><br/>
        <input type="radio" name="email_report" id="email_report" value="1">Yes<br/>
        <input type="radio" name="email_report" id="email_report" value="0" checked>No<br/><br/>
        <b>Date:</b><br/>
        <?echo date('l F jS\, Y h:iA');?><br/><br/>
        <input type="hidden" name="date" value="<?echo date('Y-m-d')?>"/>
        <input type="submit" value="Edit Study Report"/>
    </div>

</div>
</body>
</html>
