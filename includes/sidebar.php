<div class="col-md-4">


    <!-- Blog Search Well -->
    <div class="well">
        <h4>Search</h4>
        <form class="" action="search.php" method="POST">
          <div class="input-group">
              <input type="text" name="search" class="form-control" >
              <span class="input-group-btn">
                  <button name="submit" class="btn btn-default" type="submit">
                      <span class="glyphicon glyphicon-search"></span>
              </button>
              </span>
          </div>
        </form>
        <!-- /.input-group -->

                  <p id="username"></p>
    </div>

          <p id="username"></p>
        <!-- Blog login Well -->
        <?php
        if (empty($_SESSION['username'])) {
          ?>
          <div class="well">
              <h4 >Login</h4>
              <form class="" action="includes/login.php" method="POST" >
                <div class="form-group">
                    <input type="text"  name="username" class="form-control" placeholder="Enter Username">
                </div>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter PAssword">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit" name="login">Login</button>
                    </span>
                </div>
              </form>
            </div>
          <?php
        }
         ?>



    <?php
        $query = "select * from categories";
        $All_categories = mysqli_query($conn,$query);
     ?>
    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                  <?php
                      while ($row = mysqli_fetch_assoc($All_categories))
                      {
                        $cat_id = $row['cat_id'];
                        $cattegory = $row['cat_title'];
                        echo "<li><a href='category.php?c_id={$cat_id}'>$cattegory</a></li>";
                      }
                   ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
        <?php include 'widget.php' ?>

</div>
