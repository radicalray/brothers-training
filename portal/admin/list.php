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
$group_by = $_GET['group_by'];

$display_values = [
    "first_name" => "First Name",
    "last_name" => "Last Name",
    "locality" => "Locality",
    "approved" => "Approved",
    "consecrated" => "Consecrated",
    "payment_verification" => "Payment Received",
    "email" => "Email",
    "phone" => "phone",
    // "language" => "language"
    // "first_term" => "First Term",
    // "second_term" => "Second Term",
    // "third_term" => "Third Term"
];

$res = getlist($mysqli, $order_by, $order, $filter_by, $filter);
if ($res != 0) {
    echo "<table border=1><tr>";
    foreach (array_keys($display_values) as $key) {
        echo "<th>";
        if ($order_by == $key) {
            if ($order == 'asc') {
                echo "<a href=\"list.php?order_by=$key&order=desc&$filter_url\">{$display_values[$key]} &uarr;</a>";
            }
            elseif ($order == 'desc') {
                echo "<a href=\"list.php?$filter_url\">{$display_values[$key]} &darr;</a>";
            }
            else {
                echo "<a href=\"list.php?order_by=$key&order=desc&$filter_url\">{$display_values[$key]}</a>";
            }
        }
        else {
            echo "<a href=\"list.php?order_by=$key&order=asc&$filter_url\">{$display_values[$key]}</a>";
        }
        echo "</th>";
    }
    echo "<th>&nbsp;</th>";
    echo "</tr>";

    $locality_count = 0;
    $last_locality = "";
    $locality_name = array();
    $applicant_count = array();
    $row_count = 1;
    while ($row = $res->fetch_assoc()) {
        echo "<tr><td>{$row['first_name']}</td>".
             "<td>{$row['last_name']}</td>".
             "<td>{$row['locality']}</td>".
             "<td>".($row['approved'] == 1 ? "yes" : "no")."</td>".
             "<td>".($row['consecrated'] == 1 ? "yes" : "no")."</td>".
             "<td>".($row['payment_verification'] == 1 ? "yes" : "no")."</td>".
             "<td>{$row['email']}</td>".
             "<td>{$row['phone']}</td>".
             "<td>{$row['language']}</td>".
             // "<td>".($row['first_term'] == 1 ? "yes" : "no")."</td>".
             // "<td>".($row['second_term'] == 1 ? "yes" : "no")."</td>".
             // "<td>".($row['third_term'] == 1 ? "yes" : "no")."</td>".
             "<td><a href=\"view.php?id={$row['id']}\"><u><b>View</u></b></a></td>".
             "<td><a href=\"../registration_edit.php?id={$row['id']}\"><u><b>Edit</u></b></a></td>".
             "<td><a href=\"delete_confirm.php?id={$row['id']}&table=applications\"><u><b>Delete</u></b></a></td>".
             "<td>$row_count</td>".
             "</tr>";
        $row_count++;

        $locality = $row['locality'];
        if ($order_by == 'locality') { // if the query is order_by locality, count how many applicants from each locality
           if (strcmp($last_locality,$locality)!=0) { // if the previous locality is not the same as the current locality
          	  $locality_name[$locality_count] = $locality;
        	     $last_locality = $locality;
        	     $locality_count++;
           }
           $applicant_count[$locality_count-1]++;
        }
        else {
        	  $applicant_count[$locality_count]++;
        }
    }
    echo "</table>";
    echo "<br/><br/>";

    echo "Total number of trainees: ";
    if (!$locality_count){ // not order_by locality
    	echo $applicant_count[$locality_count];
    }
    else { // the query is order_by locality, make a table of count by locality
      echo "<br/><table border=1><tr>";
      $total_locality = $locality_count;
      $locality_count = 0;
      while ($total_locality > $locality_count) {
       echo "<tr><td>{$locality_name[$locality_count]}</td>"."<td>{$applicant_count[$locality_count]}</td>"."</tr>";
       $locality_count++;
      }
      echo "</table>";
    }

}
?>

        <p>Logged in as: <?php echo htmlentities($_SESSION['username']); ?></p>
<?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
    </p>
<?php endif; ?>

    <br/>Click <b><a href="../admin.php">HERE</b></a> to go back.<br/><br/>
</body>
</html>
