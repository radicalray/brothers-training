<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';

sec_session_start();

$id = $_POST['id'];
$table = $_POST['table'];
$answer = $_POST['answer'];

if ($_POST['answer']) {
   delete_record($mysqli, $id, $table);
}

if (!strcmp($table,"study_groups")) {
   header('Location: member_list.php');
}

if (!strcmp($table,"study_reports")) {
   header('Location: report_list.php');
}

if (!strcmp($table,"applications")) {
   header('Location: list.php');
}

if (!strcmp($table,"accounting")) {
   header('Location: accounting_list.php');
} 

?>
