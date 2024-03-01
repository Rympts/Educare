<?php
include '../classes/class.user.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'new':
        create_new_user();
        break;
    case 'update':
        update_user();
        break;
    case 'deactivate':
        deactivate_user();
        break;
    case 'delete':
        delete_user();
        break;
    default:
        // Handle invalid action or redirect to a common page
        break;
}

function create_new_user()
{
    $user = new User();
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $lastname = ucwords($_POST['lastname']);
    $firstname = ucwords($_POST['firstname']);
    $access = ucwords($_POST['access']);
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $contact_number = $_POST['contact_number'];
    $marital_status = $_POST['marital_status'];
    $address = $_POST['address'];
    $religion = $_POST['religion'];
    $zip_code = $_POST['zip_code'];
    $application = $_POST['application'];
    $skills = $_POST['skills'];
    $career_history = $_POST['career_history'];
    $position = isset($_POST['position']) ? $_POST['position'] : ''; // Modified line
    $cover_letter = $_POST['cover_letter'];

    // Handle profile image upload
    $profile_image = handle_profile_image_upload();

    $result = $user->new_user(
        $email, $password, $lastname, $firstname, $access, $dob, $sex, $age, $contact_number,
        $marital_status, $address, $religion, $zip_code, $application, $skills,
        $career_history, $position, $cover_letter, $profile_image
    );

    if ($result) {
        $id = $user->get_user_id($email);
        header('location: ../index.php?page=settings&subpage=users&action=profile&id=' . $id);
    }
}

function update_user()
{
    $user = new User();
    $user_id = $_POST['userid'];
    $lastname = ucwords($_POST['lastname']);
    $firstname = ucwords($_POST['firstname']);
    $access = ucwords($_POST['access']);
    $dob = $_POST['dob'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $contact_number = $_POST['contact_number'];
    $marital_status = $_POST['marital_status'];
    $address = $_POST['address'];
    $religion = $_POST['religion'];
    $zip_code = $_POST['zip_code'];
    $application = $_POST['application'];
    $skills = $_POST['skills'];
    $career_history = $_POST['career_history'];
    $position = isset($_POST['position']) ? $_POST['position'] : null;
    $cover_letter = isset($_POST['cover_letter']) ? $_POST['cover_letter'] : null;

    // Handle profile image upload
    $profile_image = handle_profile_image_upload();

    $result = $user->update_user(
        $lastname, $firstname, $access, $dob, $sex, $age, $contact_number, $marital_status, $address, $religion, $zip_code, $application, $skills, $career_history, $position, $cover_letter, $user_id, $profile_image
    );

    if ($result) {
        header('location: ../index.php?page=settings&subpage=users&action=profile&id=' . $user_id);
    }
}

function handle_profile_image_upload()
{
    if ($_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['profile_image']['tmp_name'];
        $destination = 'file:///C:/xampp/htdocs/EduCare/login/upload/' . $_FILES['profile_image']['name'];
        move_uploaded_file($tmp_name, $destination);

        // Return the filename or path to save in the database
        return $_FILES['profile_image']['name'];
    } else {
        // Handle error or return default image
        return 'default_image.jpg';
    }
}

function deactivate_user()
{
    $user = new User();
    $user_id = $_POST['userid'];
    $result = $user->deactivate_user($user_id);
    if ($result) {
        header('location: ../index.php?page=settings&subpage=users&action=profile&id=' . $user_id);
    }
}

function delete_user()
{
    $user = new User();
    $user_id = isset($_GET['id']) ? $_GET['id'] : '';

    // Validate $user_id if needed

    $result = $user->delete_user($user_id);
    if ($result) {
        header('location: ../index.php?page=settings&subpage=users&message=success');
    } else {
        header('location: ../error.php?message=failed');
    }
}
