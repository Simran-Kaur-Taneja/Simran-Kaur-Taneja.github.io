<?php include"includes/admin_header.php" ?>

    <div id="wrapper">

        
        ?>

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            WELCOME ADMIN 
                            <small>user name :<?php echo $_SESSION['user_name'];?></small>
                            
                </li>
                        </h1>
                        
                    </div>
                    <div>
                        <div class="col-lg-3">
                            <?php 
                                    $query="SELECT * from posts";
                                    $select_query=mysqli_query($connection,$query);
                                    $post_count=mysqli_num_rows($select_query);

                                ?>
                            <div class="panel panel-red">
                                <div class="panel-heading"><b>POSTS </b><i class="fa fa-2x fa-file-text text-right"></i>
                                </div>
                                   <div class="panel-body bg-danger"><b><?php echo $post_count ?> Posts</b></div>
                                <a href="posts.php">
                                    <div class="panel-footer"><b>View Details</b>
                                        <span class="pull-right"><i class="fa fa-angle-double-right"></i></span>
                                    </div>
                                </a>
                                
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <?php 
                                    $query="SELECT * from users";
                                    $select_query=mysqli_query($connection,$query);
                                    $user_count=mysqli_num_rows($select_query);

                                ?>
                            <div class="panel panel-yellow">
                                <div class="panel-heading"><b>USERS    </b><i class="fa fa-2x fa-user"></i></div>
                                    <div class="panel-body bg-warning"><b><?php echo $user_count ?> Users</b></div>
                                <a href="users.php">
                                    <div class="panel-footer"><b>View Details</b>
                                        <span class="pull-right"><i class="fa fa-angle-double-right"></i></span>
                                    </div>
                                </a>
                                
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <?php 
                                    $query="SELECT * from comments";
                                    $select_query=mysqli_query($connection,$query);
                                    $comment_count=mysqli_num_rows($select_query);

                                ?>
                            <div class="panel panel-green">
                                <div class="panel-heading"><b>COMMENTS   </b> <i class="fa fa-2x fa-comments"></i></div>
                                    <div class="panel-body bg-success"><b><?php echo $comment_count ?> Comments</b></div>
                                <a href="comments.php">
                                    <div class="panel-footer"><b>View Details</b>
                                        <span class="pull-right"><i class="fa fa-angle-double-right"></i></span>
                                    </div>
                                </a>
                                
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <?php 
                                    $query="SELECT * from category";
                                    $select_query=mysqli_query($connection,$query);
                                    $categories_count=mysqli_num_rows($select_query);

                                ?>
                            <div class="panel panel-primary">
                                <div class="panel-heading"><b>CATEGORIES </b><i class="fa fa-2x fa-list"></i></div>
                                    <div class="panel-body bg-info"><b><?php echo $categories_count ?> Categories</b></div>
                                <a href="categories.php">
                                    <div class="panel-footer"><b>View Details</b>
                                        <span class="pull-right"><i class="fa fa-angle-double-right"></i></span>
                                    </div>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"?>