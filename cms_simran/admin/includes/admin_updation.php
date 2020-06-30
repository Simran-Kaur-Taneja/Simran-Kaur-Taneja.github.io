<form method="post">
        <h2>Edit Category </h2>                  
         <?php
         $query="SELECT * from category WHERE cat_id='{$category_id}'";
         $edit_category=mysqli_query($connection,$query);

                    while($row=mysqli_fetch_assoc($edit_category)){
                          $category_id=$row['cat_id'];
                          $category_title=$row['cat_title'];
                           echo "<input type='text' name='edit_cat' class='form_control' value='{$category_title}'><br><br>";
                        }?>

                                          

            <input type="submit" name="edit_submit" value="update category" class="btn btn-primary">
</form>

            <?php 
                if(isset($_POST['edit_submit'])){
                $new_category=$_POST['edit_cat'];
                //echo "<h1>{$new_category}</h1>";
                $q="UPDATE category set cat_title='{$new_category}' WHERE cat_id='{$category_id}'";
                $update=mysqli_query($connection,$q);
                header("location:categories.php");
                
                        }
                    ?>
                    