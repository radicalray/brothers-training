<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';

sec_session_start();
?>
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
<?php include("../../includes/header.html"); ?>
<?php include("../../includes/navigation.html"); ?>
<body>
<?php if (login_check($mysqli) == true) : ?>

<?php

$order_by = $_GET['order_by'];
$order = $_GET['order'];
$filter_by = $_GET['filter_by'];
$filter = $_GET['filter'];
$filter_url = "filter_by=$filter_by&filter=$filter";
$group_by = $_GET['group_by'];

$display_values = [
    "first_name" => "First Name",
    "last_name" => "Last Name",
    "locality" => "Locality",
    "address0" => "Address",
    "report_type" => "Report Type",
    "total_amount" => "Total Amount",
    "date_submitted" => "Date Submitted",
    "approved1"=>"First Approval",
    "approved2"=>"Second Approval",
    "expense_paid"=>"Expense Paid"
];

$res = get_accounting_list($mysqli, $order_by, $order, $filter_by, $filter);
if ($res != 0) {
    echo "<table border=1><tr>";
    foreach (array_keys($display_values) as $key) {
        echo "<th>";
        if ($order_by == $key) {
            if ($order == 'asc') {
                echo "<a href=\"accounting_list.php?order_by=$key&order=desc&$filter_url\">{$display_values[$key]} &uarr;</a>";
            }
            elseif ($order == 'desc') {
                echo "<a href=\"accounting_list.php?$filter_url\">{$display_values[$key]} &darr;</a>";
            }
            else {
                echo "<a href=\"accounting_list.php?order_by=$key&order=desc&$filter_url\">{$display_values[$key]}</a>";
            }
        }
        else {
            echo "<a href=\"accounting_list.php?order_by=$key&order=asc&$filter_url\">{$display_values[$key]}</a>";
        }
        echo "</th>";
    }
    echo "<th>&nbsp;</th>";
    echo "</tr>";

    $row_count = 1;
    $balance = 0;
    while ($row = $res->fetch_assoc()) {
        echo "<tr><td>{$row['first_name']}</td>".
             "<td>{$row['last_name']}</td>".
             "<td>{$row['locality']}</td>".
             "<td>{$row['address0']}</td>".
             "<td>{$row['report_type']}</td>".
             "<td>{$row['total_amount']}</td>".
             "<td>{$row['date_submitted']}</td>".
             "<td>{$row['approved1']}</td>".
             "<td>{$row['approved2']}</td>";
       if ($row['report_type'] == "Expense") {
          echo "<td>".($row['expense_paid'] == 1 ? "yes" : "no")."</td>";
       } 
       else {
          echo "<td></td>";
       }
       echo"<td><b><u><a href=\"accounting_view.php?id={$row['id']}\">View</u></b></a></td>".
             "<td><a href=\"delete_confirm.php?id={$row['id']}&table=accounting\"><u><b>Delete</u></b></a></td>".
             "<td>$row_count</td>".
             "</tr>";
        $row_count++;
        if ($row['report_type'] == "Income") {
            $balance += $row['total_amount'];
        } else {
            $balance -= $row['total_amount'];
        }
    }
    echo "</table>";
    echo "<br/><br/>";
    echo "<center><b>ACCOUNT BALANCE: $balance</b></center>";
}
?>

        <p>Logged in as: <?php echo htmlentities($_SESSION['username']); ?></p>
<?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span><br/><br/><br/>Please <a href="index.php">login</a>.
    </p>
<?php endif; ?>

    <br/>Click <b><a href="../accounting.html">HERE</b></a> to go back.<br/><br/>
</body>
</html>
