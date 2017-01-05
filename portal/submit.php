<?php
include_once '../includes/psl-config.php';   // As functions.php is not included

  $connection = mysql_connect('mysql.churchincambridge.org', 'sbruso', '2608amtT');
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
else {

  mysql_select_db('brotherstraining', $connection);

  $my_fields = [
    'first_name',
    'last_name',
    'age',
    'email',
    'phone',
    'locality',
    'church_raised',
    'date_entered_church',
    'services',
    'training',
    'payment_method',
    'first_term',
    'home_address',
    'city',
    'state',
    'zip_code',
    'marital_status',
    'children'
  ];

  $my_values = [];
  $sql_fields = "";
  $sql_values = "";
  $error_msg = "";

  foreach ($my_fields as $field)
  {
    $my_values[$field] = mysql_real_escape_string($_POST[$field]);
    $sql_fields .= $field.", ";
    $sql_values .= "'".$my_values[$field]."', ";
  }

  $email_qry = sprintf("SELECT id FROM applications WHERE email = '%s' LIMIT 1",
		mysql_real_escape_string($my_values['email']));
  $email_qry_rslt = mysql_query($email_qry);


  if (mysql_num_rows($email_qry_rslt) >= 1) {
      // A user with this email address already exists
      $error_msg .= 'An application with this email address already exists. Please wait for your approval. Contact your Local Administrator if you require furthur assistance.';
      //$row = mysql_fetch_assoc($email_qry_rslt);
      //$id = $row['id'];
      header('Location:error.php?err_msg='.$error_msg);
  }

  else {

    $sql_query = "INSERT INTO applications ({$sql_fields} date_submitted) VALUES ({$sql_values} NOW())";
    $result = mysql_query($sql_query);

    if (isset($_POST['email_report'])) {
      $er = $_POST['email_report'];
      if ($er) {
          $to = $my_values[email];
          $subject = "Boston Area Brothers Training: Application Information";
          $from = 'admin@churchincambridge.org';
          $body = 'Hi, the following is the application you have submitted: <br/><br/>First Name: '.$my_values[first_name].'<br/>
           Last Name: '.$my_values[last_name].'<br/>
           Address: '.$my_values[home_address].'<br/>
           City: '.$my_values[city].'<br/>
           State: '.$my_values[state].'<br/>
           Zip Code: '.$my_values[zip_code].'<br/>
           Age: '.$my_values[age].'<br/>
           Email: '.$my_values[email].'<br/>
           Phone: '.$my_values[phone].'<br/>
           Locality: '.$my_values[locality].'<br/>
           Marital Status: '.$my_values[marital_status].'<br/>
           Children: '.$my_values[children].'<br/>
           Raised In Church: '.$my_values[church_raised].'<br/>
           Date Entered Church Life: '.$my_values[date_entered_church].'<br/>
           Services: '.$my_values[services].'<br/>
           Training: '.$my_values[training].'<br/>
           Payment Method: '.$my_values[payment_method].'<br/><br/>
           Note: This is an automatically generated email, please do not reply. ';
          $headers = "From: \"Boston Area Brothers Training\" <". strip_tags($from) . ">\r\n";
          $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
          $headers .= "MIME-Version: 1.0\r\n";
          $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
          mail($to,$subject,$body,$headers);
      }
    }

    if ($result) { header('Location:verified.php?payment='.$my_values['payment_method']); }
    else { die('could not connect to database: '.mysql_error()); }
  }

  mysql_close($connection);

}
?>
