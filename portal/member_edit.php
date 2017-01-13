<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script type="text/javascript">
    function validateForm()
    {
        var lc = document.forms["member"]["locality"].value;
        var ln = document.forms["member"]["language"].value;
        var gn = document.forms["member"]["group_no"].value;
        if (fn == null || lc == "")
        {
            alert("Please enter your locality");
            return false;
        }
        else if (ln == null || ln == "")
        {
            alert("Please enter your language");
            return false;
        }
        else if (lc == null || gn == "")
        {
            alert("Please enter your group_no");
            return false;
        }
        else
        {
            return true;
        }
    }
    </script>
    <title><?php echo date("Y"); ?> Boston Area Training on Eldership</title>
</head>
<body>

<?php include("../includes/navigation.php"); ?>
<?php include_once("../includes/db_connect.php"); ?>
<?php include_once("../includes/functions.php"); ?>

<div class="content">
    <center><b><?php echo $year; ?> Boston Area Training on Eldership<br/>
    Study Group Information</b></center><br/>

    <b>Edit Study Group Information</b><br/>
    <div class="application_section">
        <form method="post" onsubmit="return validateForm()" action="submit_member.php"  name="member">
            <b>Locality:</b><br/>
            <select id="locality" name="locality">
                <option value="">----</option>
                <?php echo get_provinces('../includes/localities.txt'); ?>

            </select><br/><br/>
       <b>Group Number:</b></br>
       <select id="group_no" name="group_no">
                <option value=0>----</option>
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option value=5>5</option>
                <option value=6>6</option>
                <option value=7>7</option>
                <option value=8>8</option>
                <option value=9>9</option>
                <option value=10>10</option>
                <option value=11>11</option>
                <option value=12>12</option>
                <option value=13>13</option>
                <option value=14>14</option>
                <option value=15>15</option>
                <option value=16>16</option>
                <option value=17>17</option>
                <option value=18>18</option>
                <option value=19>19</option>
                <option value=20>20</option>
            </select><br/><br/>
        <b>Group Meeting Day:</b><br/>
        <select id="mtg_day" name="mtg_day">
        <option value=''>-----------</option>
        <option value="Lord&#39s Day">Lord's Day</option>
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
    </select><br/><br/>
        <b>Meeting Time:</b></br>
        <input type="text" name="mtg_time" id="mtg_time" size="30"/><br/></br>
        <b>Meeting Place:</b><br/>
        <input type="text" name="mtg_place" id="mtg_place" size="30"/><br/><br/>
        <b>Members</b><br/>
        <?php include_once("../includes/functions.php"); ?>
        <?php
            $res = get_all_trainees($mysqli);
            while ($row = $res->fetch_assoc()) {
                // print_r ($row);
                // print $row['first_name'] . $row['last_name'], $row['id'];
                print '<label> <input type="checkbox" name="member_ids[]" value="' . $row['id'] . '" /> '. $row['first_name'] . " " . $row['last_name'] . "</label><br/>";
            }
        ?>
        <input type="submit" value="Submit Study Group Information"/>
        <a href="/portal/">Cancel</a>
    </div>

</div>

</body>
</html>
