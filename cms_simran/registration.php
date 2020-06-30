<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
 

    <!-- Navigation -->
    
   

<?php
    if(isset($_POST['submit'])){

        $username=$_POST['username'];
        $password=$_POST['password'];
        $email=$_POST['email'];


        if(!empty($username) && !empty($password) && !empty($email)){

            $username=mysqli_real_escape_string($connection,$username);
            $password=mysqli_real_escape_string($connection,$password);
            $email=mysqli_real_escape_string($connection,$email);

            $password=password_hash($password,PASSWORD_BCRYPT,array('cost'=>12));

           /* $query="SELECT randSalt from users";
            $select_randomsalt_query=mysqli_query($connection,$query);

                if(!$select_randomsalt_query){
                        die("error".mysqli_error($connection));
                    }

           $row=mysqli_fetch_assoc($select_randomsalt_query);
           $salt=$row['randSalt'];
           
           $password=crypt($password, $salt);*/
                   

            $r_query="INSERT into users(user_name,user_email,user_password,user_role) VALUES('{$username}','{$email}','{$password}','subscriber')";
            $registration_query=mysqli_query($connection,$r_query);

             if(!$registration_query){
            die("error".mysqli_error($connection));


                
        }

            
         echo"<script>alert('Registered successfully')</script>";
        }
        else{
            echo"<script>alert('Fill all details')</script>";
        }



        

        
    }

?>
    
 
    <!-- Page Content -->
    <div style="background-color: #ADD8E6">
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">

                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>
    </div>




<?php include "includes/footer.php";?>
