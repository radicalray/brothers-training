<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>View Study Report</title>
    <link rel="stylesheet" type="text/css" href="../styles.css" />
</head>
<?php include("../../includes/navigation.php"); ?>
<body>
<?php if (login_check($mysqli) == true) : ?>

<?php

$display = [
    "first_name"=>"First Name",
    "last_name"=>"Last Name",
    "language"=>"Language",
    "group_no"=>"Group Number",
    "attendees"=>"Attendees",
    "absentees"=>"Absentees",
    "excused_absentees"=>"Excused Absentees",
    "study_report"=>"Study Report",
    "suggestions"=>"Suggestions",
    "date_submitted"=>"Date Submitted"
];

$id = $_GET['id'];
$res = get_report_list($mysqli, '', '', 'id', $id);
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
        echo "<a href=\"report_list.php\"><b>BACK</a> to Study Report List | <a href=\"/brotherstraining/portal/index.php\"><b>HOME</a></b>";
        echo "<br /><br/>";
?>

<?php else : ?>
<p>
    <span class="error">You are not authorized to access this page.</span><br/><br/><br/>Please <a href="index.php">login</a>.
</p>
<?php endif; ?>
</body>
</html>
