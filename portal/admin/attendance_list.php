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
<?php 
    if (login_check($mysqli) == true) : 
?>

<b>Trainee Attendence</b>
<p class="info">Attendence codes: <b>P</b> - Present; <b>U</b> - Unexcused Absence; <b>E</b> - Excused Absense</p>
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
];

$training_dates = [
    "2016-01-16" => "01-16",
    "2016-02-20" => "02-20",
    "2016-03-19" => "03-19",
    "2016-04-16" => "04-16",
    "2016-05-14" => "05-14",
    "2016-06-18" => "06-18",
    /*"2016-07-16" => "07-16",
    "2016-08-20" => "08-20",
    "2016-09-17" => "09-17",
    "2016-10-15" => "10-15",
    "2016-11-19" => "11-19",
    "2016-12-17" => "12-17"*/
];

$group_dates = [
    "group mtg 1" => "Lesson 01",
    "group mtg 2" => "Lesson 02",
    "group mtg 3" => "Lesson 03",
    "group mtg 4" => "Lesson 04",
    "group mtg 5" => "Lesson 05",
    "group mtg 6" => "Lesson 06",
    "group mtg 7" => "Lesson 07",
    "group mtg 8" => "Lesson 08",
    "group mtg 9" => "Lesson 09",
    "group mtg 10" => "Lesson 10",
    "group mtg 11" => "Lesson 11",
    "group mtg 12" => "Lesson 12",
    "group mtg 13" => "Lesson 13",
    "group mtg 14" => "Lesson 14",
    "group mtg 15" => "Lesson 15", 
    "group mtg 16" => "Lesson 16",
    "group mtg 17" => "Lesson 17",
    "group mtg 18" => "Lesson 18", 
/*    "group mtg 19" => "Lesson 19",
    "group mtg 20" => "Lesson 20",
    "group mtg 21" => "Lesson 21",
    "group mtg 22" => "Lesson 22",
    "group mtg 23" => "Lesson 23",
    "group mtg 24" => "Lesson 24",
    "group mtg 25" => "Lesson 25",
    "group mtg 26" => "Lesson 26",
    "group mtg 27" => "Lesson 27",
    "group mtg 28" => "Lesson 28",
    "group mtg 29" => "Lesson 29",
    "group mtg 30" => "Lesson 30",
    "group mtg 31" => "Lesson 31",
    "group mtg 32" => "Lesson 32",
    "group mtg 33" => "Lesson 33",
    "group mtg 34" => "Lesson 34",
    "group mtg 35" => "Lesson 35",
    "group mtg 36" => "Lesson 36" */
];

if (isset($_GET['attendance_task'])) {
   $attendance_task = $_GET['attendance_task'];
   if ($attendance_task == "attendance") { // we are dealing with training attendancee 
      $attendance_table = "attendance";
      $date_array = $training_dates;
   } else {
      $attendance_table = "group_attendance";
      $date_array = $group_dates;
  }   
}

if (isset($_GET['attendance_table'])) {
   $attendance_table = $_GET['attendance_table'];
   if ($attendance_table == "attendance") {
      $date_array = $training_dates;
   } else {
      $date_array = $group_dates;
   }
}

if (isset($_POST['submit_attendance_table'])) {
   $attendance_table = $_POST['submit_attendance_table'];
   if ($attendance_table == "attendance") {
      $date_array = $training_dates;
   } else {
      $date_array = $group_dates;
  }
}
$attendance = get_attendance_list($attendance_table, $mysqli);
//print $attendance['8']['2014-12-30'];

$res = getlist($mysqli, $order_by, $order, $filter_by, $filter);
if ($res != 0) {
    echo "<table border=1><tr>";
    foreach (array_keys($display_values) as $key) {
        echo "<th>";
        if ($order_by == $key) {
            if ($order == 'asc') {
                echo "<a href=\"attendance_list.php?attendance_table=$attendance_table&order_by=$key&order=desc&$filter_url\">{$display_values[$key]} &uarr;</a>";
            }
            elseif ($order == 'desc') {
                echo "<a href=\"attendance_list.php?attendance_table=$attendance_table&$filter_url\">{$display_values[$key]} &darr;</a>";
            }
            else {
                echo "<a href=\"attendance_list.php?attendance_table=$attendance_table&order_by=$key&order=desc&$filter_url\">{$display_values[$key]}</a>";
            }
        }
        else {
            echo "<a href=\"attendance_list.php?attendance_table=$attendance_table&order_by=$key&order=asc&$filter_url\">{$display_values[$key]}</a>";
        }
        echo "</th>";
    }
    foreach (array_keys($date_array) as $date) {
        echo "<th>{$date_array[$date]}</th>";
    }
    echo "</tr>";

    $count = 0;
    $excused = [];
    $unexcused = [];
    while ($row = $res->fetch_assoc()) {
        echo "<tr><td>{$row['first_name']}</td>".
             "<td>{$row['last_name']}</td>".
             "<td>{$row['locality']}</td>";
        foreach(array_keys($date_array) as $date) {
           if ($attendance[$row['id']][$date]) {
             echo "<td><a href=\"attendance.php?attendance_table=$attendance_table&user_id={$row['id']}&date={$date}&code=".code($row['id'] + $date)."\">{$attendance[$row['id']][$date]['status']}</a></td>";
           }
           else {
                echo "<td><a href=\"attendance.php?attendance_table=$attendance_table&user_id={$row['id']}&date={$date}&code=".code($row['id'] + $date)."\">??</a></td>";
           }
           if ($attendance[$row['id']][$date]['status'] == 'E') {
              $excused[$date]++;
           }
           elseif ($attendance[$row['id']][$date]['status'] == 'U') {
              $unexcused[$date]++;
           }
        }
        echo "<td><a href=\"attendance_view.php?attendance_table=$attendance_table&user_id={$row['id']}&first_name={$row['first_name']}&last_name={$row['last_name']}\"><u><b>View</u></b></a></td>";
        echo "</tr>";
        $count++;
    }
    echo "</table>";
    echo "<br/><br/>";
    echo "Total number of trainees: ", $count, "<br/><br/>";
    echo "Number of excused absences on:<br/>";
    foreach(array_keys($date_array) as $date) {
      if (!$excused[$date]) {
        $excused[$date] = 0;
      }        
      echo $date, " is ", $excused[$date], "<br/>"; 
    }
    echo "<br/><br/>Number of unexcused absences on:<br/>";
    foreach(array_keys($date_array) as $date) {
      if (!$unexcused[$date]) {
        $unexcused[$date] = 0;
      }
      echo $date, " is ", $unexcused[$date], "<br/>";
    }
}
?>

        <p>Logged in as: <?php echo htmlentities($_SESSION['username']); ?></p>
<?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span><br/><br/><br/>Please <a href="index.php">login</a>.
    </p>
<?php endif; ?>

    <br/>Click <b><a href="../attendance.html">HERE</b></a> to go back.<br/><br/>
</body>
</html>
