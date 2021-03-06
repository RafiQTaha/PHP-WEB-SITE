
                      <h1 class="page-header">
                          Add Posts
                          <small>user</small>
                      </h1>

         <?php
                  if (isset($_POST['create_post'])) {
                    $post_title = $_POST['title'];
                    $post_category_id = $_POST['post_category_id'];
                    // $post_author = $_POST['post_user'];
                    $post_user = $_POST['post_user'];
                    $post_status = $_POST['post_status'];

                    $post_image = $_FILES['image']['name'];
                    $post_image_temp = $_FILES['image']['tmp_name'];
                    move_uploaded_file($post_image_temp, "../images/$post_image");

                    $post_tags = $_POST['post_tags'];
                    $post_content = $_POST['post_content'];
                    $post_content = mysqli_real_escape_string($conn , $post_content);
                    $date = date("d/m/y");

                    $query = "INSERT INTO `posts`(`post_category_id`, `post_title`,`post_user`, `post_date`,`post_image`, `post_content`, `post_tags`, `post_status`) ";
                    $query .= "VALUES ({$post_category_id},'{$post_title}','{$post_user}','$date','{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
                    $add_post_query = mysqli_query($conn , $query);
                    die_query($add_post_query);
                    $p_id = mysqli_insert_id($conn);
                    echo "<h4 class='bg-success'>Post Created: <a href='../post.php?p_id={$p_id}'>View Post</a> Or <a href='./posts.php'>View all Posts</a></h4>";
                    }

          ?>


            <form class="" action="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                        <label for="cat_title"> Title </label>
                        <input type="text" class="form-control" name="title" placeholder="Put Your Post Title..">
                  </div>
                  <div class="form-group">
                    <label for="Categories"> Categories </label>
                    <select class="form-control" name="post_category_id" id="">
                      <option value="" disabled selected>Choose The Category</option>
                      <?php
                      $query = "select * from categories ";
                      $All_categories_ti = mysqli_query($conn,$query);
                      die_query($All_categories_ti);
                      while ($row = mysqli_fetch_assoc($All_categories_ti))
                      {
                      $cat_title = $row['cat_title'];
                      $cat_id = $row['cat_id'];
                      ?>
                      <option value="<?php echo $cat_id ?>"><?php echo $cat_title;?></option>
                      <?php
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
                          ?>
                            <option value="<?php echo $user_id ?>"><?php echo $firstname ?></option>
                          <?php
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
                        <label for="image"> Post Image </label>
                        <input type="file" name="image">
                  </div>
                  <div class="form-group">
                        <label for="post_tags"> Post Tags </label>
                        <input type="text" class="form-control" name="post_tags" placeholder="Car Voiture Speed Marque ...">
                  </div>
                  <div class="form-group">
                        <label for="post_content"> Post Content </label>
                        <textarea class="form-control" name="post_content" rows="10" cols="30" id='body' placeholder="You Can Write What You Want Here..."></textarea>
                  </div>
                  <div class="form-group">
                      <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
                  </div>
            </form>
