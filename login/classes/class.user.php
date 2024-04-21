<?php
class User {
    private $DB_SERVER = 'localhost';
    private $DB_USERNAME = 'root';
    private $DB_PASSWORD = '';
    private $DB_DATABASE = 'db_wbapp';
    private $conn;

    public function __construct() {
        $this->conn = new PDO("mysql:host=" . $this->DB_SERVER . ";dbname=" . $this->DB_DATABASE, $this->DB_USERNAME, $this->DB_PASSWORD);
    }

    public function new_user($email, $password, $lastname, $firstname, $access, $dob, $sex, $age, $contact_number, 
	$marital_status, $address, $religion, $zip_code, $application, $skills, 
	$career_history, $position, $cover_letter, $profile_image) {
		// Setting Timezone for DB
		$now = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$nowFormatted = $now->format('Y-m-d H:i:s');
	
		// Hash the password before storing it in the database
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		// Insert new user into the database with hashed password
		$sql = "INSERT INTO tbl_users 
				(user_email, user_password, user_lastname, user_firstname, user_access, 
                    user_dob, user_sex, user_age, user_contact_number, user_marital_status, 
                    user_address, user_religion, user_zip_code, user_application, 
                    user_skills, user_career_history, user_position, user_cover_letter, user_profile_image, 
                    user_date_added, user_time_added, user_status) 
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	
		$stmt = $this->conn->prepare($sql);
	
		$stmt->execute([$email, $hashed_password, $lastname, $firstname, $access, $dob, $sex, $age, $contact_number,
		$marital_status, $address, $religion, $zip_code, $application, $skills,
		$career_history, $position, $cover_letter, $profile_image,
		$nowFormatted, $nowFormatted, 1]);
	
		return true;
	}

public function new_admin($email, $password, $firstname, $lastname) {
    // Setting Timezone for DB
    $now = new DateTime('now', new DateTimeZone('Asia/Manila'));
    $nowFormatted = $now->format('Y-m-d H:i:s');

    // Hash the password before storing it in the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert new admin into the database with hashed password
    $sql = "INSERT INTO tbl_users 
            (user_email, user_password, user_lastname, user_firstname, user_access, 
                user_date_added, user_time_added, user_status) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute([$email, $hashed_password, $lastname, $firstname, 'Admin',
        $nowFormatted, $nowFormatted, 1]);

    return true;
}

	public function update_user($lastname, $firstname, $access, $dob, $sex, $age, $contact_number, $marital_status, $address, $religion, $zip_code, $application, $skills, $career_history, $position, $cover_letter, $id) {

    /* Setting Timezone for DB */
    $NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
    $NOW = $NOW->format('Y-m-d H:i:s');

    $sql = "UPDATE tbl_users 
            SET 
                user_firstname = :user_firstname,
                user_lastname = :user_lastname,
                user_date_updated = :user_date_updated,
                user_time_updated = :user_time_updated,
                user_access = :user_access,
                user_dob = :user_dob,
                user_sex = :user_sex,
                user_age = :user_age,
                user_contact_number = :user_contact_number,
                user_marital_status = :user_marital_status,
                user_address = :user_address,
                user_religion = :user_religion,
                user_zip_code = :user_zip_code,
                user_application = :user_application,
                user_skills = :user_skills,
                user_career_history = :user_career_history,
                user_position = :user_position,
                user_cover_letter = :user_cover_letter
            WHERE 
                user_id = :user_id";

    // Echo the SQL query for debugging purposes
    echo "SQL Query: " . $sql;

    try {
        $q = $this->conn->prepare($sql);

        $q->execute(array(
            ':user_firstname' => $firstname,
            ':user_lastname' => $lastname,
            ':user_date_updated' => $NOW,
            ':user_time_updated' => $NOW,
            ':user_access' => $access,
            ':user_dob' => $dob,
            ':user_sex' => $sex,
            ':user_age' => $age,
            ':user_contact_number' => $contact_number,
            ':user_marital_status' => $marital_status,
            ':user_address' => $address,
            ':user_religion' => $religion,
            ':user_zip_code' => $zip_code,
            ':user_application' => $application,
            ':user_skills' => $skills,
            ':user_career_history' => $career_history,
            ':user_position' => $position, 
            ':user_cover_letter' => $cover_letter,
            ':user_id' => $id
        ));
    } catch (PDOException $e) {
        // Output or log the specific error message
        echo "Error: " . $e->getMessage();
        return false;
    }

    // Check for errors
    if ($q->errorCode() !== '00000') {
        $errorInfo = $q->errorInfo();
        // Output or log the error information
        var_dump($errorInfo);
        return false; // Return false to indicate an error
    }

    // Output success or other debug information
    echo "User information updated successfully!";

    return true;
}

