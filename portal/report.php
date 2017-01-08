<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <link href="signature/assets/jquery.signaturepad.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="signature/assets/flashcanvas.js"></script><![endif]-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script type="text/javascript">
    function validateForm() {
        var fn = document.forms["report"]["first_name"].value;
        var ln = document.forms["report"]["last_name"].value;
        var lc = document.forms["report"]["locality"].value;
        var em = document.forms["report"]["email"].value;
        var ls = document.forms["report"]["lesson"].value;
        var mid = document.forms["report"]["monitor_id"].value;

        if (fn == null || fn == "") {
            alert("Please enter your first name");
        } else if (ln == null || ln == "") {
            alert("Please enter your last name");
        } else if (lc == null || lc == "") {
            alert("Please enter your locality");
        } else if (em == null || em == "") {
            alert("Please enter your email");
        } else if (ls == null || ls == "") {
            alert("Please enter your Session number");
        } else if (mid == null || mid == "") {
            alert("Please select monitor taking this attendance.")
        } else {
            return true;
        }

        return false;
    }

    $(document).ready(function() {
        $('#group_input').change(function() {
            window.location = "/portal/report.php?group=" + $(this).val();
        });

        $('.absent').change(function() {
            var elem = $(this);
            var absent = elem.val();
            var excused = elem.parent().parent().find('.excused');

            if (absent == 1) {
                console.log('show', excused);
                excused.show();
            } else {
                console.log('hide', excused);
                excused.hide();
            }
            console.log($(this).val());

        })

        $('.excused input').change(function() {
            var elem = $(this);
            var excused = elem.is(':checked');
            var excused_info = elem.parent().parent().find('.excused_info');

            if (excused) {
                console.log('show', excused);
                excused_info.show();
            } else {
                console.log('hide', excused);
                excused_info.hide();
            }
            console.log($(this).val());

        })
    });
    </script>
    <style>
    .excused {
        display: none;
    }

    .excused_info {
        display: none;
        margin-left: 10px;
    }

    td {
        height: 25px;
    }
    </style>
    <title>Boston Area Training on Eldership</title>
</head>
<body>

<?php include("../includes/navigation.php"); ?>
<?php include("../includes/global-config.php"); ?>

<div class="content">
    <center><b><?php echo $year; ?> Boston Area Training on Eldership<br/>
    Group Study Report</b></center><br/>

    <b>Submit Study Reports</b><br/>
    <div class="application_section">
        <form method="post" onsubmit="return validateForm()" action="submit_report.php"  name="report">
            <b>Group Number: (Required)</b><br/>(Check with your local administrator if you don't know your group number.)</br>
            <?php
                include_once("../includes/db_connect.php");
                include_once("../includes/functions.php");

                $group = $_GET['group'];

                $res = get_all_groups($mysqli);
                echo '<select id="group_input" name="group_no">';
                echo "<option value=''>-----------</option>";
                while ($row = $res->fetch_assoc()) {
                // print_r ($row);
                    $grp = $row['group_no'];
                    $locality = $row['locality'];
                    $selected = $grp == $group ? 'selected' : '';
                    echo "<option name='group' value='$grp' $selected>Group $grp - $locality</option>";
                    // print $row['group_no'] . $row['locality'] . '<br/>';
                }

                echo '</select>';


                // if ($group) {
                //     $res = get_group_trainees($group, $mysqli);
                //     while ($row = $res->fetch_assoc()) {
                //     // print_r ($row);
                //         print $row['first_name'] . $row['last_name'] . '<br/>';
                //     }
                // }
            ?>
            <br/><br/>

            <?php if ($group) {
                ?>

            <b>Session:</b><br/>
            <select id="lesson" name="lesson">
                <option value=''>-----------</option>
                <?php
                $date_array = $group_dates;
                foreach (array_keys($date_array) as $date) {
                    echo "<option value='$date'>{$date_array[$date]}</option>";
                }
                ?>
            </select><br/><br/>
            <table>
                <thead>
                    <tr>
                        <td><b>Monitor</b></td>
                        <td><b>Present</b></td>
                        <td><b>Absent</b></td>
                    </tr>
                </thead>
                <?php
                    if ($group) {
                        $res = get_group_trainees($group, $mysqli);
                        while ($row = $res->fetch_assoc()) {
                            echo "<tr>";

                            $name = $row['first_name'] . " " . $row['last_name'];
                            $id = $row['id'];

                            print "<td><label> <input type='radio' name='monitor_id' value='$id' /> $name</label></td>";
                            print "<td><input class='absent' type='radio' name='absent[$id]' value='0' /></td>";
                            print "<td><input class='absent' type='radio' name='absent[$id]' value='1' /> ".
                                  "<label class='excused'> <input type='checkbox' name='excused[$id]' value='1'> Excused</label>".
                                  "<span class='excused_info'><input type='text' name='excused_reason[$id]' placeholder='Reason' /> <input type='date' name='makeup_date[$id]' placeholder='Makeup Date' /></span></td>";
                        // print_r ($row);
                            // print $row['first_name'] . $row['last_name'] . '<br/>';

                            echo "</tr>";
                        }
                    }
                ?>
            </table><br/>

        <b>Study Report: (100-200 words)</b><br/>
        <textarea name="study_report" id="study_report" rows="10" style="width:80%"></textarea><br/><br/>
        <b>Suggestions: (matters related to the training, what worked and what didn't)</b></br>
        <textarea name="suggestions" id="suggestions" rows="5" cols="60"> </textarea><br/><br/>
        <b>Do you want a copy of this report to be sent to your email account?</b><br/>
        <input type="radio" name="email_report" id="email_report" value="1">Yes<br/>
        <input type="radio" name="email_report" id="email_report" value="0" checked>No<br/><br/>
        <b>Date:</b><br/>
        <?echo date('l F jS\, Y h:iA');?><br/><br/>
        <input type="hidden" name="date" value="<?echo date('Y-m-d')?>"/>
        <input type="submit" value="Submit Study Report"/>

        <?php } ?>
    </div>

</div>

</body>
</html>
