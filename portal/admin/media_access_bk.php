<?php include '../../includes/db_connect.php'; ?>
<?php include '../../includes/functions.php'; ?>

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

<body> <b> herro </b>

<?php
sec_session_start();

$password = $_POST['password'];

if ($password == "1newman")
{
        include("../protected_contents.html");
}
else
{
    if(isset($_POST['password']))
         echo "<br/><b>Login failed, please try again. Please email admin@churchincambridge.org if you need help.</b><br/><br/>";
    {?>
            <form method="POST" action="media_access.php">
            Please enter your password to access: <input type="password" name="password"></input><br/>
            <input type="submit" name="submit" value="Go"></input>
            </form>
    <?php}
}
?>

</body>
</html>
