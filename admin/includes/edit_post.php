<h1 class="page-header">
    Edit Posts
    <small>Author</small>
</h1>

                  <?php
                  if (isset($_GET['p_id'])) {
                  $p_id = $_GET['p_id'];
                  $query = "SELECT * FROM posts WHERE post_id={$p_id}";
                  $All_posts_by_id = mysqli_query($conn,$query);
                  die_query($All_posts_by_id);
                  while ($row = mysqli_fetch_assoc($All_posts_by_id))
                  {
                  $post_id = $row['post_id'];
                  $post_user = $row['post_user'];
                  $post_title = $row['post_title'];
                  $post_category_id = $row['post_category_id'];
                  $post_status = $row['post_status'];
                  $post_image = $row['post_image'];
                  $post_tags = $row['post_tags'];
                  $post_comment_count = $row['post_comment_count'];
                  $post_content = $row['post_content'];
                  }
              }

                  if (isset($_POST['Update_post'])) {
                    $post_title = $_POST['title'];
                    $post_category_id = $_POST['post_category_id'];
                    $post_user = $_POST['post_user'];
                    $post_status = $_POST['post_status'];
                    $post_tags = $_POST['post_tags'];
                    $post_content = $_POST['post_content'];
                    $post_content = mysqli_real_escape_string($conn , $post_content);
                    $date = date("d/m/y");
                    $post_image = $_FILES['image']['name'];
                    $post_image_temp = $_FILES['image']['tmp_name'];
                    move_uploaded_file($post_image_temp, "../images/$post_image");

                    if (empty($post_image)) {
                      $query = "SELECT * FROM posts WHERE post_id={$p_id}";
                      $All_posts_by_id = mysqli_query($conn,$query);
                      while ($row = mysqli_fetch_assoc($All_posts_by_id))
                      {
                        $post_image = $row['post_image'];
                      }
                      $query = "UPDATE posts SET post_category_id= {$post_category_id}, ";
                      $query .="post_title ='{$post_title}', ";
                      $query .="post_user = '{$post_user}', ";
                      $query .="`post_date`= '$date', ";
                      $query .="`post_image`='{$post_image}', ";
                      $query .="post_content ='{$post_content}',";
                      $query .="`post_tags`='{$post_tags}', ";
                      $query .="`post_status`='{$post_status}' WHERE post_id={$p_id}";
                      $update_post_Query = mysqli_query($conn,$query);
                      die_query($update_post_Query);
                    }
                    else {
                      $query = "UPDATE `posts` SET `post_category_id`= {$post_category_id}, `post_title` ='{$post_title}',";
                      $query .="`post_user`= '{$post_user}', `post_date`='$date', ";
                      $query .="`post_image`='{$post_image}', `post_image`='{$post_image}', ";
                      $query .="`post_content`='{$post_content}', `post_tags`='{$post_tags}', ";
                      $query .="`post_status`='{$post_status}' WHERE post_id={$p_id}";

                      $update_post_Query = mysqli_query($conn,$query);
                      header("Location: posts.php?source=all_post");
                      die_query($update_post_Query);
                    }
                    echo "<h4 class='bg-success'>Post Updated: <a href='../post.php?p_id={$p_id}'>View Post</a> Or <a href='./posts.php'>View all Posts</a></h4>";
                        }
                   ?>

<form class="" action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
            <label for="cat_title"> Title </label>
            <input type="text" class="form-control" name="title" value="<?php echo $post_title;?>">
      </div>
      <div class="form-group">
            <select class="form-control" name="post_category_id" required>

              <?php

              $query = "select * from categories ORDER BY cat_title";
              $All_categories_ti = mysqli_query($conn,$query);
              die_query($All_categories_ti);
              while ($row = mysqli_fetch_assoc($All_categories_ti))
              {
              $cat_title = $row['cat_title'];
              $cat_id = $row['cat_id'];
              if ($cat_id != $post_category_id) {
                ?><option value="<?php echo $cat_id ?>"><?php echo $cat_title;?></option><?php
              }
              else {
                ?>
                <option value="<?php echo $cat_id ?>"selected ><?php echo $cat_title;?></option>
                <?php
              }

              }
               ?>
            </select>
      </div>
      <div class="form-group">
            <label for="post_user"> user </label>
            <select class="form-control" name="post_user" id="">
              <option value="" disabled selected>Choose Users</option>
            <?php
            $query = "SELECT * FROM users";
            $users_query = mysqli_query($conn , $query);
            die_query($users_query);
            while ($row = mysqli_fetch_assoc($users_query)) {
              $user_id = $row['user_id'];
              $username = $row['username'];
              $firstname = $row['firstname'];
              if ($user_id != $post_user) {
                ?><option value="<?php echo $user_id ?>"><?php echo $firstname;?></option><?php
              }
              else {
                ?>
                <option value="<?php echo $user_id ?>"selected ><?php echo $firstname;?></option>
                <?php
              }
            }
             ?>
           </select>
      </div>
      <div class="form-group">
            <input type="radio" class="radio" id="Public" name="post_status" value="Public" checked>
            <label for="Public">Public</label>
            <input type="radio" class="radio" id="Private" name="post_status" value="Private">
            <label for="Private">Private</label>
      </div>
      <div class="form-group">
            <label for="image"> Post Image </label><br>
            <img width="100px" src="../images/<?php echo $post_image ?> " alt="Image"><br><br>
            <input type="file" name="image" >
      </div>
      <div class="form-group">
            <label for="post_tags"> Post Tags </label>
            <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags;?>">
      </div>
      <div class="form-group">
            <label for="post_content"> Post Content </label>
            <textarea class="form-control" name="post_content" rows="10" cols="30" id='body'><?php echo $post_content?></textarea>
      </div>
      <div class="form-group">
          <input class="btn btn-primary" type="submit" name="Update_post" value="Update Post">
      </div>
</form>
