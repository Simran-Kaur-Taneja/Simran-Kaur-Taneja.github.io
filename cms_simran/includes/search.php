<?php
include "includes/db.php";?>
<?php include "includes/header.php";
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
                    if(isset($_POST['submit']))
                    {
                        $search=$_POST['search'];
                        //echo $search;
                        $query="SELECT * from posts where post_tags LIKE '%$search%'";
                        $search_query=mysqli_query($connection,$query);
                        //echo $search_query;
                        if(!$search_query){
                            die("failed".mysqli_error($connection));

                        }
                        $count=mysqli_num_rows($search_query);//count the number of rows returned which matches the search

                        if($count==0){
                            echo "sorry no result found";
                        }
                        else
                        {
                            echo "successfull";
                        }


                    }
                ?>




            	<?php
            		$query="SELECT * from posts";
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
            		
            	?>

                <!--<h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>-->

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
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

                <hr>

  			<?php } ?>
            </div>
             
            <!-- Blog Sidebar Widgets Column -->
           
			<?php  include "sidebar.php"?>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
       <?php include "footer.php" ?>
        