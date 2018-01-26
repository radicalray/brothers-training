
<!DOCTYPE html>
<html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title>2017 Boston Area Training on Eldership</title>
</head>

<style>
body {
   background-color: #FEFFE6;
}
</style>
</head>

<div class="header">
  2018 Boston Area Perfecting Training
</div>

<div class="content">
  <div class="application_section">

  <b><u>Training Dates:</u></b><br/>
  Jan 27, Mar 3, Apr 28, Jun 9, July 28, Sep 8, Oct 6, Nov 17<br/>
</div>
</div>
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
