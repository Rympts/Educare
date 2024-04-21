<?php
include_once 'config/config.php';
include_once 'classes/class.user.php';

$user = new User();

if ($user->get_session()) { 
    header("location: index.php");
}

if (isset($_POST['submit'])) {
    extract($_POST);

    $valid_access_levels = array("Admin", "Teacher");

    if (!in_array($access, $valid_access_levels)) {
        echo "Invalid access level. Please choose either 'Student' or 'Teacher'.";
    } else {
        // Define and assign a value to $position
        $position = "DefaultPosition";  // Replace "DefaultPosition" with the actual value you want to assign

        $registration_result = $user->new_user(
            $email, $password, $lastname, $firstname, $access, $dob, $sex, $age, $contact_number, 
            $marital_status, $address, $religion, $zip_code, $application, $skills, 
            $career_history, $position, $cover_letter, $profile_image
        );

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
    <title>Regist Form EduCare</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/custom.css?<?php echo time(); ?>">
</head>
<body background="background1.jpg">
    <div id="header_login">
        <center><h1>EduCare</h1>
    </div>  
    <br>
    <div id="form-block">
        <form method="POST" action="" name="registration">
            <div id="form-block-half">
                <h1>Registration</h1>

                <label for="profile-image">Profile Image</label>
                <input type="file" id="profile-image" name="profile_image">
                <br>

                <label for="fname">First Name</label>
                <input type="text" id="fname" class="input" name="firstname" placeholder="Your name..">
                
                <label for="lname">Last Name</label>
                <input type="text" id="lname" class="input" name="lastname" placeholder="Your last name..">

                <label for="access">Position</label>
                <select id="access" name="access">
                    <option value="Teacher">Teacher</option>
                </select>

                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob">

                <label for="sex">Sex</label>
                <select id="sex" name="sex">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

                <label for="age">Age</label>
                <input type="text" id="age" name="age" placeholder="Your age..">

                <label for="contact-number">Contact Number</label>
                <input type="text" id="contact-number" name="contact_number" placeholder="Your contact number..">

                <label for="marital-status">Marital Status</label>
                <select id="marital-status" name="marital_status">
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                </select>

                <label for="address">Address</label>
                <input id="address" name="address" placeholder="Your address.."></input>

                <label for="religion">Religion</label>
                <input type="text" id="religion" name="religion" placeholder="Your religion..">

                <label for="zip-code">Zip Code</label>
                <input type="text" id="zip-code" name="zip_code" placeholder="Your zip code..">

                <label for="email">Email</label>
                <input type="email" id="email" class="input" name="email" placeholder="Your email..">

                <label for="password">Password</label>
                <input type="password" id="password" class="input" name="password" placeholder="Enter password..">

                <label for="confirmpassword">Confirm Password</label>
                <input type="password" id="confirmpassword" class="input" name="confirmpassword" placeholder="Confirm password..">
            </div>

            <div id="form-block-half">
                <label for="career-history">Career History</label>
                <textarea id="career-history" name="career_history" placeholder="Your career history.."></textarea>

                <label for="cover-letter">Cover Letter</label>
                <textarea id="cover-letter" name="cover_letter" placeholder="Your cover letter.."></textarea>

                <label for="application">Application</label>
                <textarea id="application" name="application" placeholder="Your application.."></textarea>

                <label for="skills">Skills</label>
                <input type="text" id="skills" name="skills" placeholder="Your skills..">
                <br>

                <input type="submit" name="submit" value="Register"/>
                <br><br>
                <a href="Login.php" class="button">Login</a>
            </div>
        </form>
    </div>
</body>
</html>