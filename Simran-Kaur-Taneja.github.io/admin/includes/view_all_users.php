
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>User name</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Role</th>
        
    </tr>

<?php
    $query="SELECT * from users";
    $users_query=mysqli_query($connection,$query);

    while($row=mysqli_fetch_assoc($users_query)){
            $user_id=$row['user_id'];
            $user_name=$row['user_name'];
            $user_password=$row['user_password'];
            $user_firstname=$row['user_firstname'];
            $user_lastname=$row['user_lastname'];
            $user_email=$row['user_email'];
            $user_image=$row['user_image'];
            $user_role=$row['user_role'];
            
            //echo "</tr>";
            echo "<tr>";
            echo "<td> {$user_id} </td>";
            echo "<td> {$user_name} </td>";
            echo "<td> {$user_firstname} </td>";
            echo "<td> {$user_lastname} </td>";
            echo "<td> {$user_email} </td>";
            echo "<td> {$user_role} </td>";

            echo "<td><a href='./users.php?change_to_admin=$user_id'> Admin </td>";
             echo "<td><a href='./users.php?change_to_sub=$user_id'> Subscriber </td>";
             echo "<td><a href='./users.php?edit=$user_id'> Edit </td>";
             echo "<td><a href='./users.php?delete=$user_id'> Delete </td>";}
            
            if(isset($_GET['delete'])){
                if(isset($_SESSION['user_role'])) {
                    if($_SESSION(['user_role']=='admin')){
                        $user_id=mysqli_real_escape_string($connection,$_GET['delete']);
                        $delete_user_q="DELETE from users WHERE user_id='{$user_id}'";
                        $delete_query=mysqli_query($connection,$delete_user_q);
                        header("location:users.php");

            }}}
            if(isset($_GET['change_to_admin'])){
                $change_to_admin_id=$_GET['change_to_admin'];
                $change_to_admin_q="UPDATE users SET user_role='admin' WHERE user_id='{$change_to_admin_id}'";
                $change_to_admin_query=mysqli_query($connection,$change_to_admin_q);
                 header("location:users.php");

            }
            if(isset($_GET['change_to_sub'])){
                $change_to_sub_id=$_GET['change_to_sub'];
                $change_to_sub_q="UPDATE users SET user_role='subscriber' WHERE user_id='{$change_to_sub_id}'";
                $change_to_sub_query=mysqli_query($connection,$change_to_sub_q);
                 header("location:users.php");

            }
            if(isset($_GET['edit'])){
                //echo "hi";
                $user_id=$_GET['edit'];
                include "edit_user.php";
            }
             

       
?>
   
    
    
    

</table>

                     


            
      

   