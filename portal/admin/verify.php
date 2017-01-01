<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';

sec_session_start();

$id = $_POST['id'];
$payment = $_POST['payment'];
$message = "";
$message_type = "";

verify_payment($mysqli, $id, $payment);

 if (isset($_POST['email_notification'])) {
    $er = $_POST['email_notification'];
    if ($er) {
        $to = getemail($mysqli, $id);
	$paid = "NOT YET PAID";
	if ($payment) {$paid = "Payment Received";} else {$payment = "Payment Not Received";}
        $subject = "Boston Area Training on Eldership: Application Update";
        $from = 'admin@churchincambridge.org';
        $body = "Hi, Your Application status has been updated to: <b>$paid</b> <br/><br/> Note: This is an automatically generated email, please do not reply. ";
        $headers = "From: \"Boston Area Training on Eldership\" <". strip_tags($from) . ">\r\n";
        $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $mail_success = mail($to,$subject,$body,$headers);
	$message = '&message=Email%20sent%20to:%20'.$to;
        if ($mail_success) {$message_type = "&message_type=success";} else {$message_type = "&message_type=error";}

    }
}


header('Location: view.php?id='.$id.$message.$message_type);

?>
