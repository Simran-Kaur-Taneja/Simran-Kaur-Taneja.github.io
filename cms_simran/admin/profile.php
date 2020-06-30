<?php include"includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            VIEW ALL USERS
                            <small>user name:<?php echo $_SESSION['user_name'];?></small>
                        </h1>
                        <form method="post" class="form-group" enctype="multipart/form-data">
<?php 
            if(isset($_SESSION['user_name'])){
                $user_name=$_SESSION['user_name'];
            
           $query="SELECT * from users where user_name='{$user_name}'";
           $select_user_profile=mysqli_query($connection,$query);
            
        while($row=mysqli_fetch_assoc($select_user_profile)){
            $user_id=$row['user_id'];
            //$user_name=$row['user_name'];
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
            <input type="password" class="form-control" name="user_password" value= " <?php  echo $user_password ?>"><br>
            <input type='submit' name='edit_user' class='btn btn-primary' value='Update Profile'>
            
        </form>

           <?php }

           if(isset($_POST['edit_user'])){
          
                $user_email=$_POST['user_email'];
                $user_password=$_POST['user_password'];
                $user_name=$_POST['user_name'];
                $user_firstname=$_POST['user_firstname'];
                $user_lastname=$_POST['user_lastname'];
                $user_role=$_POST['user_role'];

                $updation="UPDATE users SET user_name='{$user_name}', user_firstname= '{$user_firstname}',user_lastname='{$user_lastname}',user_email='{$user_email}', user_role='{$user_role}' WHERE user_name='{$user_name}'";

                $update_post=mysqli_query($connection,$updation);

                if(!$update_post){
                    die("query failed".mysqli_error($connection));

                }
                //echo $user_name; 
               // echo $user_role;
               // echo $user_email;
               header("location:users.php");
                
            }
        }?> 
           
                        
                        

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
   
    <?php include "includes/admin_footer.php"?>