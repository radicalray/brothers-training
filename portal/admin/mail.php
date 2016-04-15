<?php
$to = 'brianchoy1111@gmail.com';
$subject = 'Testing mail';
$message = 'Hello world!';
$heders = 'From: ncchurches_admin@spruce.dreamhost.com'."\r\n".
          'Reply-To: ncchurches_admin@spruce.dreamhost.com'."\r\n".
          'X-Mailer: PHP/'.phpversion();
mail($to, $subject, $message, $headers);
?>
