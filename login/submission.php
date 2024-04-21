<?php
include_once 'classes/class.user.php';
include 'config/config.php';

$user = new User();
if (!$user->get_session()) {
    header("location: login.php");
}
$user_id = $user->get_user_id($_SESSION['user_email']);

// Database connection (adjust as needed)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_wbapp";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize the message variable
$message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submissionDir = "form_submissions/";

    // Ensure the directory exists, create it if not
    if (!file_exists($submissionDir)) {
        mkdir($submissionDir, 0777, true);
    }

    // Process form data
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Process file upload
    $file = $_FILES["file"];
    $fileName = $file["name"];
    $fileTmpName = $file["tmp_name"];
    $fileDestination = $submissionDir . $fileName;

    // Move the uploaded file to the destination directory
    move_uploaded_file($fileTmpName, $fileDestination);

    // Save form data to the database
    $sql = "INSERT INTO user_submissions (name, email, file_name) VALUES ('$name', '$email', '$fileName')";
    if ($conn->query($sql) === TRUE) {
        $message = "Application submitted successfully!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Submission</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">
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
        <a href="about.php">About Us</a>
        <a href="logout.php" class="move-right">Log Out</a>
        <span class="move-right"><?php echo $user->get_user_lastname($user_id) . ', ' . $user->get_user_firstname($user_id); ?>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</span>
    </div>
        <br><br><br>
        <div id="about-us-content">
            <h2>Submit Application</h2>

            <?php if (!empty($message)) : ?>
                <p><?php echo $message; ?></p>
            <?php endif; ?>

            <form action="submission.php" method="post" enctype="multipart/form-data">
                <label for="name">Name:</label>
                <input type="text" name="name" required><br>

                <label for="email">Email:</label>
                <input type="email" name="email" required><br>

                <label for="file">File Attachment:</label>
                <input type="file" name="file" required><br>

                <button type="submit">Apply Now!</button>
            </form>

            <hr>

        </div>
    </div>
</body>
</html>