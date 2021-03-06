              <h1 class="page-header">
                  All Posts
                  <small>Author</small>
              </h1>


                <?php

                  if (isset($_POST['checkBoxArray'])) {
                    foreach ($_POST['checkBoxArray'] as $checkValueId) {
                      $bulk_options = $_POST['bulk_options'];
                        switch ($bulk_options) {
                          case 'Public':
                            $query = "UPDATE posts SET post_status='{$bulk_options}' WHERE post_id = {$checkValueId}";
                            $public_query= mysqli_query($conn,$query);
                            break;
                          case 'Private':
                            $query = "UPDATE posts SET post_status='{$bulk_options}' WHERE post_id = {$checkValueId}";
                            $public_query= mysqli_query($conn,$query);
                            break;
                          case 'Delete':
                            $query = "DELETE FROM posts WHERE post_id={$checkValueId}";
                            $delete_Query = mysqli_query($conn,$query);
                            break;

                          case 'Clone':
                          $query = "SELECT * from posts WHERE post_id = {$checkValueId}";
                          $All_posts = mysqli_query($conn,$query);
                          while ($row = mysqli_fetch_assoc($All_posts))
                          {
                              $post_author = $row['post_author'];
                              $post_title = $row['post_title'];
                              $post_category_id = $row['post_category_id'];
                              $post_status = $row['post_status'];
                              $post_image = $row['post_image'];
                              $post_tags = $row['post_tags'];
                              $post_content = $row['post_content'];
                              $post_content = mysqli_real_escape_string($conn , $post_content);
                              $date = date("d/m/y");
                          $query = "INSERT INTO `posts`(`post_category_id`, `post_title`, `post_author`, `post_date`,`post_image`, `post_content`, `post_tags`, `post_status`) ";
                          $query .= "VALUES ({$post_category_id},'{$post_title}','{$post_author}','$date','{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
                          $add_post_query = mysqli_query($conn , $query);
                          die_query($add_post_query);
                          }

                            break;

                        }
                    }
                  }

                 ?>

    <form class="" action="" method="POST">
          <table class="table table-hover table-bordered" id="table">

            <div id="bulkOptionsContainer" class="col-xs-4" style="padding:0">
              <select  class="form-control" name="bulk_options">
                  <option value="">Select Options</option>
                  <option value="Public">Published</option>
                  <option value="Private">Private</option>
                  <option value="Delete">Delete</option>
                  <option value="Clone">Clone</option>
              </select>
            </div>

            <div class="col-xs-4">
              <input type="submit" class="btn btn-success" name="submit" value="Apply">
              <a class="btn btn-primary" href="posts.php">View All Posts</a>
              <?php include'exportbtn.php' ?>
            </div>
            <br><br>
            <thead>
              <tr>
                    <th><input type="checkbox" name="" id="selectAllBoxes" value=""></th>
                    <th>#</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Tags</th>
                    <th>Comments</th>
                    <th>Date</th>
                    <th>Views</th>
                    <th>Edit</th>
                    <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($_GET['author'])) {
              $author = $_GET['author'];
              $query = "SELECT * from posts WHERE post_user = '{$author}'";
              $All_posts = mysqli_query($conn,$query);
              while ($row = mysqli_fetch_assoc($All_posts))
              {
                  $post_id = $row['post_id'];
                  $post_user = $row['post_user'];
                  $post_title = $row['post_title'];
                  $post_category_id = $row['post_category_id'];
                  $post_status = $row['post_status'];
                  $post_image = $row['post_image'];
                  $post_tags = $row['post_tags'];
                  $post_comment_count = $row['post_comment_count'];
                  $post_date = $row['post_date'];
                  $post_views_count = $row['post_views_count'];

                  $query = "select * from categories WHERE cat_id={$post_category_id}";
                  $All_categories = mysqli_query($conn,$query);
                  while ($row = mysqli_fetch_assoc($All_categories))
                  {
                  $Id_Cat = $row['cat_id'];
                  $cat_title = $row['cat_title'];
                  }
                  $query = "select * from users WHERE user_id={$post_user}";
                  $All_users = mysqli_query($conn,$query);
                  while ($row = mysqli_fetch_assoc($All_users))
                  {
                    $user_id = $row['user_id'];
                    $username = $row['username'];
                    $firstname = $row['firstname'];
                  }
               ?>
              <tr>
                    <?php echo "<th><input type='checkbox' class='checkboxes' value='{$post_id}' name='checkBoxArray[]'></th>" ?>
                    <th><?php echo $post_id ?></th>
                    <td> <a href="posts.php?author=<?php echo $post_user ?>&source=post_users"><?php echo $firstname ?></a> </td>
                    <td><?php echo $post_title ?></td>
                    <td><?php echo $cat_title ?></td>
                    <td><?php echo $post_status ?></td>
                    <td><a href="../post.php?p_id=<?php echo $post_id ?>" target="_BLANK">
                      <img width="100px" src="../images/<?php echo $post_image ?> " alt="Image">
                    </a></td>
                    <td><?php echo $post_tags ?></td>
                    <?php
                    $query = "SELECT * FROM comments WHERE Comment_post_id = {$post_id}";
                    $count_comment_query = mysqli_query($conn , $query);
                    $count_comment = mysqli_num_rows($count_comment_query);
                     ?>
                    <td><a href="comments.php?source=post_comments&id=<?php echo $post_id ?>"><?php echo $count_comment ?></a></td>
                    <td width="100px"><?php echo $post_date ?></td>
                    <td><a href="posts.php?reset=<?php echo $post_id ?>"><?php echo $post_views_count ?></a></td>
                    <td><a href="posts.php?source=edit_post&p_id=<?php echo $post_id ?>">Edit</a></td>
                    <td><a onclick="confirm('Are You Shure You Want To Delete This Post ?!')" href="posts.php?delete=<?php echo $post_id ?>" >Delete</a></td>
              </tr>
            <?php } } ?>
            </tbody>
          </table>
</form>
<?php
if (isset($_GET['reset'])) {
    $reset = $_GET['reset'];
    $query = "UPDATE posts SET post_views_count = 0 WHERE post_id='".$reset."'";
    $delete_post_Query = mysqli_query($conn,$query);
    header("Location: posts.php?source=all_post");
}

if (isset($_GET['delete'])) {
    $post_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id='".$post_id."'";
    $delete_post_Query = mysqli_query($conn,$query);
      die_query($delete_post_Query);
    $query = "DELETE FROM comments WHERE Comment_post_id='".$post_id."'";
    $delete_comment_Query = mysqli_query($conn,$query);
    header("Location: posts.php?source=all_post");
      die_query($delete_comment_Query);
}

 ?>
