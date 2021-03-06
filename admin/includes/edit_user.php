<h1 class="page-header">
    Edit User
    <small>Author</small>
</h1>

                  <?php
                  if (isset($_GET['u_id'])) {
                  $u_id = $_GET['u_id'];
                  $query = "SELECT * FROM users WHERE user_id={$u_id}";
                  $user_by_id = mysqli_query($conn,$query);
                  die_query($user_by_id);
                  while ($row = mysqli_fetch_assoc($user_by_id))
                  {

                    $user_id = $row['user_id'];
                    $username = $row['username'];
                    $db_password = $row['password'];
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $user_email = $row['user_email'];
                    $user_image = $row['user_image'];
                    $user_role = $row['user_role'];

                  }
              }

                  if (isset($_POST['update_user'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $user_email = $_POST['user_email'];
                    $user_role = $_POST['user_role'];
                    $user_image = $_FILES['user_image']['name'];
                    $user_image_temp = $_FILES['user_image']['tmp_name'];
                    move_uploaded_file($user_image_temp, "../images/$user_image");

                    if (empty($user_image)) {
                      $query = "SELECT user_image FROM users WHERE user_id={$u_id}";
                      $check_image = mysqli_query($conn,$query);
                      $row = mysqli_fetch_assoc($check_image);
                        $user_image = $row['user_image'];
                    }
                    if (!empty($password)) {
                      $query = "SELECT password FROM users WHERE user_id={$u_id}";
                      $check_password = mysqli_query($conn,$query);
                      $row = mysqli_fetch_assoc($check_password);
                      $db_password = $row['password'];

                      if ($password != $db_password) {
                        $hash_password = password_hash($password, PASSWORD_DEFAULT, array('cost' => 10));
                      }
                      else {
                        $hash_password = $db_password;
                      }
                      $query = "UPDATE `users` SET ";
                      $query .="`username`= '{$username}', ";
                      $query .="`password`='{$hash_password}', ";
                      $query .="`firstname`='{$firstname}',";
                      $query .="`lastname`='{$lastname}', ";
                      $query .="`user_email`='{$user_email}', ";
                      $query .="`user_image`='{$user_image}', ";
                      $query .="`user_role`='{$user_role}' ";
                      $query .="WHERE user_id={$u_id}";
                      $update_user_Query = mysqli_query($conn,$query);
                      die_query($update_user_Query);
                      echo "<h4 class='bg-success'>User Updated: <a href='./users.php'>View all Users</a></h4>";
                        }
                      else {
                        echo "<h4 class='bg-success'>Please Check In Your Password</h4>";
                      }
                    }




                   ?>

                   <form class="form" action="" method="POST" enctype="multipart/form-data">

                         <div class="form-group">
                               <img width="100px" src="../images/<?php echo $user_image ?> " alt="Image"><br><br>
                               <input type="file" name="user_image">
                         </div>
                         <div class="form-group">
                               <label for="cat_title"> UserName </label>
                               <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
                         </div>
                         <div class="form-group">
                               <label for="cat_title"> FirstName </label>
                               <input type="text" class="form-control" name="firstname" value="<?php echo $firstname ?>">
                         </div>
                         <div class="form-group">
                               <label for="cat_title"> LastName </label>
                               <input type="text" class="form-control" name="lastname" value="<?php echo $lastname ?>">
                         </div>
                         <div class="form-group">
                               <label for="cat_title"> Email </label>
                               <input type="email" class="form-control" name="user_email" value="<?php echo $user_email ?>">
                         </div>
                         <div class="form-group">
                               <label for="cat_title"> Password </label>
                               <input autocomplete="off" type="password" class="form-control" name="password">
                         </div>
                         <div class="form-group">
                            <label for="user_role">User Role</label>
                            <select class="form-control" name="user_role">
                              <?php
                              if ($user_role === 'Admin') {
                                ?>
                                <option value="Admin">Admin</option>
                                <option value="Subscriber">Subscriber</option>
                                <?php
                              }
                              else {
                                ?>
                                <option value="Subscriber">Subscriber</option>
                                <option value="Admin">Admin</option>
                                <?php
                              }
                               ?>
                            </select>
                         </div>
                         <div class="form-group">
                             <input class="btn btn-primary" type="submit" name="update_user" value="Update User">
                         </div>
                   </form>
