<?php
include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
if (isset($_GET['task'])) {
   $task = $_GET['task'];
}
if (isset($_GET['username'])) {
    $user_name = $_GET['username'];
    if (!strcmp($user_name,"3rdTerm")) {
        $pass_word = "8b653cfff75c6467f9e9f066237ee144b7ba7919079357ca69feedbb7843b87eae8a6b3948347e0da366803a95ffeb9e6a113506e4d6e1b72a2ca9954ab02c99";
    header("Location:/portal/admin/process_login.php?username=$user_name&password=$pass_word&task=register");
}}

global $year;
$year = "2017";

?>

<?php include("header.html"); ?>

<div class="navigation">
 <b>
  <ul id="mainmenu">
    <li><a href="/portal/">Home</a></li>
    <li><a href="">Media</a>
     <ul id="sub_media">
        <li><a href="/portal/admin/media_access.php">Training Lessons</a></li>
        <li><a href="/portal/admin/elder_only.php">Elders' Fellowship</a><li>
        <li><a href="/portal/special_fellowship.php">Special Fellowship</a><li>
     </ul>
    </li>
    <li><a href="/portal/register.php">Registration</a>
     <ul id="sub_application">
        <!-- This is New (1st term) registration -->
        <!-- <li><a href="/portal/register.php">New Registration</a></li> -->
        <!-- This is Reregistration (2nd term+) -->
        <li><a href="/portal/admin/index.php?task=register">Renew Application</a></li>
        <li><a href="/portal/consecration.php">Consecration</a></li>
     </ul>
    </li>
    <!--li><a href="">Attendance</a>
     <ul id="sub_attendance">
        <li><a href="/brotherstraining/portal/training_rollcall.html">Mark Monthly Present</a></li>
        <li><a href="/brotherstraining/portal/group_rollcall.html">Mark Weekly Present</a></li>
     </ul>
    </li-->
    <li><a href="">Study Group</a>
     <ul id="sub_report">
        <li><a href="/portal/member.php">Submit Group Info</a></li>
        <li><a href="/portal/report.php">Submit Study Report</a></li>
     </ul>
    </li>
    <!--li><a href="">Accounting</a>
     <ul id="sub_accounting">
        <li><a href="/brotherstraining/portal/accounting_report.html">Expense Report</a></li>
     </ul>
    </li-->
    <li><a href="/portal/admin.php">For Local Administrators</a>
     <ul id="sub_administration">
        <li><a href="/portal/admin/register_administrator.php">Register Administrator</a></li>
        <li><a href="/portal/admin/index.php?task=list">List and Approve trainees</a></li>
	<li><a href="/portal/attendance.php">Attendance</a></li>
        <!--li><a href="/brotherstraining/portal/admin/index.php?task=week_attendance">Weekly Group Attendance</a></li-->
        <!--li><a href="/brotherstraining/portal/admin/index.php?task=month_attendance">Monthly Training Attendance</a></li-->
        <li><a href="/portal/admin/index.php?task=member">Review Study Group Info</a></li>
        <li><a href="/portal/admin/index.php?task=report">Review Study Group Report</a></li>
        <li><a href="/portal/accounting.php">Accounting</a></li>
        <!--li><a href="/brotherstraining/portal/admin/index.php?task=accounting">Reimburse Expense Report</a></li-->
     </ul>
    </li>
    <li><a href="/portal/help.php">Help</a></li>
    <li>
    <?php
    // print_r ($_SESSION);
        if (htmlentities($_SESSION['username'])) {
            echo '<a href="/portal/admin/logout.php">Logout ('.htmlentities($_SESSION['username']).')</a></li>';
        } else {
            echo '<a href="/portal/admin/signin.php">Sign in</a>';
        }
    ?>
    </li>
  </ul>
 </b>
</div>
<br/><br/>
