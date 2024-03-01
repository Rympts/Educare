<div id="subcontent">
    <table id="data-list">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Access Level</th>
            <th>Email</th>
            <th>Action</th> <!-- New column for the delete button -->
        </tr>
        <?php
        $count = 1;
        if($user->list_users() != false){
            foreach($user->list_users() as $value){
                extract($value);
        ?>
        <tr>
            <td><?php echo $count;?></td>
            <td><a href="index.php?page=settings&subpage=users&action=profile&id=<?php echo $user_id;?>"><?php echo $user_lastname.', '.$user_firstname;?></a></td>
            <td><?php echo $user_access;?></td>
            <td><?php echo $user_email;?></td>
            <td><?php
            if($user->get_user_status($id) == "1"){
              ?>
                <a href="processes/process.user.php?action=delete&id=<?php echo $user_id; ?>">Delete User</a>
          
              <?php
            }else{
            ?>
                <a href="processes/process.user.php?action=delete&id=<?php echo $user_id; ?>">Delete User</a>
                
            <?php
            }
            ?>
             
                </form>
            </td>
        </tr>
        <?php
                $count++;
            }
        } else {
            echo "No Record Found.";
        }
        ?>
    </table>
</div>