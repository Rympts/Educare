<br><br><br>
<div id="form-block">
<form method="POST" action="processes/process.user.php?action=update" enctype="multipart/form-data">

        <div id="form-block-half">

                <h1>Profile Update</h1> 
            <br>
            <label for="fname">First Name</label>
            <input type="text" id="fname" class="input" name="firstname" value="<?php echo $user->get_user_firstname($id);?>" placeholder="Your name..">
<br>
            <label for="lname">Last Name</label>
            <input type="text" id="lname" class="input" name="lastname" value="<?php echo $user->get_user_lastname($id);?>" placeholder="Your last name..">
            <label for="access">Position</label></br>
                
            <select id="position" name="position">
                <option value="Teacher" <?php if($user->get_user_position($id) == "Teacher"){ echo "selected";};?>>Teacher</option>
                <option value="Masters Teacher" <?php if($user->get_user_position($id) == "Masters Teacher"){ echo "selected";};?>>Masters Teacher</option>
                <option value="Senior Teacher" <?php if($user->get_user_position($id) == "Senior Teacher"){ echo "selected";};?>>Senior Teacher</option>
                <option value="Teacher1/2/3" <?php if($user->get_user_position($id) == "Teacher1/2/3"){ echo "selected";};?>>Teacher1/2/3</option>
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
            <input type="hidden" id="userid" name="userid" value="<?php echo $id;?>"/>
            <a href="#"></a>  
            <a href="#"></a>  
            <?php
            if($user->get_user_status($id) == "1"){
              ?>
                <a href="#"></a>
              <?php
            }else{
            ?>
                <a href="#"></a>
            <?php
            }
            ?>

            
        </div>
    
        <div id="button-block">
        <input type="submit" value="Update">
        </div>
</form>
</div>