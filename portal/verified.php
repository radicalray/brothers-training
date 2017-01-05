<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title>2017 Boston Area Training on Eldership Registration Status</title>
</head>
<body>

<?php include("../includes/header.html"); ?>
<?php include("../includes/navigation.html"); ?>

<div class="content">

<center><b>2017 Boston Area Training on Eldership<br/>Registration Status</b></center><br/>
    <p class="success">Your application has been successfully submitted.</p><br/><br/>

<?php
  $payment = $_GET['payment'];

#<!--  if ($payment == 'paypal' || $payment == 'cancelled')
#  {
#    echo "You have specified the PayPal payment option, please use the link below to pay the registration fee:<br/>";
#    echo '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
#<input type="hidden" name="cmd" value="_s-xclick">
#<input type="hidden" name="hosted_button_id" value="6QE2TUN7FEA32">
#<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
#<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
#</form>';
#  } -->
   if ($payment == 'check')
  {
    echo "<b>Please give your check to your local administrator.</b><br/><br/>";
    echo "<b>To complete your registration, fill out your consecration form <a href=/portal/consecration.php>HERE</a>.</b><br/><br/>";
    //echo "<a href=\"\portal\">Return to Home Page</a><br/><br/>";
  }
  else if ($payment == 'received')
  {
    echo "Your payment has been received.<br/><br/>";
    echo "Return to <b><a href="/portal/">Home Page</b></a><br/><br/>";
  }
?>
    </div>

</body>
</html>
