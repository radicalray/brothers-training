<?php
include_once '../includes/db_connect.php';

$fn = $_POST['first_name'];
$ln = $_POST['last_name'];
$lc = $_POST['locality'];
$em = strtolower($_POST['email']);

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

if ($app_id) {
   header('Location:registration_edit.php?id='.$app_id);

}
else {
   header("Location:/portal/registration_notfound.html");
}
?>
