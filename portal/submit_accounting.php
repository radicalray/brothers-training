<?php
include_once '../includes/db_connect.php';

$fn = $_POST['first_name'];
$ln = $_POST['last_name'];
$lc = $_POST['locality'];
$dt = $_POST['date_submitted'];
$em = strtolower($_POST['email']);
$ad0 = $_POST['address0'];
$rt = $_POST['report_type'];
$rm = $_POST['remark'];
$dt1 = $_POST ['date1'];
$dt2 = $_POST ['date2'];
$dt3 = $_POST ['date3'];
$dt4 = $_POST ['date4'];
$dt5 = $_POST ['date5'];
$dt6 = $_POST ['date6'];
$dt7 = $_POST ['date7'];
$dt8 = $_POST ['date8'];
$dt9 = $_POST ['date9'];
$dt10 = $_POST ['date10'];
$ds1 = $_POST ['desc1'];
$ds2 = $_POST ['desc2'];
$ds3 = $_POST ['desc3'];
$ds4 = $_POST ['desc4'];
$ds5 = $_POST ['desc5'];
$ds6 = $_POST ['desc6'];
$ds7 = $_POST ['desc7'];
$ds8 = $_POST ['desc8'];
$ds9 = $_POST ['desc9'];
$ds10 = $_POST ['desc10'];
$py1 = $_POST ['payee1'];
$py2 = $_POST ['payee2'];
$py3 = $_POST ['payee3'];
$py4 = $_POST ['payee4'];
$py5 = $_POST ['payee5'];
$py6 = $_POST ['payee6'];
$py7 = $_POST ['payee7'];
$py8 = $_POST ['payee8'];
$py9 = $_POST ['payee9'];
$py10 = $_POST ['payee10'];
$ad1 = $_POST ['address1'];
$ad2 = $_POST ['address2'];
$ad3 = $_POST ['address3'];
$ad4 = $_POST ['address4'];
$ad5 = $_POST ['address5'];
$ad6 = $_POST ['address6'];
$ad7 = $_POST ['address7'];
$ad8 = $_POST ['address8'];
$ad9 = $_POST ['address9'];
$ad10 = $_POST ['address10'];
$am1  = $_POST ['amount1'];
$am2 = $_POST ['amount2'];
$am3 = $_POST ['amount3'];
$am4 = $_POST ['amount4'];
$am5 = $_POST ['amount5'];
$am6 = $_POST ['amount6'];
$am7 = $_POST ['amount7'];
$am8 = $_POST ['amount8'];
$am9 = $_POST ['amount9'];
$am10 = $_POST ['amount10'];
$ta = $_POST ['totalAmount'];

$good_rm = $mysqli->real_escape_string(trim("$rm")); // remove apostrophe s problem

