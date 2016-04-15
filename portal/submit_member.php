<?php
include_once '../includes/db_connect.php';

$lc = $_POST['locality'];
$lg = $_POST['language'];
$gn = $_POST['group_no'];
$md = $_POST['mtg_day'];
$mt = $_POST['mtg_time'];
$mp = $_POST['mtg_place'];
$mn = $_POST['member_no'];
$mb = $_POST['member_name'];

$query = "INSERT INTO study_groups (locality, language, group_no, mtg_day, mtg_time, mtg_place, member_no, member_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

if ($stmt = $mysqli->prepare($query)) {
    $stmt->bind_param('ssssssss', $lc, $lg, $gn, $md, $mt, $mp, $mn, $mb);
    $stmt->execute();
}

header("Location:/portal/member_submitted.html");

?>
