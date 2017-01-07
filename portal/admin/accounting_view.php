<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>View Accounting Table</title>
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
<?php include("../../includes/navigation.php"); ?>
<body>
<?php if (login_check($mysqli) == true) : ?>

<?php

$display = [
    "first_name"=>"First Name",
    "last_name"=>"Last Name",
    "email"=>"Email",
    "locality"=>"Locality",
    "address0"=>"Address",
    "report_type"=>"Report Type",
    "total_amount"=>"Total Amount",
    "date_submitted"=>"Date Submitted",
    "remark"=>"Remark"
];

$line1 = [
    "date1"=>"Date (1)",
    "desc1"=>"Description (1)",
    "payee1"=>"Payee (1)",
    "address1"=>"Address (1)",
    "amount1"=>"Amount (1)"
];

$line2 = [
    "date2"=>"Date (2)",
    "desc2"=>"Description (2)",
    "payee2"=>"Payee (2)",
    "address2"=>"Address (2)",
    "amount2"=>"Amount (2)"
];

$line3 = [
    "date3"=>"Date (3)",
    "desc3"=>"Description (3)",
    "payee3"=>"Payee (3)",
    "address3"=>"Address (3)",
    "amount3"=>"Amount (3)"
];

$line4 = [
    "date4"=>"Date (4)",
    "desc4"=>"Description (4)",
    "payee4"=>"Payee (4)",
    "address4"=>"Address (4)",
    "amount4"=>"Amount (4)"
];

$line5 = [
    "date5"=>"Date (5)",
    "desc5"=>"Description (5)",
    "payee5"=>"Payee (5)",
    "address5"=>"Address (5)",
    "amount5"=>"Amount (5)"
];

$line6 = [
    "date6"=>"Date (6)",
    "desc6"=>"Description (6)",
    "payee6"=>"Payee (6)",
    "address6"=>"Address (6)",
    "amount6"=>"Amount (6)"
];

$line7 = [
    "date7"=>"Date (7)",
    "desc7"=>"Description (7)",
    "payee7"=>"Payee (7)",
    "address7"=>"Address (7)",
    "amount7"=>"Amount (7)"
];

$line8 = [
    "date8"=>"Date (8)",
    "desc8"=>"Description (8)",
    "payee8"=>"Payee (8)",
    "address8"=>"Address (8)",
    "amount8"=>"Amount (8)"
];

$line9 = [
    "date9"=>"Date (9)",
    "desc9"=>"Description (9)",
    "payee9"=>"Payee (9)",
    "address9"=>"Address (9)",
    "amount9"=>"Amount (9)"
];

$line10 = [
    "date10"=>"Date (10)",
    "desc10"=>"Description (10)",
    "payee10"=>"Payee (10)",
    "address10"=>"Address (10)",
    "amount10"=>"Amount (10)"
];

$link = [
    "link1"=>"Link to Receipt (1)",
    "link2"=>"Link to Receipt (2)",
    "link3"=>"Link to Receipt (3)",
    "link4"=>"Link to Receipt (4)",
    "link5"=>"Link to Receipt (5)"
];

