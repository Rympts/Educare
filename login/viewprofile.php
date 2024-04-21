<?php
include_once 'classes/class.user.php';
include 'config/config.php';

$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$user = new User();

// Redirect to login page if the user is not logged in
if(!$user->get_session()){
    header("location: login.php");
}

// Get user ID using session email
$user_id = $user->get_user_id($_SESSION['user_email']);
$user_profile = $user->get_user_profile($user_id);

// Image upload handling
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = 'upload/';
    $uploadFile = $uploadDir . basename($_FILES['profile_picture']['name']);
    
    if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadFile)) {
        // Update the user's profile picture in the database
        $user->profile_image($user_id, basename($uploadFile));
        $msg = 'Profile picture uploaded successfully!';
        
        // Reload user profile after updating the profile picture
        $user_profile = $user->get_user_profile($user_id);
    } else {
        $msg = 'Failed to upload profile picture.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile Information</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">
</head>
<body class="home   ">
    <div id="wrapper">
    <div id="menu">

    <div id="logo">
            <span class="logo-text">EC</span>
        </div>
        <a href="adminhome.php">Home</a>
        <a href="adminfind.php">Applicants</a>
        <a href="adminapplicants.php">Forms</a>
        <a href="adminabout.php">About Us</a>
        <a href="logout.php" class="move-right">Log Out</a>
        <span class="move-right"><?php echo $user->get_user_lastname($user_id) . ', ' . $user->get_user_firstname($user_id); ?>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</span>
    </div>
        

    <br><br>
<br>
<div class="profile-page">
<div id="profile-content">

<h1>Your Profile</h1>

<div class="profile-info-box">
    <p><strong>Profile Image:</strong></p>
    <img id="profile-image" src="<?php echo $uploadDir . $user_profile['user_profile_image']; ?>" alt="Profile Picture">
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="file" name="profile_picture" id="profile_picture" accept="image/*" required>
        <br>
        <button type="submit">Upload Profile Picture</button>
    </form></div>
<div class="profile-container">
    <div class="profile-info-box">
    <p><strong>Email:</strong> <?php echo $_SESSION['user_email']; ?></p>
    </div><div class="profile-info-box">
    <p><strong>First Name:</strong> <?php echo $user->get_user_firstname($user_id); ?></p>
    </div><div class="profile-info-box">
    <p><strong>Last Name:</strong> <?php echo $user->get_user_lastname($user_id); ?></p>
</div>


    <!-- Add more user-specific information -->
    
    <div class="profile-info-box">
    <p><strong>Position:</strong> <?php echo $user->get_user_access($user_id); ?></p>
</div>
<div class="profile-info-box">
    <p><strong>Date of Birth:</strong> <?php echo $user->get_user_dob($user_id); ?></p>
</div><div class="profile-info-box">
    <p><strong>Sex:</strong> <?php echo $user->get_user_sex($user_id); ?></p>
</div><div class="profile-info-box">
    <p><strong>Age:</strong> <?php echo $user->get_user_age($user_id); ?></p>
    </div><div class="profile-info-box">
    <p><strong>Contact Number:</strong> <?php echo $user->get_user_contact_number($user_id); ?></p>
    </div><div class="profile-info-box">
    <p><strong>Marital Status:</strong> <?php echo $user->get_user_marital_status($user_id); ?></p>
    </div><div class="profile-info-box">
    <p><strong>Address:</strong> <?php echo $user->get_user_address($user_id); ?></p>
    </div><div class="profile-info-box">
    <p><strong>Religion:</strong> <?php echo $user->get_user_religion($user_id); ?></p>
    </div><div class="profile-info-box">
    <p><strong>Zip Code:</strong> <?php echo $user->get_user_zip_code($user_id); ?></p>
    </div><div class="profile-info-box">
    <p><strong>Career History:</strong> <?php echo $user->get_user_career_history($user_id); ?></p>
    </div><div class="profile-info-box">
    <p><strong>Cover Letter:</strong> <?php echo $user->get_user_cover_letter($user_id); ?></p>
    </div><div class="profile-info-box">
    <p><strong>Application:</strong> <?php echo $user->get_user_application($user_id); ?></p>
    </div><div class="profile-info-box">
    <p><strong>Skills:</strong> <?php echo $user->get_user_skills($user_id); ?></p>
    </div><div class="profile-info-box">
    <p><strong>Account Status:</strong> <?php echo ($user->get_user_status($user_id) == "1") ? "Active" : "Inactive"; ?></p>
    </div>
</div>


<div id="button-block">
    <a href="index.php?page=settings&subpage=users&action=profile&id=<?php echo $user_id; ?>">
        <input type="submit" value="Update">
    </a>
</div>

    </div>
    </div>
</div> 
</body>
</html>
