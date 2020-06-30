<div class="col-xs-8">
    <form method="post" class="form-group" enctype="multipart/form-data">
<?php 
        
    	       $query="SELECT * from posts where post_id='{$edit_id}'";
    	       $edit_posts=mysqli_query($connection,$query);
    		
    	while($row=mysqli_fetch_assoc($edit_posts)){
            $post_id=$row['post_id'];
            $post_cat_id=$row['post_category_id'];
    		$post_title=$row['post_title'];
    		$post_user=$row['post_user'];
            $post_date=$row['post_date'];
            $post_image=$row['post_image'];
            $post_content=$row['post_content'];
            $post_tags=$row['post_tags'];
            $post_comment_count=$row['post_comment_count'];
            $post_status=$row['post_status'];
         
            echo '<label>Post Title</label>';
            echo "<input type='text' class='form-control' name='title' value='{$post_title}'><br>";
            echo '<label>Select Category</label>'?>
            <select class="form-control" name="post_category"> 
                <?php
                    $query="SELECT * from category";
                    $select_category=mysqli_query($connection,$query);

                    while($row=mysqli_fetch_assoc($select_category))
                    {
                        $category_title=$row['cat_title'];
                        $category_id=$row['cat_id'];
                        

                        
                               echo "<option  value='{$category_id}'>{$category_title}</option>";
                           // echo "<h1>match id</h1>";
                            
                        
                       // else {
                          //  echo "<h1>unmatch id</h1>";
                         //echo "<option value='{$category_id}'>{$category_title}</option>";



                    //}
                }?>
                        
                
            </select>
            <br>
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
            <?php

            //echo '<label>Post Category ID</label>';
           // echo "<input type='text' name='category_id' class='form-control' value='{$post_cat_id}''>";
           // echo '<label>Post Author</label>';
            //echo "<input type='text' name='author' class='form-control' value='{$post_user}'>";
            //echo "<br>";


            echo '<label>Post Status</label> <br>';
            echo "<select name='post_status' class='form-control'> ";
                echo "<option value='draft'>Draft</option>";
                echo "<option value='published'>Published</option>";




                /*echo "<option value='$post_status'> $post_status </option>";

                if($post_status == 'published'){
                    echo "<option value='draft'> Draft </option>";
                }
                else{
                    echo "<option value='published'> Published </option>";
                }*/
                //echo "<option value='published'> Published </option>";
            echo "</select>";
            //echo '<label>Post Date</label>';
            //echo "<input type='date' name='date' class='form-control' value='{post_date}'>";
            echo "<br>";
            echo "<label>Post Image</label><br><br>";
            echo "<img src='./images/{$post_image}' width='150'><br><br>";
            echo "<input type='file'  name='image'><br><br>";
            echo '<label>Post Content</label>';
            echo "<textarea class='form-control' name='content'cols='30' rows='10' required> {$post_content}";
            echo "</textarea><br>";
            echo "<input type='submit' name='edit_post' class='btn btn-primary' value='Edit Post'>";
                            
            echo '</form>';
            //$edit_id=$_GET['edit'];

            if(isset($_POST['edit_post'])){
                //$edit_id=$_GET[edit'];
                
                $post_title=escape($_POST['title']);
                $post_cat_id=escape($_POST['post_category']);
                $post_status=escape($_POST['post_status']);
                $post_user=escape($_POST['post_user']);
                $post_date=escape(date('d-m-y'));
                $post_image=escape($_FILES['image']['name']);
                $post_image_temp=escape($_FILES['image']['tmp_name']);
                $post_content=escape($_POST['content']);

                    move_uploaded_file($post_image_temp, "images/{$post_image}");

                if(empty($post_image)){
                  $query="SELECT * from posts where post_id=$post_id";
                    $image=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($image)){
                        $post_image=$row['post_image'];
                        }
    
                        //header("location:categories.php");
                    
                    }


                $updation="UPDATE posts SET post_status='{$post_status}', post_title='{$post_title}', post_category_id= '{$post_cat_id}',post_user='{$post_user}', post_image='{$post_image}',post_content='{$post_content}'WHERE post_id='{$post_id}'";
                $update_post=mysqli_query($connection,$updation);
                
                if(!$update_post){
                    die("query failed".mysqli_error($connection));

                }
               
                
                    header("location:posts.php");
                
            }
           // 
        }

            
        
    	
    ?>

    
    