<?php 
   // include "includes/db.php";
?>
<div class="col-md-4">

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

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form method="post" action="search.php">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                <!--- LOGIN FORM---->
                <div class="well">
                    <h4>LOGIN</h4>
                    <form method="post" action="includes/login.php">
                    <div class="form-group">
                        <input type="text" class="form-control" name="user_name" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                        
                    </div>
                    <span class="input-control">
                        <button class="btn btn-danger" name="login" type="submit"> LOGIN </button>
                    </span>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php
                                    $query="SELECT * from category";
                                    $sidebar_category=mysqli_query($connection,$query);

                                    while($row=mysqli_fetch_assoc($sidebar_category))
                                    {
                                            $cat_title=$row['cat_title'];
                                            $cat_id=$row['cat_id'];
                                    
                                ?>
                                <li><a href="category.php?category= <?php echo $cat_id ?>"><?php echo $cat_title ?></a>
                                </li>
                              <?php }?>  
                            </ul>
                        
                        </div>
                        
                        <!-- /.col-lg-6 -->
                        
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>
            