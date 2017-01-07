<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>View Study Group</title>
    <link rel="stylesheet" type="text/css" href="../styles.css" />
<style>
body {
   background-color: #FEFFE6;
}
</style>
</head>
<?php include("../../includes/navigation.php"); ?>
<body>
<?php if (login_check($mysqli) == true) : ?>

<?php

$display = [
   "member_name"=>"Members' Names",
];

$id = $_GET['id'];
$res = get_group_list($mysqli, '', '', 'id', $id);
if ($res != 0) {
    $row = $res->fetch_assoc();
    if (!$row) {
        echo "not found";
    }
    else {
        echo "<table border=1>";
        foreach (array_keys($display) as $key) {
            echo "<tr><td>{$display[$key]}</td><td>";
            echo $row[$key];
            echo "</td></tr>";
        }
        echo "</table>";
        echo "<br/><br/>";
    }
}

        echo "<br/><br/>";
        echo "<a href=\"member_list.php\"><b>BACK</a> to Study Group List | <a href=\"/brotherstraining/portal/index.php\"><b>HOME</a></b>";
        echo "<br /><br/>";
?>

<?php else : ?>
<p>
    <span class="error">You are not authorized to access this page.</span><br/><br/><br/>Please <a href="index.php">login</a>.
</p>
<?php endif; ?>
</body>
</html>
