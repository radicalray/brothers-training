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
    <div class="application_section">
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }

        if (isset($_GET['login_failed'])) {
            echo '<p class="error">Incorrect username/password</p>';
        }

	$user_name = $_SESSION['username'];
        $forbid_user = "3rdTerm";
        if (!strcmp($logged,"in") && strcmp($user_name,$forbid_user)) {
           echo "Hi <b>".htmlentities($_SESSION['username'])."</b>, you are currently logged in. (Click  <b><u><a href=\"skip_login.php?task=$task\" />HERE</a></b></u> to continue.)<br/><br/>";
           echo "
           <script>
            var t = \"$task\";
            if (!t || t == '') {
                window.location = \"/\";
            } else {
                window.location = \"skip_login.php?task=\" + t;
            }
            </script>";
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
        <p><b><u><a href="logout.php">Logout</a></u></b></p>
      </br><center><b>(Please email admin@churchincambridge.org if you need help.)</b></center></br>
     </div>
</div>
</body>
</html>
