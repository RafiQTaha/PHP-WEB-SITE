<?php include'db.php'; ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=".\">Car News</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <?php
                  $query = "select * from categories limit 6";
                  $All_categories = mysqli_query($conn,$query);
                  while ($row = mysqli_fetch_assoc($All_categories))
                  {
                    $cat_id = $row['cat_id'];
                    $cattegory = $row['cat_title'];
                    if (isset($_GET['c_id']) && $_GET['c_id'] == $cat_id ) {
                      ?><li class="active"><a href='category.php?c_id=<?php echo $cat_id ?>'><?php echo $cattegory ?></a></li><?php
                    }
                    else {
                      ?>
                      <li><a href='category.php?c_id=<?php echo $cat_id ?>'><?php echo $cattegory ?></a></li>

                      <?php
                    }
                  }
               ?>
               <li ><a href="contact.php" > Contact </a></li>
            </ul>
            <?php
            if (empty($_SESSION['username'])) {
              ?>
              <ul class="nav navbar-nav navbar-right" style="margin-right:0" >
                  <li >
                      <a class="navbar-brand" href="./index.php#username" > Login </a>
                  </li>
                  <li >
                      <a class="navbar-brand" href="registration.php" > Register </a>
                  </li>
              </ul>

                <?php
            }
            else {
              ?>
              <ul class="nav navbar-nav navbar-right" >
                <?php
             if (!empty($_SESSION['user_role'])) {
               if (isset($_GET['p_id']) && $_SESSION['user_role'] == 'Admin') {
                 $post_id = $_GET['p_id'];
                 ?>
                 <li><a style="color : white" href='admin/posts.php?source=edit_post&p_id=<?php echo $post_id ?>'>Edit</a></li>
                 <?php
               }

             }
                 ?>
                  <li>
                      <a href="" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['firstname'] ?> </a>
                      <ul class="dropdown-menu">
                        <?php
                        if ($_SESSION['user_role'] == 'Admin') {
                          ?><li><a href='admin/'><i class="fa fa-fw fa-dashboard"></i> Admin</a></li><?php
                        }
                         ?>
                          <li>
                              <a href="admin/profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                          </li>
                          <li class="divider"></li>
                          <li>
                              <a href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                          </li>
                      </ul>
                  </li>
              </ul>
              <?php
            }
             ?>

        </div>

        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