$res = $mysqli->query("INSERT INTO accounting (first_name, last_name, locality, date_submitted, email, address0, report_type, remark, date1, desc1, payee1, address1, amount1, date2, desc2, payee2, address2, amount2, date3, desc3, payee3, address3, amount3, date4, desc4, payee4, address4, amount4, date5, desc5, payee5, address5, amount5, date6, desc6, payee6, address6, amount6, date7, desc7, payee7, address7, amount7, date8, desc8, payee8, address8, amount8, date9, desc9, payee9, address9, amount9, date10, desc10, payee10, address10, amount10, total_amount)  VALUES
 ('$fn', '$ln', '$lc', '$dt', '$em', '$ad0', '$rt', '$good_rm', '$dt1', '$ds1', '$py1', '$ad1', '$am1', '$dt2', '$ds2', '$py2', '$ad2', '$am2', '$dt3', '$ds3', '$py3', '$ad3', '$am3','$dt4', '$ds4', '$py4', '$ad4', '$am4','$dt5', '$ds5', '$py5', '$ad5', '$am5','$dt6', '$ds6', '$py6', '$ad6', '$am6', '$dt7', '$ds7', '$py7', '$ad7', '$am7','$dt8', '$ds8', '$py8', '$ad8', '$am8', '$dt9', '$ds9', '$py9', '$ad9', '$am9','$dt10', '$ds10', '$py10', '$ad10', '$am10','$ta')");

if (isset($_POST['email_report'])) {
    $er = $_POST['email_report'];
    if ($er) {
        $mysqli->real_escape_string($em);
        $to = $em. ", admin@churchincambridge.org";
        $subject = "Boston Area Brothers Training: Expense Report";
        $from = 'admin@churchincambridge.org';
        $body = 'Hi, the following is the report you have submitted: <br/><br/>First Name: '.$fn.'<br/>
         Last Name: '.$ln.'<br/>
         Email: '.$em.'<br/>
         Locality: '.$lc.'<br/>
         Address: '.$ad0.'<br/>
         Report Type: '.$rt.'<br/>
         Remark: '.$rm.'<br/>
         Date Submitted: '.$dt.'<br/><br/><br/>
         <table border="1" style="width:100%">
         <colgroup>
              <col span="1" style="width:10%;">
              <col span="1" style="width:25%;">
              <col span="1" style="width:15%;">
              <col span="1" style="width:25%;">
              <col span="1" style="width:15%;">
        </colgroup>
        <tr><td> Date </td><td> Description </td><td> Payee </td><td> Address </td><td> Amount </td>
        <tr><td>'.$dt1.'</td>
            <td>'.$ds1.'</td>
            <td>'.$py1.'</td>
            <td>'.$ad1.'</td>
            <td>'.$am1.'</td></tr>
       <tr><td>'.$dt2.'</td>
            <td>'.$ds2.'</td>
            <td>'.$py2.'</td>
            <td>'.$ad2.'</td>
            <td>'.$am2.'</td></tr>
       <tr><td>'.$dt3.'</td>
            <td>'.$ds3.'</td>
            <td>'.$py3.'</td>
            <td>'.$ad3.'</td>
            <td>'.$am3.'</td>
       <tr><td>'.$dt4.'</td>
            <td>'.$ds4.'</td>
            <td>'.$py4.'</td>
            <td>'.$ad4.'</td>
            <td>'.$am4.'</td></tr>
       <tr><td>'.$dt5.'</td>
            <td>'.$ds5.'</td>
            <td>'.$py5.'</td>
            <td>'.$ad5.'</td>
            <td>'.$am5.'</td></tr>
       <tr><td>'.$dt6.'</td>
            <td>'.$ds6.'</td>
            <td>'.$py6.'</td>
            <td>'.$ad6.'</td>
            <td>'.$am6.'</td></tr>
       <tr><td>'.$dt7.'</td>
            <td>'.$ds7.'</td>
            <td>'.$py7.'</td>
            <td>'.$ad7.'</td>
            <td>'.$am7.'</td></tr>
       <tr><td>'.$dt8.'</td>
            <td>'.$ds8.'</td>
            <td>'.$py8.'</td>
            <td>'.$ad8.'</td>
            <td>'.$am8.'</td></tr>
       <tr><td>'.$dt9.'</td>
            <td>'.$ds9.'</td>
            <td>'.$py9.'</td>
            <td>'.$ad9.'</td>
            <td>'.$am9.'</td></tr>
       <tr><td>'.$dt10.'</td>
            <td>'.$ds10.'</td>
            <td>'.$py10.'</td>
            <td>'.$ad10.'</td>
            <td>'.$am10.'</td></tr>
       <tr><td></td><td></td><td></td><td>Total Amount</td><td>'.$ta.'</td></tr>
        </table><br/><br/>
        Note: This is an automically generated email, please do not reply. Email admin@churchincambridge.org if you have questions.';
        $headers = "From: ". strip_tags($from) . "\r\n";
        $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        mail($to,$subject,$body,$headers);
        header("Location: /portal/email_report.html?email=$em");
    }
    else {
        header("Location:/portal/accounting_submitted.html");
    }
}
?>
