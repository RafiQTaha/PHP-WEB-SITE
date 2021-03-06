<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>
    <!-- Navigation -->
<?php include 'includes/navigation.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
              <?php
              if (isset($_GET['autor'])) {
                $post_user = $_GET['autor'];
              $query = "SELECT * FROM users WHERE user_id = {$post_user} ";
              $users_query = mysqli_query($conn , $query);
              $row = mysqli_fetch_assoc($users_query);
                $user_id = $row['user_id'];
                $username = $row['username'];
                $firstname = $row['firstname'];

              ?>
              <h1 class="page-header">
                  Page User
                  <small><?php echo $username ?></small>
              </h1>
              <?php

                if (isset($_GET['page'])) {
                $page = $_GET['page'];
                }
                else {
                  $page = 1;
                }
                $page_1 = ($page * 5) - 5;

                $query = "select * from posts where post_user='{$post_user}' and post_status ='Public' ORDER BY post_id DESC limit $page_1, 5";
                $query1 = "select * from posts where post_user='{$post_user}' and post_status ='Public'";
                if (isset($_SESSION["user_role"])) {
                  if ($_SESSION["user_role"] == "Admin" ) {
                    $query = "select * from posts where post_user='{$post_user}' ORDER BY post_id DESC limit $page_1, 5";
                    $query1 = "select * from posts where post_user='{$post_user}' ";
                  }
                }
                $count_post = mysqli_query($conn,$query1);
                $count= mysqli_num_rows($count_post);
                $count = ceil($count/5);

                $All_posts = mysqli_query($conn,$query);
                while ($row = mysqli_fetch_assoc($All_posts))
                {
                  $post_id = $row['post_id'];
                  $post_title = $row['post_title'];
                  $post_user = $row['post_user'];
                  $post_date = $row['post_date'];
                  $post_image = $row['post_image'];
                  $post_content = substr($row['post_content'],0,200);


                  ?>


                  <!-- Blog Post -->
                  <h2>
                      <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                  </h2>
                  <p class="lead">
                      by <a href="#"><?php echo $username ?></a>
                  </p>
                  <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                  <hr>
                  <a href="post.php?p_id=<?php echo $post_id ?>"><img class="img-responsive" src="images/<?php echo $post_image ?>" alt="image"></a>

                  <hr>
                  <p><?php echo $post_content ?></p><br><br>
                  <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                  <hr>
                  <?php
                }

             if ($count > 0) {
                  ?>
                  <ul class="pager">
                    <?php for ($i=1; $i <= $count ; $i++) {
                      if ($i == $page) {
                        ?>
                          <li style="margin-right:5px;">
                            <a style="background-color:#000" href="user_post.php?autor=<?php echo $post_user ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                          </li>
                        <?php
                      }
                      else {
                        ?>
                        <li style="margin-right:5px">
                          <a href="user_post.php?autor=<?php echo $post_user ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                        </li>
                        <?php
                      }
                     } ?>
                  </ul>
                  <?php
             }
             else {
               ?><h1 class="text-center">Sorry There is No Public Posts</h1><?php
             }
              }



              else {
                header("Location: index.php");
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
