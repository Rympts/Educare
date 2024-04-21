<?php
include_once 'config/config.php';
include_once 'classes/class.user.php';

if (isset($_POST['submit'])) {
    if (isset($_POST['role'])) {
        $selectedRole = $_POST['role'];

        if ($selectedRole === 'admin') {
            header('location: adminlogin.php'); // Check and correct the path
            exit;
        } elseif ($selectedRole === 'teacher') {
            header('location: login.php'); // Check and correct the path
            exit;
        }
    }
}
?>

 <link rel="stylesheet" href="css/custom.css?<?php echo time(); ?>">

<?php
// Initialize the selected role variable
$selectedRole = '';

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Check if a role has been selected
    if (isset($_POST['role'])) {
        $selectedRole =['role'];

        // Redirect the user to the appropriate page based on their role selection
        if ($selectedRole === 'admin') {
            header('Location: adminlogin.php');
            exit;
        } elseif ($selectedRole === 'teacher') {
            header('Location: login.php');
            exit;
        }
    }
}


echo '<body class="custom-body">';
echo '<div class="custom-container">';
echo '<h1 class="custom-h1">Select Your Role</h1>';
echo '<form method="post" action="">';
echo '<label for="access" class="custom-label"><center>Access Level</label>';
echo '<select id="access" name="role" class="custom-select">';
echo '<option value="">Select</option>';
echo '<option value="admin">Admin</option>';
echo '<option value="teacher">Teacher</option>';
echo '</select>';
echo '<button type="submit" name="submit" class="custom-button">Submit</button>';
echo '</form>';
echo '</div>';
echo '</body>';
?>