
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Media Access</title>
    <link rel="stylesheet" type="text/css" href="../styles.css" />
<style>
body {
   background-color: #FEFFE6;
}
</style>
</head>

<?php

if (isset($_POST['password'])) {
    $password = $_POST['password'];
} else {
    $password = '';
}

if ($password == "1newman")
{
    include("./protected_contents.html");
}
else
{
    if(isset($_POST['password']))
         echo "<br/><b>Login failed, please try again. Please email admin@churchincambridge.org if you need help.</b><br/><br/>";
    {?>
            <form method="POST" action="index.php">
            Please enter your password to access: <input type="password" name="password"></input><br/>
            <input type="submit" name="submit" value="Go"></input>
            <a href="/portal/">Cancel</a>
            </form>
    <?php }
}

?>


</body>
</html>
