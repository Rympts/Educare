<?php
include_once 'config/config.php';
include_once 'classes/class.user.php';

$user = new User();

if ($user->get_session()) { 
    header("location: index.php");
}
if (isset($_POST['submit'])) {
    extract($_POST);
    
    $valid_access_levels = array("Admin");

    if (!in_array($access, $valid_access_levels)) {
        echo "Invalid access level. Please choose 'Admin'.";
    } else {
        // Call the new_admin method
        $registration_result = $user->new_admin($email, $password, $firstname, $lastname);

        if ($registration_result) {
            header("location: login.php");
            exit;
        } else {
            echo "Registration failed. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Registration - EduCare</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/custom.css?<?php echo time(); ?>">
</head>
<body background="background1.jpg">
    <div id="header_login">
        <center><h1>EduCare</h1></center>
    </div>
 
    <div id="form-block">
        <form method="POST" action="" name="registration">
            <div id="form-block-half">
                <h1>Admin Registration</h1>

                <label for="fname">First Name</label>
                <input type="text" id="fname" class="input" name="firstname" placeholder="Your name..">
                
                <label for="lname">Last Name</label>
                <input type="text" id="lname" class="input" name="lastname" placeholder="Your last name..">

                <label for="email">Email</label>
                <input type="email" id="email" class="input" name="email" placeholder="Your email..">

                <label for="password">Password</label>
                <input type="password" id="password" class="input" name="password" placeholder="Enter password..">

                <label for="confirmpassword">Confirm Password</label>
                <input type="password" id="confirmpassword" class="input" name="confirmpassword" placeholder="Confirm password..">

                <label for="access">Access Position</label>
                <select id="access" name="access">
                    <option value="Admin">Admin</option>
                </select>
                <div><center>
			<input type="submit" name="submit" value="Register"/>
		</div>
        <br><div><center>
			<a href="adminlogin.php" class="button" >Login</a>
		</div>
            </div>
		
        
        </form>
        
    </div><br><br><br>
</body>
</html>