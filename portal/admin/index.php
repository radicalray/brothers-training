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
    <div class="application_section">
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }

	$user_name = $_SESSION['username'];
        $forbid_user = "3rdTerm";
        if (!strcmp($logged,"in") && strcmp($user_name,$forbid_user)) {
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
        <p><b><u><a href="logout.php">Logout</a></u></b></p>
      </br><center><b>(Please email admin@churchincambridge.org if you need help.)</b></center></br>
     </div>
</div>
</body>
</html>
