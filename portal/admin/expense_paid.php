<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';

sec_session_start();

$id = $_POST['id'];
$expense_paid = $_POST['expense_paid'];

accounting_paid($mysqli, $id, $expense_paid);

header('Location: accounting_view.php?id='.$id);

?>
