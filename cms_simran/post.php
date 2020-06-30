<?php
include "includes/db.php";
include "includes/header.php";
?>

    <!-- Navigation -->
  <?php
include "includes/navigation.php";
?>
<!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            	<?php
            	if(isset($_GET['p_id'])){
            		$post_id=$_GET['p_id'];

                    $q="UPDATE posts SET post_view_count=post_view_count+1 WHERE post_id='{$post_id}'";
                    $post_view=mysqli_query($connection,$q);


            		$query="SELECT * from posts WHERE post_id='{$post_id}'";
            		$select_posts=mysqli_query($connection,$query);

            		while($row=mysqli_fetch_assoc($select_posts)){
            			$post_id=$row['post_id'];
            			//$post_cat_id=$row['post_cat_id'];
            			$post_title=$row['post_title'];
            			$post_author=$row['post_author'];
            			$post_date=$row['post_date'];
            			$post_image=$row['post_image'];
            			$post_content=$row['post_content'];
            			$post_tags=$row['post_tags'];
            			$post_comment_count=$row['post_comment_count'];
            			$post_status=$row['post_status'];
            		
            		}
            	}
                else{
                    header("location:index.php");
                }
                ?>

                <!--<h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>-->

                <!-- First Blog Post -->
                
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?> "> <?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo$post_image?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>


                 <?php
            		if(isset($_POST['create_comment'])){
            			$post_id=$_GET['p_id'];
            			$comment_author=$_POST['comment_author'];
            			$comment_email=$_POST['comment_email'];
            			$comment_content=$_POST['comment_content'];

                        if(!empty($comment_content) && !empty($comment_email) && !empty($comment_author)){

            			$query= "INSERT into comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES('{$post_id}','{$comment_author}','{$comment_email}', '{$comment_content}', 'unapproved', now())";
            			$comment_q=mysqli_query($connection,$query);
            			if(!$comment_q){
            				die("failed".mysqli_error($connection));
            			}
            			$query1="UPDATE posts SET post_comment_count=post_comment_count+1 WHERE post_id='{$post_id}'";
            			$count=mysqli_query($connection,$query1);
            		}
                    else{
                        echo "<script>alert('Please fill all details in the comment section')</script>";
                    }

                }

            	?>
            		
            	

            	

            <div class="well">
            <h4>Leave a Comment:</h4>
            <form action="#" method="post" role="form">




                <div class="form-group">
                    <label for="Author">Author</label>

                    <input type="text" name="comment_author" class="form-control" name="comment_author">
                </div>

                <div class="form-group">
                    <label for="Author">Email</label>
                    <input type="email" name="comment_email" class="form-control" name="comment_email">
                </div>

                <div class="form-group">
                    <label for="comment">Your Comment</label>
                    <textarea name="comment_content" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>

            </form>

       	 	</div>

            </div>

           	 
             
            <!-- Blog Sidebar Widgets Column -->
           
			<?php  include "includes/sidebar.php"?>
        </div>
       
       	 	<?php
            		$display="SELECT * from comments WHERE comment_status='approve' ORDER BY comment_id DESC";
            		$display_query=mysqli_query($connection,$display);

            		while($row=mysqli_fetch_assoc($display_query)){
            			$comment_author=$row['comment_author'];
            			$comment_date=$row['comment_date'];
            			$comment_content=$row['comment_content'];

            			echo "<div class=form-group>";
            			echo "<h3>$comment_author</h3>";
            			echo "<p><span class='glyphicon glyphicon-time'> $comment_date </span></p>";
            			echo "<p>$comment_content</p>";
            			echo "</div>";
            			
            		}
            	?> 
    </div>
        <!-- /.row -->

        

        <!-- Footer -->
       <?php include "includes/footer.php" ?>