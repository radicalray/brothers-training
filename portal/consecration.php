<?php include '../includes/register.inc.php'; ?>
<?php include '../includes/functions.php'; ?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <link href="signature/assets/jquery.signaturepad.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="signature/assets/flashcanvas.js"></script><![endif]-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script type="text/javascript">
    function validateForm()
    {
        var fn = document.forms["consecration"]["first_name"].value;
        var ln = document.forms["consecration"]["last_name"].value;
        var lc = document.forms["consecration"]["locality"].value;
        var em = document.forms["consecration"]["email"].value;
        if (fn == null || fn == "")
        {
            alert("Please enter your first name");
            return false;
        }
        else if (ln == null || ln == "")
        {
            alert("Please enter your last name");
            return false;
        }
        else if (lc == null || lc == "")
        {
            alert("Please enter your locality");
            return false;
        }
        else if (em == null || em == "")
        {
            alert("Please enter your e-mail address");
            return false;
        }
        else
        {
            return true;
        }
    }
    </script>
    <title> 2016 Boston Area Training on Eldership</title>
</head>
<body>

<?php include("../includes/header.html"); ?>
<?php include("../includes/navigation.html"); ?>

<div class="content">
    <center><b>2016 Boston Area Training on Eldership<br/>
    </center>
    <br/>
    <div class="application_section">


Lord Jesus,<br/><br/>

I love You. I love Your church, Your saints, and Your recovery. I am Your purchased slave and do not wish to go free. By Your mercy and grace I will serve You now and forever.<br/><br/>

I join this training not by compulsion but eagerly because I desire to be further perfected in Your hands and for Your use. Help me to be poor in spirit and pure in heart so Your word can have an uninhibited course in me. Free me from all self-pride and personal ambition. Grant me the readiness to receive Your instructions and the obedience to follow them.<br/><br/>

Give me a pursuing spirit so that I will gain what You want me to gain in the training. Supply me with an attitude to learn so that I will be genuinely equipped. Strengthen me to exercise diligence and endurance to meet the demands of the training and to fulfill its requirements. Blend me with my companions as we practice the things which are taught. Save me from individualism and independence.<br/><br/>

I present myself to You afresh and offer my being anew for the service of the church where I am placed. Make me a genuine steward of Your household, dispensing food to Your people at the appointed time. Whether I will be a leading brother or not, constitute me one of the normal, functioning, and coordinated members in Your Body according to the measure of faith which You have allotted to me.<br/><br/>

I entrust to You my whole being, my life, and my future. I submit to Your sovereign arrangements in all things.<br/><br/>

Bless me and all my co-trainees and the churches for the sake of Your testimony. Lord Jesus, I thank You for affording me this opportunity to be trained for Your purpose.<br/><br/>

Amen.<br/><br/>

    </div>

    <div class="application_section">
        <form method="post" onsubmit="return validateForm()" action="submit_consecration.php" class="sigPad" name="consecration">
            <b>First Name:</b><br/>
            <input type="text" name="first_name" id="first_name"/><br/><br/>
            <b>Last Name:</b><br/>
            <input type="text" name="last_name" id="last_name"/><br/><br/>
            <b>Signature:</b><br/>
            <i>(sign using your mouse, or finger/stylus on touchscreens)</i><br/>
            <div class="sig sigWrapper">
                <div class="typed"></div>
                <canvas class="pad" width="198" height="55"></canvas>
                <input type="hidden" name="output" class="output">
            </div>
            <a href="#clear" class="clearButton">[Clear Signature]</a><br/><br/>
            <b>Locality:</b><br/>
            <select id="locality" name="locality">
              <option value="">----</option>
              <option value="Amherst, MA">Amherst, MA</option>
              <option value="Boston, MA">Boston, MA</option>
              <option value="Cambridge, MA">Cambridge, MA</option>
              <option value="Lowell, MA">Lowell, MA</option>
              <option value="Middleboro, MA">Middleboro, MA</option>
              <option value="Newton, MA">Newton, MA</option>
              <option value="Worcester, MA">Worcester, MA</option>
              <option value="North Providence, RI">North Providence, RI</option>
                <!-- <?php echo get_provinces('../includes/localities.txt'); ?> -->
            </select><br/><br/>
        <b>E-mail Address:</b> (Use the same email as the one on your registration form)<br/>
        <input type="text" name="email" id="email"/><br/><br/>
        <b>Date:</b><br/>
        <!--<?php date_default_timezone_set("America/NewYork") ?>-->
        <?echo date('l F jS\, Y');?><br/><br/>
        <input type="hidden" name="date" value="<?echo date('Y-m-d')?>"/>
        <input type="submit" value="Submit Consecration"/>
    </div>

</div>

<script src="signature/jquery.signaturepad.js"></script>
<script>
    $(document).ready(function() {
        $('.sigPad').signaturePad({drawOnly:true});
    });
</script>
<script src="signature/assets/json2.min.js"></script>

</body>
</html>
