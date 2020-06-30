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
                    if(isset($_GET['page'])){
                        $page=$_GET['page'];
                    }else{
                        $page="";
                    }

                    if($page==""||$page==1){
                        $page_1=0;
                    }
                    else{
                        $page_1=($page*5)-5;
                    }




                    $query_count="SELECT * from posts";
                    $find_count=mysqli_query($connection,$query_count);
                    $find_count_of_total_posts=mysqli_num_rows($find_count);

                    //TO DISPLAY 5 POSTS ON EACH PAGE and TAKE CEIL SO THAT NO DECIMAL NUMBER IS THERE IN OUTPUT
                    $find_count_of_total_posts=ceil($find_count_of_total_posts/5);




            		$query="SELECT * from posts WHERE post_status='published' LIMIT $page_1,5";
            		$select_posts=mysqli_query($connection,$query);

            		while($row=mysqli_fetch_assoc($select_posts)){
            			$post_id=$row['post_id'];
            			//$post_cat_id=$row['post_cat_id'];
            			$post_title=$row['post_title'];
            			$post_author=$row['post_user'];
            			$post_date=$row['post_date'];
            			$post_image=$row['post_image'];
            			$post_content=substr($row['post_content'],0,100);
            			$post_tags=$row['post_tags'];
            			$post_comment_count=$row['post_comment_count'];
            			$post_status=$row['post_status'];

                        if($post_status!='published'){
                            echo "<h2>SORRY! NO POST</h2>";
                        }
                        else{
            		
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
                    by <a href="author_posts.php?post_author=<?php echo $post_author ?>& p_id=<?php echo $post_id ?> "> <?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id ?>">
                <img class="img-responsive" src="images/<?php echo$post_image?>" alt="">
            	</a>
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

               
			<?php }} ?>
            </div>
             
            <!-- Blog Sidebar Widgets Column -->
           
			<?php  include "includes/sidebar.php"?>
        </div>
        <!-- /.row -->

        <hr>
        <ul class="pager">
            <?php
                for($i=1;$i<=$find_count_of_total_posts;$i++)
                {
                    echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                }
            ?>
            
        </ul>

        <!-- Footer -->
       <?php include "includes/footer.php" ?>