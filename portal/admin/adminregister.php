<?php include '../../includes/register.inc.php'; ?>
<?php include '../../includes/functions.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Registration Form</title>
        <script type="text/JavaScript" src="js/sha512.js"></script>
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" type="text/css" href="../styles.css" />
    </head>
    <body>
        <div class="content">
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <h1>Account registration for administrators</h1>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <ul>
            <li>Usernames may contain only digits, upper and lower case letters and underscores</li>
            <li>Emails must have a valid email format</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one upper case letter (A..Z)</li>
                    <li>At least one lower case letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>
        </ul>
        <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>"
                method="post"
                name="registration_form">
        <table>
            <tr>
                <td>Username:</td>
                <td>
                    <input type='text' name='username' id='username' />
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>
                    <input type="text" name="email" id="email" />
                </td>
            </tr>
            <tr>
                <td>Locality:</td>
                <td>
                    <select id="locality" name="locality">
                        <option value="">----</option>
                        <?php echo get_provinces('../../includes/localities.txt'); ?>
                        <option value="Admin">*Super Admin*</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Password:</td>
                <td>
                    <input type="password" name="password" id="password"/>
                </td>
            </tr>
            <tr>
                <td>Confirm password:</td>
                <td>
                    <input type="password" name="confirmpwd" id="confirmpwd" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="button"
                           value="Register"
                           onclick="return regformhash(this.form,
                                           this.form.username,
                                           this.form.email,
                                           this.form.locality,
                                           this.form.password,
                                           this.form.confirmpwd);"
                           style="float:right;" />
                </td>
            </tr>
        </table>
        </form>
        <p>Return to the <b><u><a href="index.php">Login</a></u></b>.</p>
    </div>
    </body>
</html>
