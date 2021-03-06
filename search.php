<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

    <!-- Navigation -->
<?php include 'includes/navigation.php'; ?>

    <!-- Page Content -->
    <div class="container">
      <h1 class="page-header">
          Serching Page
          <!-- <small>Small Title</small> -->
      </h1>
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
              <?php
                  if (isset($_POST['search'])) {
                    $search = $_POST['search'];

                    $query = "select * from posts where post_status='Public' and post_tags like '%$search%' ORDER BY post_id DESC";


                    if (isset($_SESSION['user_role'])) {
                      if ($_SESSION['user_role'] == "Admin") {
                        $query = "select * from posts where post_tags like '%$search%' ORDER BY post_id DESC";

                      }
                    }

                    $search_query = mysqli_query($conn,$query);
                    if (!$search_query) {
                      die("Query Failed !!" . mysqli_error($conn));
                    }
                      $count = mysqli_num_rows($search_query);
                      if ($count == 0) {
                        echo "<h3 style='color:red'>Sorry.. No Result In Here!!</h3>";
                      }
                      else {
                        while ($row = mysqli_fetch_assoc($search_query))
                        {
                          $post_id = $row['post_id'];
                          $post_title = $row['post_title'];
                          $post_user = $row['post_user'];
                          $post_date = $row['post_date'];
                          $post_image = $row['post_image'];
                          $post_content = substr($row['post_content'],0,200);

                          ?>
                          <!-- First Blog Post -->
                          <h2>
                              <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                          </h2>
                          <p class="lead">
                            <?php
                            $query = "SELECT * FROM users WHERE user_id = {$post_user} ";
                            $users_query = mysqli_query($conn , $query);
                            $row = mysqli_fetch_assoc($users_query);
                              $user_id = $row['user_id'];
                              $username = $row['username'];
                              $firstname = $row['firstname'];
                             ?>
                              by <a href="user_post.php?autor=<?php echo $post_user ?>"><?php echo $username ?></a>
                          </p>
                          <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                          <a href="post.php?p_id=<?php echo $post_id ?>"><img class="img-responsive" src="images/<?php echo $post_image ?>" alt=""></a>
                          <hr>
                          <p><?php echo $post_content ?></p>
                          <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                          <hr>
                    <?php  }

                  }
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