	public function list_users(){
		$sql="SELECT * FROM tbl_users WHERE user_access != 'Admin'";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
}

public function profile_image($user_id, $profile_image) {
    try {
        $sql = "UPDATE tbl_users SET user_profile_image = :profile_image WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':profile_image', $profile_image, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        // Handle the error (log it, display a message, etc.)
        echo "Error updating profile image: " . $e->getMessage();
    }
}

public function get_user_profile($id) {
    try {
        $sql = "SELECT * FROM tbl_users WHERE user_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $user_profile = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user_profile;
    } catch (PDOException $e) {
        // Handle the error (log it, display a message, etc.)
        echo "Error retrieving user profile: " . $e->getMessage();
        return false; // Return false to indicate an error
    }
}
public function delete_submission($fileToDelete) {
    $sql = "DELETE FROM user_submissions WHERE file_name = :fileToDelete";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':fileToDelete', $fileToDelete, PDO::PARAM_STR);

    try {
        $stmt->execute();
        return true; // Return true to indicate success
    } catch (PDOException $e) {
        // Handle the error (log it, display a message, etc.)
        echo "Error deleting submission: " . $e->getMessage();
        return false; // Return false to indicate an error
    }
}
	function get_user_id($email){
		$sql="SELECT user_id FROM tbl_users WHERE user_email = :email";	
		$q = $this->conn->prepare($sql);
		$q->execute(['email' => $email]);
		$user_id = $q->fetchColumn();
		return $user_id;
	}
	function get_user_email($id){
		$sql="SELECT user_email FROM tbl_users WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_email = $q->fetchColumn();
		return $user_email;
	}
	function get_user_password($id){
		$sql="SELECT user_password FROM tbl_users WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_password = $q->fetchColumn();
		return $user_password;
	}
	function get_user_firstname($id){
		$sql="SELECT user_firstname FROM tbl_users WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_firstname = $q->fetchColumn();
		return $user_firstname;
	}
	function get_user_lastname($id){
		$sql="SELECT user_lastname FROM tbl_users WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_lastname = $q->fetchColumn();
		return $user_lastname;
	}
	function get_user_access($id){
		$sql="SELECT user_access FROM tbl_users WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_access = $q->fetchColumn();
		return $user_access;
	}
	function get_user_status($id){
		$sql="SELECT user_status FROM tbl_users WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_status = $q->fetchColumn();
		return $user_status;
	}
	function get_session(){
		if(isset($_SESSION['login']) && $_SESSION['login'] == true){
			return true;
		}else{
			return false;
		}
	}
	public function check_login($email, $password) {
        // Retrieve hashed password from the database based on user's email
        $sql = "SELECT user_password FROM tbl_users WHERE user_email = :email"; 
        $q = $this->conn->prepare($sql);
        $q->execute(['email' => $email]);
        $stored_hashed_password = $q->fetchColumn();

        // Verify the entered plaintext password against the stored hashed password
        if (password_verify($password, $stored_hashed_password)) {
            // Passwords match, grant access
            $_SESSION['login'] = true;
            $_SESSION['user_email'] = $email;
            return true;
        } else {
            // Passwords do not match, deny access
            return false;
        }
    }
    function get_user_dob($id){
        $sql = "SELECT user_dob FROM tbl_users WHERE user_id = :id";    
        $q = $this->conn->prepare($sql);
        $q->execute(['id' => $id]);
        $user_dob = $q->fetchColumn();
        return $user_dob;
    }

    function get_user_sex($id){
        $sql = "SELECT user_sex FROM tbl_users WHERE user_id = :id";    
        $q = $this->conn->prepare($sql);
        $q->execute(['id' => $id]);
        $user_sex = $q->fetchColumn();
        return $user_sex;
    }

    function get_user_age($id){
        $sql = "SELECT user_age FROM tbl_users WHERE user_id = :id";    
        $q = $this->conn->prepare($sql);
        $q->execute(['id' => $id]);
        $user_age = $q->fetchColumn();
        return $user_age;
    }

    function get_user_contact_number($id){
        $sql = "SELECT user_contact_number FROM tbl_users WHERE user_id = :id";    
        $q = $this->conn->prepare($sql);
        $q->execute(['id' => $id]);
        $user_contact_number = $q->fetchColumn();
        return $user_contact_number;
    }

    function get_user_marital_status($id){
        $sql = "SELECT user_marital_status FROM tbl_users WHERE user_id = :id";    
        $q = $this->conn->prepare($sql);
        $q->execute(['id' => $id]);
        $user_marital_status = $q->fetchColumn();
        return $user_marital_status;
    }

    function get_user_address($id){
        $sql = "SELECT user_address FROM tbl_users WHERE user_id = :id";    
        $q = $this->conn->prepare($sql);
        $q->execute(['id' => $id]);
        $user_address = $q->fetchColumn();
        return $user_address;
    }

    function get_user_religion($id){
        $sql = "SELECT user_religion FROM tbl_users WHERE user_id = :id";    
        $q = $this->conn->prepare($sql);
        $q->execute(['id' => $id]);
        $user_religion = $q->fetchColumn();
        return $user_religion;
    }

    function get_user_zip_code($id){
        $sql = "SELECT user_zip_code FROM tbl_users WHERE user_id = :id";    
        $q = $this->conn->prepare($sql);
        $q->execute(['id' => $id]);
        $user_zip_code = $q->fetchColumn();
        return $user_zip_code;
    }

    function get_user_application($id){
        $sql = "SELECT user_application FROM tbl_users WHERE user_id = :id";    
        $q = $this->conn->prepare($sql);
        $q->execute(['id' => $id]);
        $user_application = $q->fetchColumn();
        return $user_application;
    }

    function get_user_skills($id){
        $sql = "SELECT user_skills FROM tbl_users WHERE user_id = :id";    
        $q = $this->conn->prepare($sql);
        $q->execute(['id' => $id]);
        $user_skills = $q->fetchColumn();
        return $user_skills;
    }

    function get_user_career_history($id){
        $sql = "SELECT user_career_history FROM tbl_users WHERE user_id = :id";    
        $q = $this->conn->prepare($sql);
        $q->execute(['id' => $id]);
        $user_career_history = $q->fetchColumn();
        return $user_career_history;
    }

    function get_user_position($id){
        $sql = "SELECT user_position FROM tbl_users WHERE user_id = :id";    
        $q = $this->conn->prepare($sql);
        $q->execute(['id' => $id]);
        $user_position = $q->fetchColumn();
        return $user_position;
    }
	function get_user_cover_letter($id){
        $sql = "SELECT user_cover_letter FROM tbl_users WHERE user_id = :id";    
        $q = $this->conn->prepare($sql);
        $q->execute(['id' => $id]);
        $user_cover_letter = $q->fetchColumn();
        return $user_cover_letter;
    }
    public function delete_user($user_id) {
        $sql = "DELETE FROM tbl_users WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {

            return false;
        }
    }
    
}