<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Secure Login: Protected Page</title>
    <link rel="stylesheet" type="text/css" href="../styles.css" />
</head>
<?php include("../../includes/header.html"); ?>
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
    "first_name" => "First Name",
    "last_name" => "Last Name",
    "locality" => "Locality",
    "language" => "Language",
    "group_no" => "Group #",
    "lesson" => "Lesson"
];

$reports = get_reports($mysqli);

$res = get_report_list($mysqli, $order_by, $order, $filter_by, $filter);
if ($res) {
    echo "<table border=1><tr>";
    foreach (array_keys($display_values) as $key) {
        echo "<th>";
        if ($order_by == $key) {
            if ($order == 'asc') {
                echo "<a href=\"report_list.php?order_by=$key&order=desc&$filter_url\">{$display_values[$key]} &uarr;</a>";
            }
            elseif ($order == 'desc') {
                echo "<a href=\"report_list.php?$filter_url\">{$display_values[$key]} &darr;</a>";
            }
            else {
                echo "<a href=\"report_list.php?order_by=$key&order=desc&$filter_url\">{$display_values[$key]}</a>";
            }
        }
        else {
            echo "<a href=\"report_list.php?order_by=$key&order=asc&$filter_url\">{$display_values[$key]}</a>";
        }
        echo "</th>";
    }
    echo "</tr>";

    $count = 0;
    while ($row = $res->fetch_assoc()) {
        echo "<tr><td>{$row['first_name']}</td>".
             "<td>{$row['last_name']}</td>".
             "<td>{$row['locality']}</td>".
             "<td>{$row['language']}</td>".
             "<td>{$row['group_no']}</td>".
             "<td>{$row['lesson']}</td>";
        echo "<td><u><a href=\"report_view.php?id={$row['id']}\"><b>View</u></b></a></td>";
        echo "<td><u><a href=\"../report_edit.php?id={$row['id']}\"><b>Edit</u></b></a></td>";
        echo "<td><u><a href=\"delete_confirm.php?id={$row['id']}&table=study_reports\"><b>Delete</u></b></a></td>";
        echo "</tr>";
        $count++;
    }
    echo "</table>";
    echo "<br/><br/>";
    echo "Total number of reports: ", $count;
}
?>

        <p>Logged in as: <?php echo htmlentities($_SESSION['username']); ?></p>
<?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span><br/><br/><br/> Please <a href="index.php">login</a>.
    </p>
<?php endif; ?>

    <br/>Click <b><a href="../report.html">HERE</b></a> to go back.<br/><br/>
</body>
</html>
