<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';

sec_session_start();

$password = $_POST['password'];

if ($password == "7lampstands")
{
       header ("Location:/brotherstraining/portal/admin/index.php?task=accounting");
}
else
{
    if(isset($_POST['password']))
       echo "<br/><b>Login failed, please try again. Email admin@churchincambridge.org if you need help. </b><br/><br/>";
    {?>
            <form method="POST" action="accounting_table_access.php">
            Please enter your password to access: <input type="password" name="password"></input><br/>
            <input type="submit" name="submit" value="Go"></input>
            </form>
    <?}
}
?>
