
<div id="form-block">
    <form method="POST" action="processes/process.user.php?action=new">
        <div id="form-block-half">

          <h1>Create Profile</h1>

        <label for="profile-image">Profile Image</label>
            <input type="file" id="profile-image" name="profile_image">
            <br>
            <label for="fname">First Name</label>
            <input type="text" id="fname" class="input" name="firstname" placeholder="Your name..">

            <label for="lname">Last Name</label>
            <input type="text" id="lname" class="input" name="lastname" placeholder="Your last name..">

            <label for="access">Update Position</label>
            <select id="access" name="access">
              <option value="Teacher">Teacher</option>
              <option value="Masters Teacher">Masters Teacher</option>
              <option value="Senior Teacher">Senior Teacher</option>
              <option value="Teacher1/2/3">Teacher1/2/3</option>
            </select>
            <label for="dob">Date of Birth</label>
            <input type="date" id="dob" name="dob" value="<?php echo $user->get_user_dob($id);?>">
            <br>

            <!-- Add Sex -->
            <label for="sex">Sex</label>
            <select id="sex" name="sex">
                <option value="Male" <?php if($user->get_user_sex($id) == "Male"){ echo "selected";};?>>Male</option>
                <option value="Female" <?php if($user->get_user_sex($id) == "Female"){ echo "selected";};?>>Female</option>
            </select>
            <br>

            <!-- Add Age -->
            <label for="age">Age</label>
            <input type="text" id="age" name="age" value="<?php echo $user->get_user_age($id);?>" placeholder="Your age..">
            <br>
            
            <!-- Add Contact Number -->
            <label for="contact-number">Contact Number</label>
            <input type="text" id="contact-number" name="contact_number" value="<?php echo $user->get_user_contact_number($id);?>" placeholder="Your contact number..">
            <br>

            <!-- Add Marital Status -->
            <label for="status">Marital Status</label>
            <select id="status" name="marital_status">
                <option value="Single" <?php if($user->get_user_marital_status($id) == "Single"){ echo "selected";};?>>Single</option>
                <option value="Married" <?php if($user->get_user_marital_status($id) == "Married"){ echo "selected";};?>>Married</option>
                <!-- Add other options as needed -->
            </select>
            <br>

            <!-- Add Address -->
            <label for="address">Address</label>
            <textarea id="address" name="address" placeholder="Your address.."><?php echo $user->get_user_address($id);?></textarea>
            <br>

            <!-- Add Religion -->
            <label for="religion">Religion</label>
            <input type="text" id="religion" name="religion" value="<?php echo $user->get_user_religion($id);?>" placeholder="Your religion..">
            <br>

            <!-- Add Zip Code -->
            <label for="zip-code">Zip Code</label>
            <input type="text" id="zip-code" name="zip_code" value="<?php echo $user->get_user_zip_code($id);?>" placeholder="Your zip code..">
            <br>
        </div>
        <div id="form-block-half">

        <label for="career-history">Career History</label>
            <textarea id="career-history" name="career_history" placeholder="Your career history.."><?php echo $user->get_user_career_history($id);?></textarea>
            <br>

            

            <!-- Add Position -->
            

            <!-- Add Cover Letter -->
            <label for="cover-letter">Cover Letter</label>
            <textarea id="cover-letter" name="cover_letter" placeholder="Your cover letter.."><?php echo $user->get_user_cover_letter($id);?></textarea>
            <br>
            
            <!-- Add Application -->
            <label for="application">Application</label>
            <textarea id="application" name="application" placeholder="Your application.."><?php echo $user->get_user_application($id);?></textarea>
            <br>

            <!-- Add Skills -->
            <label for="skills">Skills</label>
            <input type="text" id="skills" name="skills" value="<?php echo $user->get_user_skills($id);?>" placeholder="Your skills..">
            <br>

            <label for="email">Email</label>
            <input type="email" id="email" class="input" name="email" placeholder="Your email..">

            <label for="password">Password</label>
            <input type="password" id="password" class="input" name="password" placeholder="Enter password..">

            <label for="confirmpassword">Confirm Password</label>
            <input type="password" id="confirmpassword" class="input" name="confirmpassword" placeholder="Confirm password..">
            
        </div>
        <div id="button-block">
        <input type="submit" value="Save">
        </div>
  </form>
</div>