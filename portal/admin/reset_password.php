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
<br/><br/>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        if (isset($_GET['not_found'])) {
            echo "<b>Account not found! Please check your email and try again.</b><br/><br/>";
        }
        echo "<form action=\"reset_email.php\" method=\"post\" name=\"reset_form\">".
            "Please enter your email: <input type=\"text\" name=\"email\" id=\"email\"/>".
            "<input type=\"submit\" name=\"reset\" value=\"Reset\">".
        "</form>"
        ?>
</body>
</html>
