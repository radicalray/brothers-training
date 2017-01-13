<?php
include_once '../includes/db_connect.php';

$fn = $_POST['first_name'];
$ln = $_POST['last_name'];
$em = $_POST['email'];
$lc = $_POST['locality'];
$dt = $_POST['date'];
$lg = $_POST['language'];
$ls = $_POST['lesson'];
$gn = $_POST['group_no'];
$ad = $_POST['attendees'];
$as = $_POST['absentees'];
$sr = $_POST['study_report'];
$sg = $_POST['suggestions'];
$id = $_POST['id'];


$query = "UPDATE study_reports SET first_name=?, last_name=?, email=?, locality=?, language=?, group_no=?, lesson=?, attendees=?, absentees=?, study_report=?, suggestions=?, date_submitted=? WHERE id=?";

if ($stmt = $mysqli->prepare($query)) {
    $stmt->bind_param('sssssssssssss', $fn, $ln, $em, $lc, $lg, $gn, $ls, $ad, $as, $sr, $sg, $dt, $id);
    $stmt->execute();
}

if (isset($_POST['email_report'])) {
    $er = $_POST['email_report'];
    if ($er) {
        $mysqli->real_escape_string($em);
        $to = $em;
        $subject = "Boston Training on Eldership: Study Report";
        $from = 'admin@churchincambridge.org';
        $body = 'Hi, <br/><br/> the following is the report you have submitted: <br/><br/>First Name: '.$fn.'<br/>
         Last Name: '.$ln.'<br/>
         Email: '.$em.'<br/>
         Locality: '.$lc.'<br/>
         Language: '.$lg.'<br/>
         Group Number: '.$gn.'<br/>
         Lesson: '.$ls.'<br/>
         Attendees: '.$ad.'<br/>
         Absentees: '.$as.'<br/>
         Study Report: '.$sr.'<br/>
         Suggestions: '.$sg.'<br/>
         Date Submitted: '.$dt.'<br/>
         Note: This is an automatically generated email, please do not reply. Email admin@churchincambridge.org if you have questions.';
        $headers = "From: ". strip_tags($from) . "\r\n";
        $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        mail($to,$subject,$body,$headers);
        header("Location: /portal/email_report.html?email=$em");
     }
    else {
        header("Location:/portal/report_submitted.php");
    }
}

?>
