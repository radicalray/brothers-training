<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}

if(isset($_POST['code']) && isset($_POST['id']))
{
   $code = $_POST['code'];
   $id = $_POST['id'];
   $query1 = "SELECT * FROM members where id=$id and reset_code=$code";
   $result1 = mysqli_query($mysqli,$query1);
   $Results1 = mysqli_fetch_array($result1);
   if(count($Results1)>=1)
   {
      $query2 = "DELETE FROM members where id = $id";
      $result2 = mysqli_query($mysqli,$query2);
      header('Location: ../reset_success.html');
   }
   else
   {
      header('Location: /portal/admin/reset_code.php?not_match=1');
   }
}
?>
