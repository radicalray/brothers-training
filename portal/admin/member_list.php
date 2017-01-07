<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Secure Login: Protected Page</title>
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

$order_by = $_GET['order_by'];
$order = $_GET['order'];
$filter_by = $_GET['filter_by'];
$filter = $_GET['filter'];
$filter_url = "filter_by=$filter_by&filter=$filter";

$display_values = [
    "locality" => "Locality",
    "language" => "Language",
    "group_no" => "Group Number",
    "mtg_day" => "Meeting Day",
    "mtg_time" => "Meeting Time",
    "mtg_place" => "Meeting Place",
    "member_no" => "Number of Members"
];

$res = get_group_list($mysqli, $order_by, $order, $filter_by, $filter);
if ($res != 0) {
    echo "<table border=1><tr>";
    foreach (array_keys($display_values) as $key) {
        echo "<th>";
        if ($order_by == $key) {
            if ($order == 'asc') {
                echo "<a href=\"member_list.php?order_by=$key&order=desc&$filter_url\">{$display_values[$key]} &uarr;</a>";
            }
            elseif ($order == 'desc') {
                echo "<a href=\"member_list.php?$filter_url\">{$display_values[$key]} &darr;</a>";
            }
            else {
                echo "<a href=\"member_list.php?order_by=$key&order=desc&$filter_url\">{$display_values[$key]}</a>";
            }
        }
        else {
            echo "<a href=\"member_list.php?order_by=$key&order=asc&$filter_url\">{$display_values[$key]}</a>";
        }
        echo "</th>";
    }
    echo "</tr>";

    $count = 0;
    while ($row = $res->fetch_assoc()) {
        echo "<tr><td>{$row['locality']}</td>".
             "<td>{$row['language']}</td>".
             "<td>{$row['group_no']}</td>".
             "<td>{$row['mtg_day']}</td>".
             "<td>{$row['mtg_time']}</td>".
             "<td>{$row['mtg_place']}</td>".
             "<td>{$row['member_no']}</td>";
        echo "<td><u><a href=\"member_view.php?id={$row['id']}\"><b>View</a></b></u></td>";
        echo "<td><u><a href=\"../member_edit.php?id={$row['id']}\"><b>Edit</a></b></u></td>";
        echo "<td><u><a href=\"delete_confirm.php?id={$row['id']}&table=study_groups\"><b>Delete</a></b></u></td>";
        echo "</tr>";
        $count++;
    }
    echo "</table>";
    echo "<br/><br/>";
    echo "Total number of groups: ", $count;
}
?>

        <p>Logged in as: <?php echo htmlentities($_SESSION['username']); ?></p>
<?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
    </p>
<?php endif; ?>

    <br/>Click <b><a href="../member.php">HERE</b></a> to go back.<br/><br/>
</body>
</html>
