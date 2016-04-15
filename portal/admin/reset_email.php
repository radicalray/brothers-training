<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}

if(isset($_POST['email']))
{
        $email= mysqli_real_escape_string($mysqli,$_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
        {
	    header('Location: /portal/admin/reset_password.php?not_found=1');
        }
        else
        {
            $query1 = "SELECT id FROM members where email='".$email."'";
            $result1 = mysqli_query($mysqli,$query1);
            $Results1 = mysqli_fetch_array($result1);
            if(count($Results1)>=1)
            {
                $code = mt_rand(1000, 9999);
                $id = $Results1['id'];
                $query2 = "UPDATE members SET reset_code = $code, reset_time = now()  where id = $id";
                $result2 = mysqli_query($mysqli,$query2);
                $to=$email;
                $subject="Boston Area Brothers Training: Password Reset";
                $from = 'admin@churchincambridge.org';
                $body='Hi, <br/><br/>Your code is '.$code.' <br><br>You will need your code to reset your password. <br/><br/>Click <a href="http://brotherstraining.churchincambridge.org/portal/admin/reset_code.php?id='.$id.'"/>Here</a> to reset your password.<br/><br/>';
                $headers = "From: " . strip_tags($from) . "\r\n";
                $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                $res = mail($to,$subject,$body,$headers);
                header('Location: ../reset_submitted.html');
            }
            else
            {
                header('Location: /portal/admin/reset_password.php?not_found=1');
            }
        }
}
?>
