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
    <title>Update User</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <a href="adminhome.php">Home</a>
        <a href="adminfind.php">Applicants</a>
        <a href="adminapplicants.php">Forms</a>
        <a href="adminabout.php">About Us</a>
        <a href="logout.php" class="move-right">Log Out</a>
        <span class="move-right"><?php echo $user->get_user_lastname($user_id) . ', ' . $user->get_user_firstname($user_id); ?>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</span>
</div>
    </div>

    <div id="content">
        

        <?php
        switch ($page) {
            case 'settings':
                require_once 'settings-module/index.php';
                break;
            case 'About Us':
                require_once 'About Us/about.php';
                break;
            case 'module_xxx':
                require_once 'module-folder';
                break;
            default:
                require_once '';
                break;
        }
        ?>
    </div>
</div>
</body>
</html>
