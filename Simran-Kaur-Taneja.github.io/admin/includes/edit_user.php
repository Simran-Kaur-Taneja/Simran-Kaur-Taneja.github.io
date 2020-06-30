
<div class="col-xs-8">
    <form method="post" class="form-group" enctype="multipart/form-data">
<?php 

           $query="SELECT * from users where user_id='{$user_id}'";
    	   $edit_user=mysqli_query($connection,$query);
    		
    	while($row=mysqli_fetch_assoc($edit_user)){
            $user_id=$row['user_id'];
            $user_name=$row['user_name'];
        		$user_firstname=$row['user_firstname'];
        		$user_lastname=$row['user_lastname'];
            $user_password=$row['user_password'];
            $user_email=$row['user_email'];
            $user_role=$row['user_role'];
            
         
            echo '<label>User Name</label>';
            echo "<input type='text' class='form-control' name='user_name' value='{$user_name}'><br>";
            echo '<label>First Name</label>';
            echo "<input type='text' class='form-control' name='user_firstname' value='{$user_firstname}'><br>";
            echo '<label>Last Name</label>';
            echo "<input type='text' class='form-control' name='user_lastname' value='{$user_lastname}'><br>";
            echo '<label>Select User Role</label>';
            echo '<select class="form-control" name="user_role">';

            if($user_role=='admin'){
                    
                    echo '<option  value=subscriber>Subscriber</option>"';}

            else{
                echo '<option  value=admin>Admin</option>"';
            }
            echo '</select>';  ?>            

           <label>Email</label>
           <?php 
          // echo "<input type='text' name='author' class='form-control' value='{$post_author}'>";
           echo "<input type='email' name='user_email' class='form-control' value= '{$user_email}' >"  ?>
           <br>
           <label>Password</label>
            <input type="password" class="form-control" name="user_password" autocomplete="off"><br>
            <input type='submit' name='edit_user' class='btn btn-primary' value='Edit User'>
            
        </form>

           <?php 

            if(isset($_POST['edit_user'])){
          
                $user_email=escape($_POST['user_email']);
                $user_password=escape($_POST['user_password']);
                $user_name=escape($_POST['user_name']);
                $user_firstname=escape($_POST['user_firstname']);
                $user_lastname=escape($_POST['user_lastname']);
                $user_role=escape($_POST['user_role']);

               /* $query="SELECT randSalt from users";
                $select_randomsalt_query=mysqli_query($connection,$query);

                    if(!$select_randomsalt_query){
                            die("error".mysqli_error($connection));
                        }

               $row=mysqli_fetch_assoc($select_randomsalt_query);
               $salt=$row['randSalt'];
               
               $hashed_password=crypt($user_password, $salt);*/

               if(!empty($user_password))
               {
                $password_query="SELECT user_password from users WHERE user_id='{$user_id}'";
                $get_user_query=mysqli_query($connection,$password_query);
                    if(!$get_user_query){
                        die("query failed".mysqli_error($connection));}

                $row=mysqli_fetch_assoc($get_user_query);
                $db_user_password=$row['user_password'];

                if($user_password!=$db_user_password){
                  $hashed_password=password_hash($user_password,PASSWORD_BCRYPT,array('cost'=>12));
                }

               

                $updation="UPDATE users SET user_name='{$user_name}', user_firstname= '{$user_firstname}',user_lastname='{$user_lastname}',user_email='{$user_email}', user_role='{$user_role}', user_password='{$hashed_password}' WHERE user_id='{$user_id}'";

                $update_post=mysqli_query($connection,$updation);

                
                
                if(!$update_post){
                    die("query failed".mysqli_error($connection));

                }}
                //echo $user_name; 
               // echo $user_role;
               // echo $user_email;
               header("location:users.php");
                
            }}?> 
           
        

            
        
    	


    
    