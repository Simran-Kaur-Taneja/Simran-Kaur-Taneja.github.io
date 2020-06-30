
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
   
    
    $query="SELECT * from comments";
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
                $comment_id=escape($_GET['delete']);
                $delete_q="DELETE from comments WHERE comment_id='{$comment_id}'";
                $delete_query=mysqli_query($connection,$delete_q);
                 header("location:comments.php");

            }
            if(isset($_GET['unapprove'])){
                $comment_id=escape($_GET['unapprove']);
                $delete_q="UPDATE comments SET comment_status='unapprove' WHERE comment_id='{$comment_id}'";
                $delete_query=mysqli_query($connection,$delete_q);
                 header("location:comments.php");

            }
            if(isset($_GET['approve'])){
                $comment_id=escape($_GET['approve']);
                $delete_q="UPDATE comments SET comment_status='approve' WHERE comment_id='{$comment_id}'";
                $delete_query=mysqli_query($connection,$delete_q);
                 header("location:comments.php");

            }

            echo "<td> {$comment_date} </td>";
            echo "<td><a href='./comments.php?approve=$comment_id'> Approve </td>";
            echo "<td><a href='./comments.php?unapprove=$comment_id'> Unapprove </td>";
            echo "<td><a href='./comments.php?delete=$comment_id'> Delete </td>";
        }
?>
    <tr>
        <td></td>
    </tr>
    
    
    

</table>

                     


            
      

   