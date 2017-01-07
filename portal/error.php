<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title>2017 Boston Area Training on Eldership Training Application Form</title>
</head>
<body>

<?php include("../includes/navigation.php"); ?>

<div class="content">

<?php
$err_msg = $_GET['err_msg'];
echo "<p class='warning'>".$err_msg."</p>";
?>

<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>

</div>

</body>
</html>
