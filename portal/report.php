<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <link href="signature/assets/jquery.signaturepad.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="signature/assets/flashcanvas.js"></script><![endif]-->
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
	    alert("Please enter your Session number");
            return false;
        }
        else
        {
            return true;
        }
    }
    </script>
    <title>Boston Area Training on Eldership</title>
</head>
<body>

<?php include("../includes/header.html"); ?>
<?php include("../includes/navigation.php"); ?>

<div class="content">
    <center><b>2017 Boston Area Training on Eldership<br/>
    Group Study Report</b></center><br/>

    <b>Submit Study Reports</b><br/>
    <div class="application_section">
        <?php
            echo $_SESSION;
            if (!strcmp($logged,"in") && strcmp($user_name,$forbid_user)) {
                echo $_SESSION;
               echo "Hi <b>".htmlentities($_SESSION['username'])."</b>, you are currently logged in. (Click  <b><u><a href=\"skip_login.php?task=$task\" />HERE</a></b></u> to continue.)<br/><br/>";
               echo "<script> window.location = \"skip_login.php?task=$task\"; </script>";
            }
            else {
               echo "You are currently <b>logged out</b>. (Please log in.)<br/><br/>";
            }
            echo "<form action=\"process_login.php?task=$task\" method=\"post\" name=\"login_form\">".
            "Username: <input type=\"text\" name=\"username\" id=\"username\"/>".
            "Password: <input type=\"password\"".
                             "name=\"password\"".
                             "id=\"password\"/>".
            "<input type=\"submit\"".
                   "value=\"Login\"".
                   "onclick=\"formhash(this.form, this.form.password);\". />".
        "</form>"
        ?>
        ?>
        <form method="post" onsubmit="return validateForm()" action="submit_report.php"  name="report">
            <b>First Name:</b><br/>
            <input type="text" name="first_name" id="first_name"/><br/><br/>
            <b>Last Name:</b><br/>
            <input type="text" name="last_name" id="last_name"/><br/><br/>
            <b>Email:</b><br/>
            <input type="text" name="email" id="email"/><br/><br/>
            <b>Locality:</b><br/>
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
<?php echo get_provinces('../includes/localities.txt'); ?>

            </select><br/><br/>
        <b>Language:</b><br/>
        <select id="language" name="language">
                <option value="">----</option>
                <option value="English">English</option>
                <option value="Chinese">Chinese</option>
                <option value="French">French</option>
                <option value="Korean">Korean</option>
                <option value="Spanish">Spanish</option>
            </select><br/><br/>
       <b>Group Number:</b><br/>(Check with your local administrator if you don't know your group number.)</br>
       <select id="group_no" name="group_no">
                <option value=0>----</option>
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
                <option value=11>11</option>
                <option value=12>12</option>
                <option value=13>13</option>
                <option value=14>14</option>
                <option value=15>15</option>
                <option value=16>16</option>
                <option value=17>17</option>
                <option value=18>18</option>
                <option value=19>19</option>
                <option value=20>20</option>
            </select><br/><br/>
        <b>Session:</b><br/>
        <select id="lesson" name="lesson">
        <option value=''>-----------</option>
        <option value='Lesson 1'>Session 1</option>
        <option value='Lesson 2'>Session 2</option>
        <option value='Lesson 3'>Session 3</option>
        <option value='Lesson 4'>Session 4</option>
        <option value='Lesson 5'>Session 5</option>
        <option value='Lesson 6'>Session 6</option>
        <option value='Lesson 7'>Session 7</option>
        <option value='Lesson 8'>Session 8</option>
        <option value='Lesson 9'>Session 9</option>
        <option value='Lesson 10'>Session 10</option>
        <option value='Lesson 11'>Session 11</option>
        <option value='Lesson 12'>Session 12</option>
        <option value='Lesson 13'>Session 13</option>
        <option value='Lesson 14'>Session 14</option>
        <option value='Lesson 15'>Session 15</option>
        <option value='Lesson 16'>Session 16</option>
        <option value='Lesson 17'>Session 17</option>
        <option value='Lesson 18'>Session 18</option>
        <option value='Lesson 19'>Session 19</option>
        <option value='Lesson 20'>Session 20</option>
        <option value='Lesson 21'>Session 21</option>
        <option value='Lesson 22'>Session 22</option>
        <option value='Lesson 23'>Session 23</option>
        <option value='Lesson 24'>Session 24</option>
        <option value='Lesson 25'>Session 25</option>
        <option value='Lesson 26'>Session 26</option>
        <option value='Lesson 27'>Session 27</option>
        <option value='Lesson 28'>Session 28</option>
        <option value='Lesson 29'>Session 29</option>
        <option value='Lesson 30'>Session 30</option>
        <option value='Lesson 31'>Session 31</option>
        <option value='Lesson 32'>Session 32</option>
        <option value='Lesson 33'>Session 33</option>
        <option value='Lesson 34'>Session 34</option>
        <option value='Lesson 35'>Session 35</option>
        <option value='Lesson 36'>Session 36</option>
    </select><br/><br/>
        <b>Attendees:</b><br/>
        <input type="text" name="attendees" id="attendees" size="50"/><br/><br/>
        <b>Absentees:</b><br/>
        <input type="text" name="absentees" id="absentees" size="50"/><br/><br/>
        <b>Study Report: (100-200 words)</b><br/>
        <textarea name="study_report" id="study_report" rows="10" style="width:80%"></textarea><br/><br/>
        <b>Suggestions: (matters related to the training, what worked and what didn't)</b></br>
        <textarea name="suggestions" id="suggestions" rows="5" cols="60"> </textarea><br/><br/>
        <b>Do you want a copy of this report to be sent to your email account?</b><br/>
        <input type="radio" name="email_report" id="email_report" value="1">Yes<br/>
        <input type="radio" name="email_report" id="email_report" value="0" checked>No<br/><br/>
        <b>Date:</b><br/>
        <?echo date('l F jS\, Y h:iA');?><br/><br/>
        <input type="hidden" name="date" value="<?echo date('Y-m-d')?>"/>
        <input type="submit" value="Submit Study Report"/>
    </div>

</div>

</body>
</html>
