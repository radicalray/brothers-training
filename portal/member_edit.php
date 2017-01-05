<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';

sec_session_start();
?>

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
    <title>2017 Boston Area Training on Eldership</title>
</head>

<?php include("../includes/header.html"); ?>
<?php include("../includes/navigation.html"); ?>

<body>

<?php

$id = $_GET['id'];
$res = get_group_list($mysqli, '', '', 'id', $id);
if ($res != 0) {
    $row = $res->fetch_assoc();
    if (!$row) {
        echo "not found";
    }
}
?>

<div class="content">
    <center><b>2016 Canada Training on Eldership<br/>
    Study Group Information</b></center><br/>

    <b>Edit Study Group Information</b><br/>
    <div class="application_section">
        <form method="post" onsubmit="return validateForm()" action="update_member.php"  name="member">
          <input type="hidden" name="id" value="<? echo "$row[id]"?>" />
            <b>Locality:</b><br/>
            <select id="locality" name="locality">
                <option value="<? echo "$row[locality]"?>"><? echo "$row[locality]" ?></option>
<?php echo get_provinces('../includes/localities.txt'); ?>

            </select><br/><br/>
        <b>Language:</b><br/>
        <select id="language" name="language">
                <option value="<? echo "$row[language]"?>"><?echo "$row[language]"?></option>
                <option value="English">English</option>
                <option value="Chinese">Chinese</option>
                <option value="French">French</option>
            </select><br/><br/>
       <b>Group Number:</b></br>
       <select id="group_no" name="group_no">
                <option value="<? echo "$row[group_no]"?>"><? echo "$row[group_no]"?></option>
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
            </select><br/><br/>
        <b>Group Meeting Day:</b><br/>
        <select id="mtg_day" name="mtg_day">
        <option value="<? echo "$row[mtg_day]"?>"><? echo "$row[mtg_day]"?></option>
        <option value="Lord&#39s Day">Lord's Day</option>
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
    </select><br/><br/>
        <b>Meeting Time:</b></br>
        <input type="text" name="mtg_time" id="mtg_time" size="30" value="<? echo "$row[mtg_time]"?>"/><br/></br>
        <b>Meeting Place:</b><br/>
        <input type="text" name="mtg_place" id="mtg_place" size="30" value="<? echo "$row[mtg_place]"?>"/><br/><br/>
        <b>Number of Group Members:</b><br/>
        <select id="member_no" name="member_no">
        <option value="<? echo "$row[member_no]"?>"><? echo "$row[member_no]"?></option>
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
        <option value=20>21</option>
        <option value=20>22</option>
        <option value=20>23</option>
        <option value=20>24</option>
        <option value=20>25</option>
        <option value=20>26</option>
        <option value=20>27</option>
        <option value=20>28</option>
        <option value=20>29</option>
        <option value=20>30</option>
           </select></br></br>
        <b>Members' Names</b><br/>
        <textarea name="member_name" id="member_name" rows="4" cols="40"><?echo "$row[member_name]"?></textarea><br/><br/>
        <input type="submit" value="Edit Study Group Information"/>
    </div>

</div>

</body>
</html>
