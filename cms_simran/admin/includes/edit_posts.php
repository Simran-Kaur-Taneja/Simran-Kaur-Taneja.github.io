<div class="col-xs-8">
    <form method="post" class="form-group" enctype="multipart/form-data">
<?php 

    	$query="SELECT * from posts";
    	$edit_posts=mysqli_query($connection,$query);
    		
    	while($row=mysqli_fetch_assoc($edit_posts)){
            $post_id=$row['post_id'];
    		$post_title=$row['post_title'];
    		$post_author=$row['post_author'];
            $post_date=$row['post_date'];
            $post_image=$row['post_image'];
            $post_content=$row['post_content'];
            $post_tags=$row['post_tags'];
            $post_comment_count=$row['post_comment_count'];
            $post_status=$row['post_status'];
            echo $post_title;
            /*echo "</tr>";
            echo "<tr>";
            echo "<td> {$post_title} </td>";
            echo "<td> {$post_author} </td>";
            echo "<td> {$post_date} </td>";
            echo "<td> <img width=150 src=../images/{$post_image}> </td>";
            echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
            echo "<td><a href='posts.php?edit={$post_id}'>Edit</a></td>";}
            //echo "<td> '{$post_content}' </td>";
            echo "</tr>";
            echo "</table>";
            echo "</div>";*/
            //echo '';
            echo '<label>Post Title</label>';
            echo "<input type='text' class='form-control' value='{$post_title}'>";
            echo '<label>Post Category ID</label>';
            echo '<input type="text" name="category_id" class="form-control">';
            echo '<label>Post Author</label>';
            echo '<input type="text" name="author" class="form-control">';
            echo '<label>Post Date</label>';
            echo '<input type="date" name="date" class="form-control">';
            echo '<label>Post Image</label>';
            echo '<input type="file" name="image">';
            echo '<label>Post Content</label>';
            echo '<textarea class="form-control "name="content" id="" cols="30" rows="10">';
            echo '</textarea><br>';
            echo '<input type="submit" name="edit_post" class="btn btn-primary" value="Edit Post">';
                            
            echo '</form>';
    	
    }
    ?>