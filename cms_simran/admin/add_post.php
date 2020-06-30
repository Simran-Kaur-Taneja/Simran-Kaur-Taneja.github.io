<?php include"includes/admin_header.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Enter the fields
                          <?php 
                            if(isset($_POST['add_post'])){
                               $post_title=escape($_POST['title']);
                               $post_cat_id=escape($_POST['post_category']);
                               $post_user=escape($_POST['post_user']);
                               $post_status=escape($_POST['post_status']);
                               $post_date=escape(date('d-m-y'));
                               $post_image=escape($_FILES['image']['name']);
                               $post_image_temp=escape($_FILES['image']['tmp_name']);
                               $post_content=escape($_POST['content']);

                               move_uploaded_file($post_image_temp, "images/{$post_image}");

                               $query="INSERT into posts(post_category_id,post_title,post_user,post_date,post_image,post_content) VALUES('{$post_cat_id}','{$post_title}','{$post_user}',now(),'{$post_image}','{$post_content}')";

                               $add_post_query=mysqli_query($connection,$query);
                               echo "<h3><i class='bg-success col-lg-12'>Post Added..."."<a href=posts.php>View Posts</a></i><h3>"; 
                                
                           // header("location:posts.php");
                            }  ?>

                        </h1>



                        <form method="post" class="form-group" enctype="multipart/form-data">
                            <label>Post Title</label>
                            <input type="text" name="title" class="form-control">
                            <label>Select Post Category</label><br>
                            <select class="form-control" name="post_category">
                            <?php
                                $query="SELECT * from category ";
                                $select_category=mysqli_query($connection,$query);

                                while($row=mysqli_fetch_assoc($select_category))
                                {
                                    $category_title=$row['cat_title'];
                                    $category_id=$row['cat_id'];

                                   // if($category_id == $post_cat_id){
                                         echo "<option value='{$category_id}'>{$category_title}</option>";
                                     // echo "<h1>match id</h1>";
                                       


                                    }?>
                                </select><br>
                           <!--
                            <label>Post Author</label>
                            <input type="text" name="author" class="form-control">-->
                            <label>User</label><br>
                            <select class="form-control" name="post_user">
                            <?php
                                $query="SELECT * from users ";
                                $select_user=mysqli_query($connection,$query);

                                while($row=mysqli_fetch_assoc($select_user))
                                {
                                    $user_name=$row['user_name'];
                                    $user_id=$row['user_id'];

                                   // if($category_id == $post_cat_id){
                                         echo "<option value='{$user_name}'>{$user_name}</option>";
                                     // echo "<h1>match id</h1>";
                                       


                                    }?>
                                </select><br>
                            <label>Post Status</label>
                            <select class="form-control" name="post_status">
                              <option>post status</option>
                              <option value="draft">Draft</option>
                              <option value="published">Published</option>
                              <option value="delete">Delete</option>
                            </select>
                            
                            <label>Post Date</label>
                            <input type="date" name="date" class="form-control">
                            <label>Post Image</label>
                            <input type="file" name="image">
                            <label>Post Content</label>

                           <textarea class="form-control "name="content" id="" cols="30" rows="10">
                            </textarea><br>
                            <input type="submit" name="add_post" class="btn btn-primary" value="Add Post">
                            <!--<a href="#" class="btn btn-primary" name="add_post"> Add Post</a>-->
                            
                            
                        </form>
                       


                    </div>
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"?>