<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';

sec_session_start();

$submit_attendance_table= $_GET['attendance_table'];
$user = $_GET['user_id'];
$date = $_GET['date'];
$code = $_GET['code'];
?>

<html>
<head>
    <title>Attendance</title>
    <script type="text/javascript">
function createExcuse() {
    container = document.getElementById("excuse");
    while (container.hasChildNodes()) {
        container.removeChild(container.lastChild);
    }
    var input = document.createElement("input");
    input.type = "radio";
    input.name = "excuse";
    input.value = "E";
    input.onclick = createReason;
    container.appendChild(input);
    container.appendChild(document.createTextNode("Excused"));
    var input2 = document.createElement("input");
    input2.type = "radio";
    input2.name = "excuse";
    input2.value = "U";
    input2.onclick = removeReason;
    container.appendChild(input2);
    container.appendChild(document.createTextNode("Unexcused"));
    container.appendChild(document.createElement("br"));
    container.appendChild(document.createElement("br"));
}
function removeExcuse() {
    container = document.getElementById("excuse");
    while (container.hasChildNodes()) {
        container.removeChild(container.lastChild);
    }
    container = document.getElementById("reason");
    while (container.hasChildNodes()) {
        container.removeChild(container.lastChild);
    }
}
function createReason() {
    container = document.getElementById("reason");
    while (container.hasChildNodes()) {
        container.removeChild(container.lastChild);
    }
    var input = document.createElement("input");
    input.type = "text";
    input.name = "reason";
    input.value = "";
    container.appendChild(document.createTextNode("Reason "));
    container.appendChild(input);
    container.appendChild(document.createElement("br"));
    container.appendChild(document.createElement("br"));
    var input2 = document.createElement("input");
    input2.type = "text";
    input2.name = "makeup";
    input2.value = "";
    container.appendChild(document.createTextNode("Makeup Date "));
    container.appendChild(input2);
    container.appendChild(document.createElement("br"));
    container.appendChild(document.createElement("br"));
}
function removeReason() {
    container = document.getElementById("reason");
    while (container.hasChildNodes()) {
        container.removeChild(container.lastChild);
    }
}
    </script>
</head>
<body>

<form id="attendance" action="submit_attendance.php" method="post">
  <input type="hidden" name="submit_attendance_table" value="<?echo $submit_attendance_table?>"/>
  <input type="hidden" name="user_id" value="<?echo $user?>"/>
  <input type="hidden" name="date" value="<?echo $date?>"/>
  <input type="hidden" name="code" value="<?echo $code?>"/>

  <div id="status">
  <input type="radio" name="status" value="present" onclick="removeExcuse()">Present
  <input type="radio" name="status" value="absent" onclick="createExcuse()">Absent
  <br/><br/>
  </div>

  <div id="excuse">
  </div>

  <div id="reason">
  </div>

  <input type="submit" value="Submit"/>

</form>

</body>
