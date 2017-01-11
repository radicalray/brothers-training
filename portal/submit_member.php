<?php
include_once '../includes/db_connect.php';

// print_r ($_POST);

$lc = $_POST['locality'];
$gn = $_POST['group_no'];
$md = $_POST['mtg_day'];
$mt = $_POST['mtg_time'];
$mp = $_POST['mtg_place'];
$mids = implode(',', $_POST['member_ids']);

// echo $mids;

$lg = "English";

$query = "INSERT INTO study_groups (locality, language, group_no, mtg_day, mtg_time, mtg_place, member_ids) VALUES (?, ?, ?, ?, ?, ?, ?)".
         " ON DUPLICATE KEY UPDATE".
         " mtg_day = VALUES (mtg_day),".
         " mtg_time = VALUES (mtg_time),".
         " mtg_place = VALUES (mtg_place),".
         " member_ids = VALUES (member_ids)";

if ($stmt = $mysqli->prepare($query)) {
  $stmt->bind_param('sssssss', $lc, $lg, $gn, $md, $mt, $mp, $mids);
  $stmt->execute();
}

header("Location:/portal/member_submitted.html");

?>
