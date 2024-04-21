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
<html>
<head>
    <title>About</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">
    
    <body class="home">
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
        <div id="about-us-content">
        <h2>I. Introduction</h2>
        <p>EduCare is an online platform devoted to creating healthy, balanced surroundings for education. We are aware of the growing problem of teacher shortages and how they affect both new and inexperienced teachers as well as schools. By acting as a bridge between schools looking for high-performing teachers and committed individuals starting their teaching careers, we fill the gap.</p>

        <h2>Mission</h2>
        <p>Our primary goal is to inspire educators and schools. We provide schools access to a wide range of qualified educators, helping them to find people who can really succeed in their particular setting. At the same time, we give brand-new and inexperienced educators the knowledge, tools, and connections they need to successfully navigate their careers.</p>

        <h2>Vision</h2>
        <p>Our vision is to create an energetic atmosphere where professionals and schools can find their ideal fit. In a smooth and fair environment, new educators find their footing in supportive schools, and experienced teachers find chances that are in line with their worth and areas of competence.</p>

        <h2>Global Presence</h2>
        <p>While we currently focus on helping teachers and schools in your area, we hope to eventually reach a worldwide audience. We think that possibilities to match committed instructors with appropriate settings can be found wherever.</p>

        <h2>Products & Services</h2>
        <p>For schools: We provide a comprehensive search function to locate approved applicants according to particular standards, credentials, and educational preferences.</p>

        <p>For Teachers, we provide individualized career counseling, access to relevant job postings, chances for mentorship, and resources to promote professional development. We also give them a stage on which to display their unique accomplishments and skills.</p>

        <p>By joining EduCare, you become part of a community that values education, collaboration, and growth. Let's bridge the gap and empower every educator to thrive!</p>
    </div>
    </div>

    
</body>
</html>