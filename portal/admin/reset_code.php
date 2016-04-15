<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
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
<br/><br/>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        if (isset($_GET['not_match'])) {
            echo "<b>Code does not match! Please check your email and try again.</b><br/><br/>";
        }
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        echo "<form action=\"reset_check.php\" method=\"post\" name=\"reset_code\">".                      
            "Please enter your reset code: <input type=\"number\" name=\"code\" id=\"code\"/>".
            "<input type=\"submit\" name=\"reset\" value=\"Reset\">". 
            "<input type=\"hidden\" name=\"id\" value=\"$id\">".
        "</form>"
        ?>
</body>
</html>
