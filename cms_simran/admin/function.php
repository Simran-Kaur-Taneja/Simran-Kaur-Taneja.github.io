<?php
	function insertion(){
			global $connection;
                if(isset($_POST['submit'])){

                    $cat_title=$_POST['cat_title'];
                    if($cat_title==''){
                        echo "<h1>cannot be empty</h1>";
                    }
                    $query="INSERT INTO category(cat_title) VALUES('{$cat_title}')";
                    $insertion=mysqli_query($connection,$query);
    
                    }
                }

    function select_all(){
    				global $connection;
                    $query="SELECT * from category";
                    $select_category=mysqli_query($connection,$query);

                    while($row=mysqli_fetch_assoc($select_category))
                    {
                        $category_title=$row['cat_title'];
                        $category_id=$row['cat_id'];
                        echo "<tr>";
                        echo "<td>{$category_id }</td>";
                        echo "<td>{$category_title}</td>";
                        echo "<td><a href='categories.php?delete={$category_id}'>Delete</td></a>";
                        echo "<td><a href='categories.php?edit={$category_id}'>Edit</td></a>";
                        echo "</tr>";
                    
                     }
    }

    function deletion(){
    	global $connection;
    	if(isset($_GET['delete'])){
                        $category_id=escape($_GET['delete']);
                        $query="DELETE from category where cat_id='{$category_id}'";
                        $deletion=mysqli_query($connection,$query);
                        header("location:categories.php");
                     }
    }
    function deletion_post(){
        global $connection;
        if(isset($_GET['delete'])){
                        $post_id=escape($_GET['delete']);
                        $query="DELETE from posts where post_id='{$post_id}'";
                        $deletion=mysqli_query($connection,$query);
                        header("location:posts.php");
                     }

    }


    function select_all_posts(){
    	global $connection;
   
    	$query="SELECT * from posts ORDER BY post_id DESC";

    	$select_posts=mysqli_query($connection,$query);
            
    		echo "<div class='col-xs-10'>";

                if(isset($_POST['checkBoxArray'])){
                    foreach($_POST['checkBoxArray'] as $checkboxvalue){
                        //echo $checkboxvalue;
                        $bulk_options=escape($_POST['bulk_options']);

                        switch($bulk_options){
                            case 'published':
                                $query="UPDATE posts SET post_status='published' WHERE post_id={$checkboxvalue}";
                                $update_status_to_published=mysqli_query($connection,$query);

                                if(!$update_status_to_published){
                                    die("query failed".mysqli_error($connection));

                                }
                                header('location:posts.php');
                                break;

                            case 'draft':
                                $query="UPDATE posts SET post_status='draft' WHERE post_id={$checkboxvalue}";
                                $update_status_to_draft=mysqli_query($connection,$query);

                                if(!$update_status_to_draft){
                                    die("query failed".mysqli_error($connection));

                                }
                                header('location:posts.php');
                                break;

                            case 'delete':
                                $query="DELETE from posts WHERE post_id={$checkboxvalue}";
                                $update_status_to_delete=mysqli_query($connection,$query);

                                if(!$update_status_to_delete){
                                    die("query failed".mysqli_error($connection));

                                }
                                header('location:posts.php');
                                break;

                            case 'clone':
                                $query="SELECT * from posts WHERE post_id={$checkboxvalue}";
                                $selectQuery=mysqli_query($connection,$query);

                                while($row=mysqli_fetch_assoc($selectQuery)){
                                    $post_id=escape($row['post_id']);
                                    $post_category_id=escape($row['post_category_id']);
                                    $post_title=escape($row['post_title']);
                                    $post_status=escape($row['post_status']);
                                    $post_author=escape($row['post_author']);
                                    $post_date=escape($row['post_date']);
                                    $post_image=escape($row['post_image']);
                                    $post_content=escape($row['post_content']);
                                    $post_tags=escape($row['post_tags']);
                                    //$post_comment_count=$row['post_comment_count'];
                                    $post_status=escape($row['post_status']);
                                    $post_view_count=escape($row['post_view_count']);

                                }
                                $comment_query1="SELECT * from comments WHERE comment_post_id=$post_id";
                                $comment_query2=mysqli_query($connection,$comment_query1);
                                $number_of_comments=mysqli_num_rows($comment_query2);

                                $query1="INSERT into posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_comment_count) VALUES('{$post_category_id}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$number_of_comments}')";
                                $insertQuery=mysqli_query($connection,$query1);

                                if(!$insertQuery){
                                    die("query failed".mysqli_error($connection));

                                }
                                header('location:posts.php');
                                break;

                        }
                    }

                }



            echo "<form method='post'>";
            echo "<div id='bulkOptionsContainer'>";
            echo "<select class='form-control' name='bulk_options'>";
            echo "<option value=''>select option </option>";
            echo "<option value='published'> Publish </option>";
            echo "<option value='draft'> Draft </option>";
            echo "<option value='delete'> Delete </option>";
            echo "<option value='clone'> Clone </option>";
            echo "</select>";
            echo "</div>";
            echo "<div class='col-xs-4'>";
            echo "<input type='submit' name='submit' class='btn btn-success' value='Apply'>";
            echo "<input type='submit' name='add_new' class='btn btn-info' value='Add New'>";
            if(isset($_POST['add_new'])){
                header('location:add_post.php');
            }
            echo "</div>";
            echo "<table class='table table-bordered'>";
            echo "<tr>";
            echo "<th><input type='checkbox' id='selectallboxes'></th>";
            echo "<th> ID</th>";
            echo "<th> Title </th>";
            echo "<th> Status </th>";
            echo "<th> User </th>";
            //echo "<th> Category id </th>";
            echo "<th> Category </th>";
            echo "<th> Date </th>";
            //echo "<th> Content </th>";
            echo "<th> Comment count </th>";
            echo "<th> Post view count </th>";


    	while($row=mysqli_fetch_assoc($select_posts)){
            $post_id=escape($row['post_id']);
            $post_category_id=escape($row['post_category_id']);
    		$post_title=escape($row['post_title']);
            $post_status=escape($row['post_status']);
    		$post_author=escape($row['post_author']);
            $post_user=escape($row['post_user']);
            $post_date=escape($row['post_date']);
            $post_image=escape($row['post_image']);
            $post_content=escape($row['post_content']);
            $post_tags=escape($row['post_tags']);
            //$post_comment_count=$row['post_comment_count'];
            $post_status=escape($row['post_status']);
            $post_view_count=escape($row['post_view_count']);

                

            echo "</tr>";
            echo "<tr>";
            echo "<td><input type='checkbox' class='checkboxes' name='checkBoxArray[]' value= $post_id></td>";
            echo "<td> {$post_id} </td>";


            echo "<td> {$post_title} </td>";
            echo "<td> {$post_status} </td>";

            if(!empty($post_author)){
                echo "<td> {$post_author} </td>";
            }elseif(!empty($post_user)){
                echo "<td> {$post_user} </td>";
            }
           // echo "<td> {$post_category_id} </td>";
                $query="SELECT * from category WHERE cat_id={$post_category_id}";

                $select_category=mysqli_query($connection,$query);

                    while($row=mysqli_fetch_assoc($select_category))
                    {
                        $category_title=$row['cat_title'];
                       // $category_id=$row['cat_id'];

                      // if($category_id==$post_category_id)
                       //{

                        echo "<td> {$category_title} </td>";
                      //}   
                    }
                if(!$query){
                    die("query failed".mysqli_error($connection));
                }

                $comment_query1="SELECT * from comments WHERE comment_post_id=$post_id";
                $comment_query2=mysqli_query($connection,$comment_query1);
                $number_of_comments=mysqli_num_rows($comment_query2);
            echo "<td> {$post_date} </td>";
            //echo "<td> {$post_content} </td>";
            echo "<td><a href='post_comments.php?id=$post_id'> {$number_of_comments} </a></td>";
            echo "<td> {$post_view_count} </td>";
            echo "<td> <img width=150 height=70 src=../images/{$post_image}> </td>";
            echo "<td><a onclick=\"javascript: return confirm('are your sure you want to delete?');\" href='posts.php?delete={$post_id}'>Delete</a></td>";
            /*echo "<td><a onclick='myfunction()' href='posts.php?delete={$post_id}'>Delete</a></td>";?>
            <script>
                function myfunction(){
                    return confirm('r u sure?');
                    

                }
            </script <?php*/
            
            echo "<td><a href='posts.php?edit={$post_id}'>Edit</a></td>";
            echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";}
            //echo "<td> '{$post_content}' </td>";
            echo "</tr>";
            echo "</table>";
            echo "</form>";
            echo "</div>";
        
    	
    }

    
function users_online() {



    if(isset($_GET['onlineusers'])) {

    global $connection;

    if(!$connection) {

        session_start();

        include("../includes/db.php");

        $session = session_id();
        $time = time();
        $time_out_in_seconds = 05;
        $time_out = $time - $time_out_in_seconds;

        $query = "SELECT * FROM users_online WHERE session = '$session'";
        $send_query = mysqli_query($connection, $query);
        $count = mysqli_num_rows($send_query);

            if($count == NULL) {

            mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session','$time')");

            } else {

            mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session'");
            }

        $users_online_query =  mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'");
        echo $count_user = mysqli_num_rows($users_online_query);
    }
    } // get request isset()
}
users_online();



function escape($string){
    global $connection;
    mysqli_real_escape_string($connection,trim($string));
}
?>