<?php
include_once 'config/config.php';
include_once 'classes/class.user.php';

$user = new User();

if ($user->get_session()) {
    header("location: adminhome.php");
}

if (isset($_POST['submit'])) {
    extract($_POST);
    $login = $user->check_login($useremail, $password);

    if ($login) {
        header("location: adminhome.php");
    } else {
        ?>
        <div id='error_notif'>Wrong email or password.</div>
        <?php
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>EduCare Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Archivo+Black&display=swap" rel="stylesheet">
</head>
<body>
    <div id="brand-block">
        <center>
        <br><br><br><br>
            <h1 class="eduCareHeading">WELCOME ADMIN</h1>
        </center>
    </div>
    <center>
    <br><br><br><br><br><br><br>
        <div id="login-block">
            <h2>Please login</h2>
            
            <form method="POST" action="" name="login">
                <div>
                    <input type="email" class="input" required name="useremail" placeholder="Valid E-mail"/>
                </div>
                <div>
                    <input type="password" class="input" required name="password" placeholder="Password"/>
                </div>
            
                <div>
                    <center>
                        <input type="submit" name="submit" value="Submit"/>
                    </center>
                </div>
                <div>
                    <br>
                    <center>
                        <a href="adminregist.php" class="button">Registration</a>
                    </center>
                </div>
            </form>
        </div>
    </body>
</html>
