<?php
include_once 'classes/class.user.php';
include 'config/config.php';

$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$user = new User();
if(!$user->get_session()){
	header("location: login.php");
}
$user_id = $user->get_user_id($_SESSION['user_email']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us - EduCare</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css?<?php echo time(); ?>">
</head>
<body class="home">
    <div id="wrapper">
        <div id="menu">
            <div id="logo">
                <span class="logo-text">EC</span>
            </div>
            <a href="home.php">Home</a>
            <a href="profile.php">Profile</a>
            <a href="job.php">Jobs</a>
            <a href="about.php" class="active">About Us</a>
            <a href="logout.php" class="move-right">Log Out</a>
            <span class="move-right"><?php echo $user->get_user_lastname($user_id) . ', ' . $user->get_user_firstname($user_id); ?>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</span>
        </div>
        <div id="about-us-content">
            <section>
                <h2>I. Introduction</h2>
                <p>EduCare is an online platform dedicated to fostering a healthy, balanced educational environment...</p>
            </section>
            <section>
                <h2>Mission</h2>
                <p>Our primary goal is to inspire educators and schools. We offer schools access to a diverse pool of qualified educators...</p>
            </section>
            <section>
                <h2>Vision</h2>
                <p>We envision creating an energetic atmosphere where professionals and schools find their ideal fit...</p>
            </section>
            <section>
                <h2>Global Presence</h2>
                <p>While currently focused on local support, our long-term vision is to reach a global audience...</p>
            </section>
            <section>
                <h2>Products & Services</h2>
                <p><strong>For Schools:</strong> We provide a comprehensive search function to locate approved applicants...</p>
                <p><strong>For Teachers:</strong> We offer personalized career counseling, access to relevant job postings...</p>
            </section>
        </div>
    </div>
</body>
</html>