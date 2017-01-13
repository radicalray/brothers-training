<?php
include_once '../includes/psl-config.php';

  $connection = mysql_connect(HOST, USER, PASSWORD);

  if(!$connection)
  {
    die('could not connect to database: '.mysql_error());
  }

//Check required fields

$filled = true;
$required = array("first_name", "last_name", "email","locality"); //all the required fields

//Cycle through each field and make sure its filled
foreach ($required as &$value) {
    if($_POST[$value]=="" || $_POST[$value]=="none"){$filled=false;}
}


//If there are any fields not filled out, send the user back to the form
if (!$filled){
   header("Location:input_error.html");
}
else{

  mysql_select_db(DATABASE, $connection);

  $my_fields = [
    'first_name',
    'last_name',
    'age',
    'email',
    'phone',
    'locality',
    'occupation',
    'language',
    'date_saved',
    'date_baptized',
    'church_raised',
    'date_entered_church',
    'services',
    'training',
    'payment_method',
    'first_term'
  ];

  $my_values = [];
  $sql_update = "";
  $id = mysql_real_escape_string($_POST['id']);

  foreach ($my_fields as $field)
  {
    $my_values[$field] = mysql_real_escape_string($_POST[$field]);
    if (!strcmp($field,"first_term")) { //dealing with the last field
       $sql_update .= $field."='".$my_values[$field]."' "; //no need of coma
    }
    else {
       $sql_update .= $field."='".$my_values[$field]."', ";
    }
  }

  $sql_query = "UPDATE applications SET {$sql_update} WHERE id=$id";

  $result = mysql_query($sql_query);

 if (isset($_POST['email_report'])) {
    $er = $_POST['email_report'];
    if ($er) {
        $to = $my_values[email];
        $subject = "Boston Training on Eldership: Application Information";
        $from = 'admin@churchincambridge.org';
        $body = 'Hi, your application has been updated by your local administrator: <br/><br/>First Name: '.$my_values[first_name].'<br/>
         Last Name: '.$my_values[last_name].'<br/>
         Age: '.$my_values[age].'<br/>
         Email: '.$my_values[email].'<br/>
         Phone: '.$my_values[phone].'<br/>
         Locality: '.$my_values[locality].'<br/>
         Occupation: '.$my_values[occupation].'<br/>
         Language: '.$my_values[language].'<br/>
         Date Saved: '.$my_values[date_saved].'<br/>
         Date Baptized: '.$my_values[date_baptized].'<br/>
         Raised In Church: '.$my_values[church_raised].'<br/>
         Date Entered Church Life: '.$my_values[date_entered_church].'<br/>
         Services: '.$my_values[services].'<br/>
         Training: '.$my_values[training].'<br/>
         Payment Method: '.$my_values[payment_method].'<br/><br/>
         Note: This is an automatically generated email, please do not reply. Email admin@churchincambridge.org if you have questions.';
        $headers = "From: ". strip_tags($from) . "\r\n";
        $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        mail($to,$subject,$body,$headers);
    }
}

  if ($result)
  {
    header('Location:verified.php?payment='.$my_values['payment_method']);
  }

  mysql_close($connection);

}
?>
