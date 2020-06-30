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
                            VIEW ALL POSTS
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
                        <?php 
                            select_all_posts();

                        ?>
                        <?php deletion_post();                      
                        
                        if(isset($_GET['edit'])){
                        //echo "<h1>helo</h1>";
                        $edit_id=$_GET['edit'];
                        include "includes/edit_post.php";
                       // echo "<a href='includes/edit_post.php'>{$edit_id}</a>";
                        if(empty($post_image)){
                                 $query="SELECT * from posts where post_id='{$edit_id}'";
                                 $image=mysqli_query($connection,$query);
                                    while($row=mysqli_fetch_assoc($image)){
                                        $post_image=$row['post_image'];
                                        }
                                    
                                    }
                        
                         }
                     ?>


                    </div>
                    <a href="add_post.php" class="btn btn-primary"> Click here to create new post</a>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"?>