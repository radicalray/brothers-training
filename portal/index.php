
<!DOCTYPE html>
<html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title>2019 Boston Area Training on Eldership</title>
</head>

<style>
body {
   background-color: #FEFFE6;
}

.login-form {
    width: 418px;
    margin: auto;
    padding: 20px;
    background-color: #EBE7E0;
    border: 1px solid black;
}

.login-form input {
    border: 1px solid black;
}

.button-container {
    text-align: right;
    margin-top: 15px;
}
</style>
</head>

<div class="header">
  2019 Boston Area Perfecting Training
</div>

<div class="content">
  <div class="application_section">

  <b><u>Training Dates:</u></b><br/>
  Jan 27, Feb 24, Mar 24, Apr 21, May 19, Jun 16, July 28, Aug 25, Sep 22, Oct 20, Nov 17, Dec 15<br/>
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
        <div class="login-form">
            <form method="POST" action="index.php">
            Please enter your password to access: <input type="password" name="password"></input><br/>
            <div class="button-container">
                <input type="submit" name="submit" value="Submit"></input>
                <a href="/portal/">Cancel</a>
            </div>
            </form>
        </div>
    <?php }
}

?>


</body>
</html>
