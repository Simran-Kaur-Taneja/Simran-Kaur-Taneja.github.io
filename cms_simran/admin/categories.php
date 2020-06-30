<?php include"includes/admin_header.php"; ?>


    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">
                
                 <?php Insertion();?>


                <!-- Page Heading -->
                

                <div class="row">
                    <h1>WELCOME ADMIN </h1> 
                    <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>

                        </ol>
                    <div class="col-xs-6">
                        <form method="post" class="form-group">
                            <h2>Add Category</h2>
                            <input type="text" name="cat_title" class="form_control"><br><br>
                            <input type="submit" name="submit" value="Add category" class="btn btn-primary"><br><br>
                        </form>
                        
                    </div>
                    <div class="col-xs-4" >
                        <table class="table table-borderd table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category title</th>
                            </tr>
                            </thead>
                            <tbody>

                    <?php 
                        select_all();
                    ?>
                <?php
                    deletion();
                    //header("location:categories.php");

                     if(isset($_GET['edit'])){
                        $category_id=$_GET['edit'];
                        include "includes/admin_updation.php";
                        //echo "<h1>{$new_category}</h1>";

                     }
                ?>
                    

                        </tbody>    
                       </table>        
                    </div> 

                </div>
                <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->
            

        </div>
    </div>


        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"; ?>