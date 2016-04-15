<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>View Applicant</title>
    <link href="../signature/assets/jquery.signaturepad.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="../signature/assets/flashcanvas.js"></script><![endif]-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../styles.css" />
<style>
body {
   background-color: #FEFFE6;
}
</style>
</head>
<?php include("../../includes/header.html"); ?>
<?php include("../../includes/navigation.html"); ?>
<body>
<?php if (login_check($mysqli) == true) : ?>

<?php

$display = [
    "first_name"=>"First Name",
    "last_name"=>"Last Name",
    "age"=>"Age",
    "email"=>"Email",
    "phone"=>"Phone", "occupation"=>"Occupation", "language"=>"Language",
    "date_saved"=>"Date Saved",
    "date_baptized"=>"Date Baptized",
    "church_raised"=>"Church Raised?",
    "date_entered_church"=>"Date Entered Church",
    "services"=>"Services",
    "training"=>"Attended Training",
    "payment_method"=>"Payment Method",
    "payment_verification"=>"Payment Verification",
    "date_submitted"=>"Date Submitted",
    "consecrated"=>"Consecrated"
];

$id = $_GET['id'];
$res = getlist($mysqli, '', '', 'id', $id);
$sig = getsig($mysqli, $id);
$message_type = "";
if (isset($_GET['message_type'])) {$message_type = $_GET['message_type'];} else {$message_type = "info";}
if (isset($_GET['message'])) echo '<div class="'.$message_type.'">'.$_GET['message']."</div></br>";

if ($res != 0) {
    $row = $res->fetch_assoc();
    if (!$row) {
        echo "not found";
    }
    else {
        echo "<table border=1>";
        foreach (array_keys($display) as $key) {
            echo "<tr><td>{$display[$key]}</td><td>";
            echo $row[$key];
            echo "</td></tr>";
        }
        if ($row['consecrated'] == 1) {
            echo "<tr><td>Signature</td><td><div class=\"sigPad signed\">".
                 "<div class=\"sigWrapper\">".
                 "<canvas class=\"pad\" width=\"200\" height=\"55\"></canvas>".
                 "</div>".
                 "</div></td></tr>";
        }
        echo "</table>";
        echo "<br/><br/>";
        

/*        // allowing the administrator to approve or not approve the application 
        if ($row['approved_by'] == "") { 
            echo "<br/><form action=\"approve.php\" method=\"post\">Comments:<br/><textarea cols=\"50\" rows=\"5\" name=\"comments\">{$row['comments']}</textarea><br/>".
                 "<select id=\"approved\" name=\"approved\">".
                 "   <option  value=\"1\">Approved</option>".
                 "   <option  value=\"0\">Not Approved</option>".
                 "</select><br/><br/>".
                 "<input type=\"hidden\" name=\"id\" value=\"{$row['id']}\" />".
                 "<button type=\"submit\">Submit</button></form>";
        }
        else {
            if ($row['approved'] == 1)
            echo "Applicant APPROVED by {$row['approved_by']} on {$row['approved_date']}<br/>Comments: {$row['comments']}<br/><br/>";
            else echo "Applicant NOT APPROVED by {$row['approved_by']} on {$row['approved_date']}<br/>Comments: {$row['comments']}<br/><br/>";
        }
*/

        // allowing the administrator to approve or not approve the application 

	echo "<hr><h1>Approve Application</h1>";
	    $approved_selected = "";
	    $not_approved_selected = "";
            if ($row['approved'] == 1) {
               echo "Applicant <b>APPROVED</b> by {$row['approved_by']} on {$row['approved_date']}<br/>Comments: {$row['comments']}<br/><br/>";
	       $approved_selected = " selected";
	    }
            else {
	       echo "Applicant <b>NOT APPROVED</b> by {$row['approved_by']} on {$row['approved_date']}<br/>Comments: {$row['comments']}<br/><br/>";
	       $not_approved_selected = " selected";
    	    }

            echo "<br/><form action=\"approve.php\" method=\"post\">".
                 "<select id=\"approved\" name=\"approved\">".
                 "   <option value=\"1\"".$approved_selected.">Approved</option>".
                 "   <option value=\"0\"".$not_approved_selected.">Not Approved</option>".
                 "</select><br/><br/>".
                 "<input type=\"hidden\" name=\"id\" value=\"{$row['id']}\" />".
		 "Comments:<br/><textarea cols=\"50\" rows=\"5\" name=\"comments\">{$row['comments']}</textarea><br/>".
    "<b>Send an email notification to the user? </b> <input type=\"radio\" name=\"email_notification\" id=\"email_notification\" value=\"1\" checked>Yes <input type=\"radio\" name=\"email_notification\" id=\"email_notification\" value=\"0\">No<br/>".
                 "<button type=\"submit\">Submit</button></form>";

       echo "<br/><br/><hr><h1>Verify Payment</h1>"; 

        $paid_selected = "";
        $not_paid_selected = "";
        if ($row['payment_verification'] == 0) { $not_paid_selected = " selected"; } else { $paid_selected = " selected"; }

        echo "<form id=\"verify_payment_{$row['id']}\" action=\"verify.php\" method=\"post\"><input type=\"hidden\" name=\"id\" value=\"{$row['id']}\">";
        echo "<select id=\"payment\" name=\"payment\">".
                "<option value=\"1\"".$paid_selected.">Payment Verified</option>".
                "<option value=\"0\"".$not_paid_selected.">Not Yet Paid</option>".
             "</select></br></br>".
    "<b>Send an email notification to the user? </b> <input type=\"radio\" name=\"email_notification\" id=\"email_notification\" value=\"1\" checked>Yes <input type=\"radio\" name=\"email_notification\" id=\"email_notification\" value=\"0\">No<br/>".
             "<button type=\"submit\">Submit</button></form>";



/*        echo "<form id=\"verify_payment_{$row['id']}\" action=\"verify.php\" method=\"post\"><input type=\"hidden\" name=\"id\" value=\"{$row['id']}\"><input type=\"hidden\" name=\"payment\" value=\"1\"></form>";
        if ($row['payment_verification'] == 0) {
            echo "Click<b> <a href=\"javascript:{}\" onclick=\"document.getElementById('verify_payment_{$row['id']}').submit();\"> HERE</a></b> if you have verifed the applicant's payment.<br/> ";
        }*/

    }
}

        echo "<br/><br/>";
        echo "<a href=\"list.php\"><b>BACK</a> to Applicants' List | <a href=\"/brotherstraining/portal/index.php\"><b>HOME</a></b>";
        echo "<br /><br/>";
?>

<?php else : ?>
<p>
    <span class="error">You are not authorized to access this page.</span><br/><br/><br/>Please <a href="index.php">login</a>.
</p>
<?php endif; ?>

<script src="../signature/jquery.signaturepad.js"></script>
<script>
    var sig = <?php echo $sig?>;
    $(document).ready(function () {
        $('.sigPad').signaturePad({displayOnly:true}).regenerate(sig);
    });
</script>
<script src="signature/assets/json2.min.js"></script>

</body>
</html>
