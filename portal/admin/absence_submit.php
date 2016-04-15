<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';

sec_session_start();

$attendance_table = $_GET['attendance_table'];
$update_field = $_GET['update_field'];
$user_id = $_GET['user_id'];
$training_date = $_GET['training_date'];

    {?>
            <form method="POST" action="absence_update.php">
            <input type="hidden" name="update_field" value="<?php echo $update_field?>"/>
            <input type="hidden" name="attendance_table" value="<?php echo $attendance_table?>"/>
            <input type="hidden" name="user_id" value="<?php echo $user_id?>" />
            <input type="hidden" name="training_date" value="<?php echo $training_date?>" />
            Please enter the new value: <input type="update_value" name="update_value"></input><br/><br/>
            <input type="submit" name="submit" value="Go"></input>
            </form>
    <?}
?>
