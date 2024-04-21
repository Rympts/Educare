<?php
include_once 'classes/class.user.php';
include 'config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define the directory to store form submissions
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

    // Save form data to a file
    $submissionData = "Name: $name\nEmail: $email\nFile: $fileName\n";
    $submissionFile = $submissionDir . "submission_" . time() . ".txt";
    file_put_contents($submissionFile, $submissionData);

    echo "<p>Form submitted successfully!</p>";
}

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
<title>Find Job</title>
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
    <br><br>
<br>
    <div id="about-us-content">
      
    <h2>Experienced Teacher</h2> <button onclick="location.href='submission.php'">Apply Now!</button>
<ul>
  <li>Education and Certification:
    <ul>
      <li>Bachelor’s degree in [relevant field] or related subject.</li>
      <li>Teaching certification/license from an accredited institution.</li>
    </ul>
  </li>
  <li>Experience:
    <ul>
      <li>Minimum of 3-5 years of successful teaching experience.</li>
      <li>Proven track record of effective classroom management and student engagement.</li>
    </ul>
  </li>
  <li>Subject Matter Expertise:
    <ul>
      <li>In-depth knowledge of the [specific subject or grade level] curriculum.</li>
      <li>Demonstrated ability to adapt teaching methods to meet the diverse needs of students.</li>
    </ul>
  </li>
  <li>Communication Skills:
    <ul>
      <li>Excellent communication skills with students, parents, and colleagues.</li>
      <li>Ability to contribute positively to the school community.</li>
    </ul>
  </li>
</ul>

<h2>Master Teacher</h2><button onclick="location.href='submission.php'">Apply Now!</button>
<ul>
  <li>Education and Certification:
    <ul>
      <li>Master’s degree in Education or a related field.</li>
      <li>Advanced teaching certification or additional endorsements.</li>
    </ul>
  </li>
  <li>Experience:
    <ul>
      <li>Minimum of 8-10 years of exceptional teaching experience.</li>
      <li>Leadership experience, such as mentoring new teachers or leading professional development.</li>
    </ul>
  </li>
  <li>Subject Matter Expertise:
    <ul>
      <li>Comprehensive understanding of curriculum design and development.</li>
      <li>Ability to integrate innovative teaching strategies and technologies.</li>
    </ul>
  </li>
  <li>Communication and Leadership Skills:
    <ul>
      <li>Strong leadership and mentorship abilities.</li>
      <li>Excellent communication skills to collaborate with fellow educators and administrators.</li>
    </ul>
  </li>
  <li>Professional Development:
    <ul>
      <li>Proven commitment to ongoing professional development.</li>
    </ul>
  </li>
</ul>

<h2>Teacher 1/2/3</h2></h2><button onclick="location.href='submission.php'">Apply Now!</button>
<ul>
  <li>Education and Certification:
    <ul>
      <li>Bachelor’s degree in [relevant field] or related subject.</li>
      <li>Teaching certification/license from an accredited institution.</li>
    </ul>
  </li>
  <li>Experience:
    <ul>
      <li>Teacher 1: 0-2 years of teaching experience.</li>
      <li>Teacher 2: 2-5 years of teaching experience.</li>
      <li>Teacher 3: 5-8 years of teaching experience.</li>
    </ul>
  </li>
  <li>Subject Matter Expertise:
    <ul>
      <li>Proficiency in the [specific subject or grade level] curriculum.</li>
      <li>Ability to develop and implement effective lesson plans.</li>
    </ul>
  </li>
  <li>Classroom Management:
    <ul>
      <li>Demonstrate growth in classroom management skills over the years.</li>
      <li>Adaptability in addressing the needs of different student populations.</li>
    </ul>
  </li>
  <li>Collaboration:
    <ul>
      <li>Willingness to collaborate with colleagues and engage in professional learning communities.</li>
    </ul>
  </li>
</ul>

<h2>Senior Teacher</h2></h2><button onclick="location.href='submission.php'">Apply Now!</button>
<ul>
  <li>Education and Certification:
    <ul>
      <li>Master’s degree in Education or a related field.</li>
      <li>Advanced teaching certification or additional endorsements.</li>
    </ul>
  </li>
  <li>Experience:
    <ul>
      <li>Minimum of 10+ years of exemplary teaching experience.</li>
      <li>Proven leadership in curriculum development and school-wide initiatives.</li>
    </ul>
  </li>
  <li>Subject Matter Expertise:
    <ul>
      <li>Ability to mentor and guide less experienced teachers.</li>
        <li>Exceptional knowledge of the [specific subject or grade level] curriculum.</li>
  </ul>
  <li>Leadership and Mentorship:
    <ul>
      <li>Strong leadership skills with experience in school-wide committees or projects.</li>
        <li>Demonstrated ability to mentor and support other teachers.</li>
  </ul>
  <li>Community Engagement:
    <ul>
      <li>Active involvement in community outreach and school events.</li>
  </ul>

</p>

    </div>
        
</div>

</body>
</html>
