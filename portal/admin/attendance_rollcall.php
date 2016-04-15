<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Secure Login: Protected Page</title>
            <link rel="stylesheet" type="text/css" href="../styles.css" />
<style>
body {
   background-color: #FEFFE6;
}
</style>
</head>
<?php include("../../includes/header.html"); ?>
<?php include("../../includes/navigation.html"); ?>
<body>
<?php if (login_check($mysqli) == true) : ?>

<?php

$order_by = $_GET['order_by'];
$order = $_GET['order'];
$filter_by = $_GET['filter_by'];
$filter = $_GET['filter'];
$filter_url = "filter_by=$filter_by&filter=$filter";

$date = $_POST['training_date'];
$status = $_POST['status'];
$attendance_table = $_POST['attendance_table'];

$attendance = get_attendance_list($attendance_table, $mysqli);

//print $attendance['8']['2014-12-30'];

$reason = "";
$makeup = '';

$res = getlist($mysqli, $order_by, $order, $filter_by, $filter);
if ($res != 0) {

    $count = 0;
    while ($row = $res->fetch_assoc()) {
           if (!$attendance[$row['id']][$date] && $row['first_term']) {
              insert_attendance($attendance_table, $row['id'], $date, $status, $reason, $makeup, $mysqli);
              $count++;
           } else {
}
    }
    echo "Total number of rows inserted: ".$count." for meeting date: ".$date;
}
?>

        <p>Logged in as: <?php echo htmlentities($_SESSION['username']); ?></p>
<?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span><br/><br/><br/> Please <a href="index.php">login</a>.
    </p>
<?php endif; ?>

    <br/>Click <b><a href="../attendance.html">HERE</b></a> to go back.<br/><br/>
</body>
</html>
