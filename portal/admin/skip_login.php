<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';

sec_session_start(); // Our custom secure way of starting a PHP session.

if(isset($_GET['task'])) {
    $task = $_GET['task'];

    $register = "register";
    $month_attendance = "month_attendance";
    $week_attendance = "week_attendance";
    $report = "report";
    $accounting = "accounting";
    $member = "member";
    $list = "list";
    $user_name = $_SESSION['username'];
    $forbid_user = "3rdTerm";
    $home = "";
    if (!strcmp($task,$register)){ // task is registration
        header('Location: /portal/registration.php');
    } elseif (!strcmp($task,$month_attendance) && strcmp($user_name,$forbid_user)){ // task is monthly attendance
        header('Location: /portal/admin/attendance_list.php?attendance_task=attendance');
    } elseif (!strcmp($task, $week_attendance) && strcmp($user_name,$forbid_user)) { //task is weekly attendance
        header('Location: /portal/admin/attendance_list.php?attendance_task=group_attendance');
    } elseif (!strcmp($task,$report) && strcmp($user_name,$forbid_user)){ // task is to review report
        header('Location: report_list.php');
    } elseif (!strcmp($task, $accounting) && strcmp($user_name,$forbid_user)) { // task is accounting
        header('Location: accounting_list.php');
    } elseif (!strcmp($task, $member) && strcmp($user_name,$forbid_user)) { // task is group member
        header('Location: member_list.php');
    } elseif (!strcmp($task, $list) && strcmp($user_name,$forbid_user)) { // task is administration
        header('Location: list.php');
    } elseif (!strcmp($task, $home)) {
        header("Location: /portal/index.php");
    } else {
        header("Location: /portal/admin/index.php?login_failed=1&task=$task");
    }
} else {
    // The correct GET variables were not sent to this page.
    echo 'Invalid Request';
}
