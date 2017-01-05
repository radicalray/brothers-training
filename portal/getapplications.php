<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title>2017 Boston Area Training on Eldership</title>
</head>
<body>

<?php include("../includes/header.html"); ?>
<?php include("../includes/navigation.html"); ?>
<?php include_once("../includes/functions.php"); ?>

<?php
$servername = "mysql.churchincambridge.org";
$username = "sbruso";
$password = "2608amtT";
$dbname = "brotherstraining";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT id, first_name, last_name, email, locality, phone, approved, consecrated, payment_verification FROM applications
        ORDER BY locality";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Locality</th><th>Phone</th><th>Approved?</th><th>Consecrated?</th><th>Paid?</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td>
                  <td>".$row["first_name"]."</td>
                  <td> ".$row["last_name"]."</td>
                  <td> ".$row["email"]."</td>
                  <td>".$row["locality"]."</td>
                  <td>".$row["phone"]."</td>
                  <td>".($row['approved'] == 1 ? "yes" : "no")."</td>
                  <td>".($row['consecrated'] == 1 ? "yes" : "no")."</td>
                  <td>".($row['payment_verification'] == 1 ? "yes" : "no")."</td>.</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
mysqli_close($conn);

?>
