<?php
include_once 'classes/class.user.php';
include 'config/config.php';

$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$user = new User();
if (!$user->get_session()) {
    header("location: login.php");
}
$user_id = $user->get_user_id($_SESSION['user_email']);
$hideHeader = ($page == 'profile') ? true : false;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css?<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Archivo+Black&display=swap" rel="stylesheet">
</head>

<body class="home specific-home">
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
<br><br>
<br>
    <div id="content">
    <p class="home-page-quote">
    <span class="highlight-text">Passionate educators illuminate the path to the future</span> igniting the flame of knowledge and shaping the destinies of generations to come. 
    
    <p class="home-text">
Empowering educators to find their perfect match. Apply for teaching positions and embark on a journey to shape the future of education.
</p>



</p>

    </div>
    
</div>
<div id="footer">
        <p>Unlocking opportunities, one classroom at a time. Join us on the journey to inspire and educate. Apply for your teaching dream today!</p>
    </div>
</body>
</html>
