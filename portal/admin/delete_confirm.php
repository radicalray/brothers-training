<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';

sec_session_start();

$id = $_GET['id'];
$table = $_GET['table'];

?>
<html>
<form method="POST" action="delete.php">
         <b>Are you sure you want to delete this record in <?php echo $table; ?></b>
         <br/><br/><input type="radio" name="answer" value=1>Yes</input><br/><br/>
         <input type="radio" name="answer" value=0>No</input><br/><br/>
         <input type="hidden" name="id" value=<?php echo $id; ?>>
         <input type="hidden" name="table" value=<?php echo $table; ?>>
         <input type="submit" name="submit" value="Go">
         </form>
</html>
