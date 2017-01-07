<?php
include_once '../includes/db_connect.php';

$fn = $_POST['first_name'];
$ln = $_POST['last_name'];
$lc = $_POST['locality'];
$dt = $_POST['date'];
$em = strtolower($_POST['email']);
$sig = $_POST['output'];

# see if we can match with trainee application
$query = "SELECT id FROM applications WHERE lower(email) = ? OR (lower(first_name) = ? AND lower(last_name) = ? AND locality = ?)";

if ($stmt = $mysqli->prepare($query)) {
    $fn = strtolower($fn);
    $ln = strtolower($ln);
    $stmt->bind_param('ssss', $em, $fn, $ln, $lc);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($app_id);
    $stmt->fetch();
}

$found = 0;
if ($app_id) {
    $query = "UPDATE applications SET consecrated = 1 WHERE id = ?";
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param('s', $app_id);
        $stmt->execute();
    }
    $found = 1;
}

if (!$app_id) {
    $app_id = -1;
}

$query = "INSERT INTO consecration (first_name, last_name, email, locality, response, date_submitted, application_id) VALUES (?, ?, ?, ?, ?, ?, ?)";

if ($stmt = $mysqli->prepare($query)) {
    $stmt->bind_param('sssssss', $fn, $ln, $em, $lc, $sig, $dt, $app_id);
    $stmt->execute();
}

header("Location:/portal/consecration_submitted.php");

?>
