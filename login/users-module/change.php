<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form was submitted

    // Determine the action based on the 'action' parameter sent in the form
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'change_email':
                // Logic to change email
                echo "Email changed successfully!";
                break;

            case 'change_password':
                // Logic to change password
                echo "Password changed successfully!";
                break;

            default:
                echo "Invalid action";
                break;
        }
    } else {
        echo "Action parameter not set";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Check if it's a GET request for disabling or activating the account
    if (isset($_GET['id']) && isset($_GET['action'])) {
        $id = $_GET['id'];

        switch ($_GET['action']) {
            case 'disable_account':
                // Logic to disable account
                echo "Account disabled successfully!";
                break;

            case 'activate_account':
                // Logic to activate account    
                echo "Account activated successfully!";
                break;

            default:
                echo "Invalid action";
                break;
        }
    } else {
        echo "Invalid request";
    }
} else {
    echo "Invalid request method";
}
?>
