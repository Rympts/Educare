<?php
include_once 'classes/class.user.php';
include 'config/config.php';

$user = new User();
if (!$user->get_session()) {
    header("location: login.php");
}
$user_id = $user->get_user_id($_SESSION['user_email']);

if (isset($_GET['delete']) && isset($_GET['file'])) {
    $fileToDelete = $_GET['file'];


    if (file_exists($fileToDelete)) {
        unlink($fileToDelete);
    }

    
    $user->delete_submission($fileToDelete); 

    echo "<p>File deleted successfully!</p>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submissionDir = "form_submissions/";

    if (!file_exists($submissionDir)) {
        mkdir($submissionDir, 0777, true);
    }

  
    $name = $_POST["name"];
    $email = $_POST["email"];


    $file = $_FILES["file"];
    $fileName = $file["name"];
    $fileTmpName = $file["tmp_name"];
    $fileDestination = $submissionDir . $fileName;


    move_uploaded_file($fileTmpName, $fileDestination);


    $submissionData = "Name: $name\nEmail: $email\nFile: $fileName\n";
    $submissionFile = $submissionDir . "submission_" . time() . ".txt";
    file_put_contents($submissionFile, $submissionData);

    echo "<p>Application submitted successfully!</p>";
}
?><!DOCTYPE html>
<html>
<head>
    <title>Applicants</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">
    
    <style>
    
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .delete-btn:hover {
            background-color: #099109;
        }
    </style>
    
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
        </div><br><br>
<br></div><br><br>
<br>
</div><br><br>
<br></div><br><br>
<br>        
 <script>
                function deleteSubmission(file) {
                    if (confirm("Are you sure you want to delete this submission?")) {
                        window.location.href = 'adminapplicants.php?delete=1&file=' + file;
                    }
                }
            </script>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Applicants</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">
    
    <style>
        /* Add your custom styles for the form display here */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 5px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .delete-btn {
            text-align: center;
            text-decoration: none;
            position: relative;
            background-color: rgb(230, 34, 77);
            border-radius: 5px;
            box-shadow: rgb(121, 18, 55) 0px 4px 0px 0px;
            padding: 5px;
            background-repeat: no-repeat;
            cursor: pointer;
            box-sizing: border-box;
            width: 50px;
            height: 25px;
            color: #fff;
            border: none;
            font-size: 10px;
            transition: all 0.3s ease-in-out;
            z-index: 1;
            overflow: hidden;
        }

        .delete-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head> 
        <div id="about-us-content">
            <h2>View Applicant Submissions Forms</h2>

            <?php
                // Define the directory to read form submissions
                $submissionDir = "form_submissions/";

                if (file_exists($submissionDir)) {
                    $submissions = glob($submissionDir . "*.*");
                    
                    if (!empty($submissions)) {
                        echo "<table>";
                        echo "<tr><th>File Name</th><th>Action</th></tr>";

                        foreach ($submissions as $submission) {
                            $fileName = basename($submission);
                            $fileType = pathinfo($submission, PATHINFO_EXTENSION);
                            $allowedFileTypes = array("txt", "pdf", "docx", "jpg", "jpeg", "png", "gif");

                            if (in_array($fileType, $allowedFileTypes)) {
                                echo "<tr><td><a href='$submission' target='_blank'>$fileName</a></td>";
                                echo "<td><button class='delete-btn' onclick='deleteSubmission(\"$submission\")'>Delete</button></td></tr>";
                            } else {
                                
                            }
                        }

                        echo "</table>";
                    } else {
                        echo "<p>No submissions yet.</p>";
                    }
                } else {
                    echo "<p>No submissions yet.</p>";
                }
            ?>

            <script>
                function deleteSubmission(file) {
                    if (confirm("Are you sure you want to delete this submission?")) {
                        window.location.href = 'adminapplicants.php?delete=1&file=' + file;
                    }
                }
            </script>
        </div>
    </div>
</body>
</html>
