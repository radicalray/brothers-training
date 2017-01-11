<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';

$dt = $_POST['date'];
$lg = "English"; //$_POST['language'];
$ls = $_POST['lesson'];
$gn = $_POST['group_no'];

$sr = $_POST['study_report'];
$sg = $_POST['suggestions'];

$monitor_id = $_POST['monitor_id'];
$session = $_POST['lesson'];
// $sr = $_POST['study_report'];
// $sg = $_POST['suggestions'];
$absent = $_POST['absent'];
$excused = $_POST['excused'];

$excused_reason = $_POST['excused_reason'];
$makeup_date = $_POST['makeup_date'];

// print_r ($absent);
// print_r ($excused);

$present_trainees = [];
$absent_trainees = [];
$excused_trainees = [];

foreach($excused as $t => $is_excused) {
    array_push($excused_trainees, $t);
}

$reason = "";
$makeup = "";

$attendance_table = "group_attendance";

// Logic to figure out if trainee should be marked P (present), U (unexcused absent), or E (excused absent)
foreach($absent as $t => $is_absent) {
    if ($is_absent) {
        if (!in_array($t, $excused_trainees)) {
            // Only push in not excused trainees
            array_push($absent_trainees, $t);
            $type = 'U';
        } else {
            $type = 'E';
            $reason = $excused_reason[$t];
            $makeup = $makeup_date[$t];
        }
    } else {
        array_push($present_trainees, $t);
        $type = 'P';
    }
    insert_attendance($attendance_table, $t, $session, $type, $reason, $makeup, $mysqli);
}

// echo "present";
// print_r ($present_trainees);
// echo "absent";
// print_r ($absent_trainees);
// echo "excused";
// print_r($excused_trainees);

$monitor = get_trainee($monitor_id, $mysqli)->fetch_assoc();
$fn = $monitor;

// print_r ($monitor);
$fn = $monitor['first_name'];
$ln = $monitor['last_name'];
$em = $monitor['email'];
$lc = $monitor['locality'];

$ad = implode(',', $present_trainees);
$as = implode(',', $absent_trainees);
$es = implode(',', $excused_trainees);

// echo $fn, $ln, $em, $lc, $lg, $gn, $ls, $ad, $as, $es, $sr, $sg, $dt;

$query = "INSERT INTO study_reports (first_name, last_name, email, locality, language, group_no, lesson, attendees, absentees, excused_absentees, study_report, suggestions, date_submitted) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

if ($stmt = $mysqli->prepare($query)) {
    $stmt->bind_param('sssssssssssss', $fn, $ln, $em, $lc, $lg, $gn, $ls, $ad, $as, $es, $sr, $sg, $dt);
    $stmt->execute();
}

if (isset($_POST['email_report'])) {
    $er = $_POST['email_report'];
    if ($er) {
        $mysqli->real_escape_string($em);
        $to = $em;
        $subject = "Boston Area Brothers Training: Study Report";
        $from = 'admin@churchincambridge.org';
        $body = 'Hi, the following is the report you have submitted: <br/><br/>First Name: '.$fn.'<br/>
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
