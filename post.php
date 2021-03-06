<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>
    <!-- Navigation -->
<?php include 'includes/navigation.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

              <h1 class="page-header">
                  Page Heading
                  <small>Secondary Text</small>
              </h1>

              <?php
              if (isset($_GET['p_id'])) {
                $post_id = $_GET['p_id'];
                $query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id={$post_id}";
                $post_views_count = mysqli_query($conn,$query);
                $query = "select * from posts where post_id={$post_id}";
                $All_posts = mysqli_query($conn,$query);
                while ($row = mysqli_fetch_assoc($All_posts))
                {
                  $post_title = $row['post_title'];
                  $post_author = $row['post_user'];
                  $post_date = $row['post_date'];
                  $post_image = $row['post_image'];
                  $post_content = $row['post_content'];

                  ?>
                  <!-- Blog Post -->
                  <h2>
                      <a href="#"><?php echo $post_title ?></a>
                  </h2>
                  <p class="lead">
                    <?php
                    $query = "SELECT * FROM users WHERE user_id = {$post_author} ";
                    $users_query = mysqli_query($conn , $query);
                    $row = mysqli_fetch_assoc($users_query);
                      $user_id = $row['user_id'];
                      $username = $row['username'];
                      $firstname = $row['firstname'];
                     ?>
                      by <a href="user_post.php?autor=<?php echo $post_user ?>"><?php echo $username ?></a>
                  </p>
                  <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                  <hr>
                  <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="image">
                  <hr>
                  <p><?php echo $post_content ?></p>

                  <hr>
                  <?php
                }
              }
              else {
                header("Location: index.php");
              }
               ?>

               <!-- Blog Comments -->

               <!-- Comments Form -->

               <?php
               if (isset($_POST['creat_comment'])) {
                   if (!empty($_SESSION['username'])) {

                               if (!empty($_POST['comment_content'])) {
                                 $comment_autor = $_SESSION['firstname'];
                                 $comment_user = $_SESSION['user_id'];
                                 $comment_email = $_SESSION['user_email'];
                                 $comment_content = $_POST['comment_content'];
                                 $comment_image = $_SESSION['user_image'];
                                 $date = date("d/m/y");
                                 $query= "INSERT INTO `comments`(`Comment_post_id`, `Comment_user`, `Comment_author`, `comment_email`, `Comment_content`, `Comment_status`,`Comment_date`,`comment_user_image`)";
                                 $query .=" VALUES ({$post_id},'{$comment_user}','{$comment_autor}','{$comment_email}','{$comment_content}','Approved','$date','{$comment_image}')";
                                 $add_comment_query = mysqli_query($conn , $query);
                                 if (!$add_comment_query) {
                                   die("querry failed" . mysqli_error($conn));
                                 }

                               }

                           else {
                                echo "<script>alert('Failds cannot be empty!!')</script>";
                           }
                   }
                 else {
                         echo "<script>alert('Please Login First!!')</script>";
                 }
               }


               ?>




               <div class="well">
                   <h4>Leave a Comment:</h4>
                   <form method="POST" role="form">
                       <div class="form-group">
                          <textarea name="comment_content"  class="form-control" rows="3"></textarea>
                       </div>
                       <button type="submit" name="creat_comment" class="btn btn-primary">Submit</button>
                   </form>
               </div>
               <hr>
               <!-- Posted Comments -->
               <!-- Comment -->
               <?php
               $query = "select * from comments WHERE Comment_post_id={$post_id} and Comment_status='Approved' ORDER BY Comment_date DESC";
               $All_comment = mysqli_query($conn,$query);
               while ($row = mysqli_fetch_assoc($All_comment))
               {
                   $comment_author = $row['Comment_author'];
                   $comment_content = $row['Comment_content'];
                   $comment_date = $row['Comment_date'];
                   $comment_image = $row['comment_user_image'];
                   ?>
                   <div class="media">
                       <a class="pull-left" href="#">
                           <img src="images/<?php echo $comment_image ?>" width="60px" alt=".." class="rounded float-left">
                       </a>
                       <div class="media-body">
                           <h4 class="media-heading"><?php echo $comment_author ?>
                               <small><?php echo $comment_date ?></small>
                           </h4>
                           <?php echo $comment_content ?>
                       </div>
                   </div><br>
                   <?php
               }
                ?>




            </div>

            <!-- Blog Sidebar Widgets Column -->
<?php include 'includes/sidebar.php'; ?>

        </div>
        <!-- /.row -->
        <hr>
        <!-- Footer -->
        <?php include 'includes/footer.php'; ?>
