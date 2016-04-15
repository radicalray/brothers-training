<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';

sec_session_start();

$id = $_POST['id'];
$approved1 = $_POST['approved1'];
$payment_comment1 = $_POST['payment_comment1'];
$approved2 = $_POST['approved2'];
$payment_comment2 = $_POST['payment_comment2'];

accounting_approve($mysqli, $id, $approved1, $approved2, $payment_comment1, $payment_comment2);

header('Location: accounting_view.php?id='.$id);

?>
