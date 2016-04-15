<?php

include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';

sec_session_start();

if (isset($_POST['link1'])) {
    $field = 'link1';
    $value = $_POST['link1'];
} elseif (isset($_POST['link2'])) {
    $field = 'link2';
    $value = $_POST['link2'];
} elseif (isset($_POST['link3'])) {
    $field = 'link3';
    $value = $_POST['link3'];
} elseif (isset($_POST['link4'])) {
    $field = 'link4';
    $value = $_POST['link4'];
} elseif (isset($_POST['link5'])) {
    $field = 'link5';
    $value = $_POST['link5'];
}

$id = $_POST['id'];

update_link($mysqli, $id, $field, $value);

header("Location: /portal/admin/accounting_view.php?id=$id");

?>
