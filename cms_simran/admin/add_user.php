<?php include"includes/admin_header.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-header">
                            Enter the fields
                          <?php 
                            if(isset($_POST['add_user'])){
                               //$user_id=$_POST['user_id'];
                               $user_firstname=escape($_POST['user_firstname']);
                               $user_lastname=escape($_POST['user_lastname']);
                               $user_role=escape($_POST['user_role']);
                               $user_name=escape($_POST['user_name']);
                               $user_email=escape($_POST['user_email']);
                               $user_password=escape($_POST['user_password']);
                               
                               $user_password=password_hash($user_password, PASSWORD_BCRYPT,array('cost'=>12));

                               $query="INSERT into users(user_name,user_firstname,user_lastname,user_role,user_email, user_password) VALUES('{$user_name}','{$user_firstname}','{$user_lastname}','{$user_role}','{$user_email}','{$user_password}')";

                               $add_user_query=mysqli_query($connection,$query);
                            echo "</h4>";
                                
                             echo "<h4><i class='bg-success col-lg-12'>User Created..."."<a href=users.php>View Users</a></i><h4>";   
                           //header("location:users.php");
                            }  ?>

                        



                        <form method="post" class="form-group" enctype="multipart/form-data">
                            <label>First Name</label>
                            <input type="text" name="user_firstname" class="form-control">
                            <label>Last Name</label><br>
                            <input type="text"class="form-control" name="user_lastname"><br>
                            <select name="user_role">
                              <option value="subscriber">Select role</option>
                              <option value="admin">Admin</option>
                              <option value="subscriber">Subscriber</option>

                            </select>  
                                <br><br>
                            <!--<input type="text" name="category_id" class="form-control">-->
                            <label>User Name</label>
                            <input type="text" name="user_name" class="form-control">
                            <label>Email</label>
                            <input type="Email" name="user_email" class="form-control">
                            <label>Password</label>
                            <input type="Password" name="user_password" class="form-control">
                            <label>Image</label>
                            <input type="file" name="image"><br>
                            <input type="submit" name="add_user" class="btn btn-primary" value="Add User">
                            
                            
                            
                        </form>
                       


                    </div>
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"?>