<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php

        if (!empty($_SESSION['username'])) {
          header("Location: index.php");
        }

$message = "";
$messag = "";
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = "SELECT * FROM users WHERE username='{$username}' OR user_email = '{$email}' ";
            $select_user_query= mysqli_query($conn, $query);
            if (!$select_user_query) {
              die("Query Failed" . mysqli_error($conn));
            }
            $count_users = mysqli_num_rows($select_user_query);
            if ($count_users < 1) {
              if (!empty($username) && !empty($email) && !empty($password)) {
                $username = mysqli_real_escape_string($conn ,$username );
                $email = mysqli_real_escape_string($conn , $email);
                $password = mysqli_real_escape_string($conn , $password);

                $password = password_hash($password, PASSWORD_DEFAULT, array('cost' => 12));

                $query = "INSERT INTO `users`(`username`,`user_email`,`password`, `user_role`) VALUES ('$username','$email','$password','Subscriber')";
                $register = mysqli_query($conn, $query);
                $messag = "Registration Success!";
              }
              else{
                $message = "Failds Can't Be Empty!!";
              }
            }
          else {
            $message = "Username Or Email Already Exist!!";
          }
        }

 ?>

    <!-- Navigation -->

    <?php  include "includes/navigation.php"; ?>


    <!-- Page Content -->
    <div class="container">

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                      <h5 class="text-center" style="color : red"><?php echo $message ?></h5>
                      <h5 class="text-center" style="color : green"><?php echo $messag ?></h5>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>

                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
