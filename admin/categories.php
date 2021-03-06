<?php include'includes/admin_header.php'; ?>
    <div id="wrapper">

        <!-- Navigation -->
<?php include'includes/admin_navigation.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin Page
                            <small><?php echo $_SESSION['username'] ?></small>
                        </h1>
              <!-- *********************************************************************
                              TO ADD A CATEGORIES ..
                              ************************************************** -->
                        <div class="col-xs-6">
<?php Add_Categories(); ?>
                          <form class="" action="" method="post">

                            <div class="form-group">
                                <label for="cat_title"> Add Category </label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
                            </div>
                          </form>
                          <hr>
                          <!--   ************************************************************************************
                                                  TO UPDATE THE CATEGORIES IN DATABASE ..
                                                  ******************************************** -->

<?php UpdateCategories(); ?>
<?php //include 'includes/Update_category.php'; ?>



                        </div>
                      <!--   ************************************************************************************
                                TO READ AND DELETE END UPDATE THE CATEGORIES  ..
                                ******************************************** -->
                        <div class="col-xs-6">

                            <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Title</th>
                                    </tr>
                                 </thead>
                                 <tbody>
<!--   ***************************************************************************************
TO READ THE CATEGORIES FROM DATABASE TO TABLE ..
************************************************ -->
<?php ReadAllCategories(); ?>
<!-- *****************************************************************************************
TO DELETE A CATEGORIES FROM DATABASE (DELETE BUTTON INCLUDED IN TABLE)..
********************************************************************* -->
<?php DeleteCategories(); ?>
                                </tbody>
                            </table>
                          </div>
                        </div>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php include'includes/admin_footer.php'; ?>
