<?php
include_once '../includes/db_connect.php';

// print_r ($_POST);

$lc = $_POST['locality'];
$gn = $_POST['group_no'];
$md = $_POST['mtg_day'];
$mt = $_POST['mtg_time'];
$mp = $_POST['mtg_place'];
$mids = implode(',', $_POST['member_ids']);

$lg = "English";

// implode(',', $a)

$query = "INSERT INTO study_groups (locality, language, group_no, mtg_day, mtg_time, mtg_place, member_ids) VALUES (?, ?, ?, ?, ?, ?, ?)";

// print_r ($mysqli);

if ($stmt = $mysqli->prepare($query)) {
  // echo "blah";
  // print_r ($stmt);
  $stmt->bind_param('sssssss', $lc, $lg, $gn, $md, $mt, $mp, $mids);
  $stmt->execute();
  // echo "finished";
}

// echo $mids;

header("Location:/portal/member_submitted.html");

?>
