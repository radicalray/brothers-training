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
<?php include("../../includes/header.html"); ?>
<?php include("../../includes/navigation.php"); ?>
    <body>
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
            Username: <input type='text'
                name='username'
                id='username' /><br>
            Email: <input type="text" name="email" id="email" /><br>
            Locality:  <select id="locality" name="locality">
        <option value="">----</option>
        <option value="Cambridge, MA">Cambridge, MA</option>
        <option value="Boston, MA">Boston, MA</option>
        <option value="Newton, MA">Newton, MA</option>
        <option value="Middleboro, MA">Middleboro, MA</option>
        <option value="Worcester, MA">Worcester, MA</option>
        <option value="Lowell, MA">Lowell, MA</option>
        <option value="North Providence, RI">North Providence, RI</option>
<?php echo get_provinces('../../includes/localities.txt'); ?>
    </select><br>
            Password: <input type="password"
                             name="password"
                             id="password"/><br>
            Confirm password: <input type="password"
                                     name="confirmpwd"
                                     id="confirmpwd" /><br>
            <input type="button"
                   value="Register"
                   onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.locality,
                                   this.form.password,
                                   this.form.confirmpwd);" />
        </form>
        <p>Return to the <b><u><a href="index.php">Login</a></u></b>.</p>
    </body>
</html>
