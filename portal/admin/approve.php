<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';

sec_session_start();

$id = $_POST['id'];
$approved = $_POST['approved'];
$not_approved = $_POST['not_approved'];
$comments = $_POST['comments'];
$message = "";
$message_type = "";
approve($mysqli, $id, $approved, $not_approved, $comments);

 if (isset($_POST['email_notification'])) {
    $er = $_POST['email_notification'];
    if ($er) {
        $to = getemail($mysqli, $id);
	$txt = "";
	if ($approved) {$txt = "APPROVED";} else {$txt = "Not Approved";}
        $subject = "Boston Area Brothers Training: Application Update";
        $from = 'admin@churchincambridge.org';
        $body = "Hi, Your Application status has been updated to: <b>$txt</b> <br/><br/>Comments: $comments<br/><br/> Note: This is an automatically generated email, please do not reply. ";
        $headers = "From: \"Boston Area Brothers Training\" <". strip_tags($from) . ">\r\n";
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
