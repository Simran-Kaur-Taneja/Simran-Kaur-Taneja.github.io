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
                            VIEW ALL COMMENTS
                            <small>Simran</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                        


<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Email</th>
        <th>Status</th>
        <th>In Response to</th>
        <th>Date</th>
        <th>Approve</th>
        <th>Unapprove</th>
        <th>Delete</th>
    </tr>

<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    
    $query="SELECT * from comments WHERE comment_post_id='{$id}'";
    $comments_query=mysqli_query($connection,$query);

    while($row=mysqli_fetch_assoc($comments_query)){
            $comment_id=$row['comment_id'];
            $comment_post_id=$row['comment_post_id'];
            $comment_author=$row['comment_author'];
            $comment_email=$row['comment_email'];
            $comment_content=$row['comment_content'];
            $comment_status=$row['comment_status'];
            $comment_date=$row['comment_date'];
            
            //echo "</tr>";
            echo "<tr>";
            echo "<td> {$comment_id} </td>";
            echo "<td> {$comment_author} </td>";
            echo "<td> {$comment_content} </td>";
            echo "<td> {$comment_email} </td>";
            echo "<td> {$comment_status} </td>";
            
            $q="SELECT * from posts where post_id='{$comment_post_id}'";
            $linking_comment_and_post_table=mysqli_query($connection,$q);
            if(!$linking_comment_and_post_table){
                die("query failed".mysqli_error($connection));
            }
                while($row=mysqli_fetch_assoc($linking_comment_and_post_table)){
                $post_id=$row['post_id'];
                $post_title=$row['post_title'];
                

            echo "<td><a href='../post.php?p_id=$post_id'>{$post_title} </td>";
            }

            if(isset($_GET['delete'])){
                $comment_id=$_GET['delete'];
                $delete_q="DELETE from comments WHERE comment_id='{$comment_id}'";
                $delete_query=mysqli_query($connection,$delete_q);
                 header("location:post_comments.php?id=".$_GET['id']."");

            }
            if(isset($_GET['unapprove'])){
                $comment_id=$_GET['unapprove'];
                $delete_q="UPDATE comments SET comment_status='unapprove' WHERE comment_id='{$comment_id}'";
                $delete_query=mysqli_query($connection,$delete_q);
                 header("location:post_comments.php?id=".$_GET['id']."");

            }
            if(isset($_GET['approve'])){
                $comment_id=$_GET['approve'];
                $delete_q="UPDATE comments SET comment_status='approve' WHERE comment_id='{$comment_id}'";
                $delete_query=mysqli_query($connection,$delete_q);
                  header("location:post_comments.php?id=".$_GET['id']."");

            }

            echo "<td> {$comment_date} </td>";
            echo "<td><a href='./post_comments.php?approve=$comment_id&id=".$_GET['id']."'> Approve </td>";
            echo "<td><a href='./post_comments.php?unapprove=$comment_id&id=".$_GET['id']."'> Unapprove </td>";
            echo "<td><a href='./post_comments.php?delete=$comment_id&id=".$_GET['id']."'> Delete </td>";
        }}
?>
    <tr>
        <td></td>
    </tr>
    
    
    

</table>

 </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
   
    <?php include "includes/admin_footer.php"?>

                     


            
      

   