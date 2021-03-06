<form class="" action="" method="post">
  <div class="form-group">

      <label for="cat_title"> Update Category </label>
      <?php
      // if (isset($_GET['Edit'])) {
        // $The_Id_cat = $_GET['Edit'];
        $query = "select * from categories WHERE cat_id=$The_Id_cat";
        $All_categories_ti = mysqli_query($conn,$query);
        while ($row = mysqli_fetch_assoc($All_categories_ti))
        {
        $cattegory = $row['cat_title'];

        ?><input type="text" class="form-control" name="Update_cat_title" value="<?php echo $cattegory ?>"><?php

        }
      // }
      if (isset($_POST['Update_Submit'])) {
            $The_cat_title = $_POST['Update_cat_title'];
            if (!empty($The_cat_title)) {
                  $query = "UPDATE categories SET cat_title='".$The_cat_title."' WHERE cat_id='".$The_Id_cat."'";
                  $update_Cat_Query = mysqli_query($conn,$query);
                        if (!$update_Cat_Query) {
                        die("Querry Failed !!" . mysqli_error($conn));
                        }
                        header("Location:categories.php?Edit=$The_Id_cat");
            }
      }
      ?>

  </div>

  <div class="form-group">
      <input type="submit" name="Update_Submit" class="btn btn-primary" value="Update Category">
  </div>
</form>