$id = $_GET['id'];
$res = get_accounting_list($mysqli, '', '', 'id', $id);

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
        echo "<tr><tr>";
        foreach (array_keys($line1) as $key) {
            echo "<td>{$line1[$key]}</td><td>";
            if (!$row[$key]) {
               echo "__________";
            } else {
               echo $row[$key];
            }
            echo "</td>";
        }
        echo "</tr><tr>";
        foreach (array_keys($line2) as $key) {
            echo "<td>{$line2[$key]}</td><td>";
            if (!$row[$key]) {
               echo "__________";
            } else {
               echo $row[$key];
            }
            echo "</td>";
        }
        echo "</tr><tr>";
        foreach (array_keys($line3) as $key) {
            echo "<td>{$line3[$key]}</td><td>";
            if (!$row[$key]) {
               echo "__________";
            } else {
               echo $row[$key];
            }
            echo "</td>";
        }
        echo "</tr><tr>";
        foreach (array_keys($line4) as $key) {
            echo "<td>{$line4[$key]}</td><td>";
            if (!$row[$key]) {
               echo "__________";
            } else {
               echo $row[$key];
            }
            echo "</td>";
        }
        echo "</tr><tr>";
        foreach (array_keys($line5) as $key) {
            echo "<td>{$line5[$key]}</td><td>";
            if (!$row[$key]) {
               echo "__________";
            } else {
               echo $row[$key];
            }
            echo "</td>";
        }
        echo "</tr><tr>";
        foreach (array_keys($line6) as $key) {
            echo "<td>{$line6[$key]}</td><td>";
            if (!$row[$key]) {
               echo "__________";
            } else {
               echo $row[$key];
            }
            echo "</td>";
        }
        echo "</tr><tr>";
        foreach (array_keys($line7) as $key) {
            echo "<td>{$line7[$key]}</td><td>";
            if (!$row[$key]) {
               echo "__________";
            } else {
               echo $row[$key];
            }
            echo "</td>";
        }
        echo "</tr><tr>";
        foreach (array_keys($line8) as $key) {
            echo "<td>{$line8[$key]}</td><td>";
            if (!$row[$key]) {
               echo "__________";
            } else {
               echo $row[$key];
            }
            echo "</td>";
        }
        echo "</tr><tr>";
        foreach (array_keys($line9) as $key) {
            echo "<td>{$line9[$key]}</td><td>";
            if (!$row[$key]) {
               echo "__________";
            } else {
               echo $row[$key];
            }
            echo "</td>";
        }
        echo "</tr><tr>";
        foreach (array_keys($line10) as $key) {
            echo "<td>{$line10[$key]}</td><td>";
            if (!$row[$key]) {
               echo "__________";
            } else {
               echo $row[$key];
            }
            echo "</td>";
        }
        echo "</tr>";

        foreach (array_keys($link) as $key) {
              echo "<tr><td>{$link[$key]}</td><td>";
              if (!$row[$key]) {
                 echo "<br/><form action=\"accounting_link.php\" method=\"post\">Enter link address:<br/><textarea cols=\"30\" rows=\"3\" name=\"$key\">{$row[$key]}</textarea><br/>".
		      "<input type=\"hidden\" name=\"id\" value=\"{$row['id']}\" />".
                      "<button  type=\"submit\">Submit</button></form>";
              } else {
                 echo "<br/>Click <b><a href=\"$row[$key]\"/>HERE</a></b>";
              }
              echo "</td></tr>";
        }
        echo "</table>";
        echo "<br/><br/>";

        // allowing the administrator to approve the expense report
        if ($row['report_type'] == 'Expense') {
             if ($row['approved1'] == "") {
                     echo "<br/><form action=\"accounting_approve.php\" method=\"post\">Comments:<br/><textarea cols=\"30\" rows=\"3\" name=\"payment_comment1\">{$row['payment_comment1']}</textarea><br/>".
                         "Approved by: <select id=\"approved1\" name=\"approved1\">".
                          "   <option value=\"\">--------</option>".
                          "   <option  value=\"Ken Walker\">Ken Walker</option>".
                          "   <option  value=\"Paul Juraschek\">Paul Juraschek</option>".
                          "   <option  value=\"Daniel Ferreira\">Daniel Ferreira</option>".
                     "</select><br/><br/>".
                     "<input type=\"hidden\" name=\"id\" value=\"{$row['id']}\" />".
                     "<button type=\"submit\">Submit</button></form>";
              }
             else {
                    echo "<br/><br/>Expense report APPROVED by {$row['approved1']} on {$row['approved_date1']}<br/>Comments: {$row['payment_comment1']}<br/><br/>";
              }
              if ($row['approved2'] == "") {
                     echo "<br/><form action=\"accounting_approve.php\" method=\"post\">Comments:<br/><textarea cols=\"30\" rows=\"3\" name=\"payment_comment2\">{$row['payment_comment2']}</textarea><br/>".
                         "Approved by: <select id=\"approved2\" name=\"approved2\">".
                          "   <option  value=\"\">--------</option>".
                          "   <option  value=\"Brian Choy\">Brian Choy</option>".
                          "   <option  value=\"Harry Sorensen\">Harry Sorensen</option>".
                          "   <option  value=\"William Lee\">William Lee</option>".
                     "</select><br/><br/>".
                     "<input type=\"hidden\" name=\"id\" value=\"{$row['id']}\" />".
                     "<button type=\"submit\">Submit</button></form>";
              }
             else {
                    echo "<br/><br/>Expense report APPROVED by {$row['approved2']} on {$row['approved_date2']}<br/>Comments: {$row['payment_comment2']}<br/><br/>";
              }
             if (!$row['expense_paid']) {
                    echo "<br/><form action=\"expense_paid.php\" method=\"post\"><br/>".
                         "<br/><br/>Expense Report Paid? <select id=\"expense_paid\" name=\"expense_paid\">".
                          "   <option  value=0>--------</option>".
                          "   <option  value=1>Paid</option>".
                         "</select><br/><br/>".
                     "<input type=\"hidden\" name=\"id\" value=\"{$row['id']}\" />".
                     "<button type=\"submit\">Submit</button></form>";
              }
             else {
                    echo "<br/><br/>Expense report has been paid<br/><br/>";
             }
        }
   }
        echo "<br/><br/>";
        echo "<a href=\"accounting_list.php\"><b>BACK</a> to Accounting Table List | <a href=\"/brotherstraining/portal/index.php\"><b>HOME</a></b>";
        echo "<br /><br/>";
}
?>

<?php else : ?>
<p>
    <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
</p>
<?php endif; ?>

</body>
</html>
