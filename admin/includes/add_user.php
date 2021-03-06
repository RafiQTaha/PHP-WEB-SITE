
                      <h1 class="page-header">
                          Add User
                          <small>Author</small>
                      </h1>

         <?php
                  if (isset($_POST['create_user'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $password = password_hash($password, PASSWORD_DEFAULT, array('cost' => 10));
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $user_email = $_POST['user_email'];
                    $user_role = $_POST['user_role'];

                    $user_image = $_FILES['user_image']['name'];
                    $user_image_temp = $_FILES['user_image']['tmp_name'];
                    move_uploaded_file($user_image_temp, "../images/$user_image");

                    $query = "INSERT INTO `users`(`username`, `password`, `firstname`, `lastname`, `user_email`, `user_image`, `user_role`) ";
                    $query .= "VALUES ('{$username}','{$password}','{$firstname}','{$lastname}','{$user_email}','{$user_image}','{$user_role}')";
                    $add_user_query = mysqli_query($conn , $query);
                    die_query($add_user_query);
                    $u_id = mysqli_insert_id($conn);
                    echo "<h4 class='bg-success'>User Updated: <a href='./users.php?source=edit_user&u_id={$u_id}'>View User</a> Or <a href='../users.php'>View all Users</a></h4>";
                    }

          ?>


            <form class="form" action="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                        <label for="cat_title"> UserName </label>
                        <input type="text" class="form-control" name="username">
                  </div>
                  <div class="form-group">
                        <label for="cat_title"> FirstName </label>
                        <input type="text" class="form-control" name="firstname">
                  </div>
                  <div class="form-group">
                        <label for="cat_title"> LastName </label>
                        <input type="text" class="form-control" name="lastname">
                  </div>
                  <div class="form-group">
                        <label for="cat_title"> Email </label>
                        <input type="email" class="form-control" name="user_email">
                  </div>
                  <div class="form-group">
                        <label for="password"> Password </label>
                        <input type="password" class="form-control" name="password">
                  </div>
                  <div class="form-group">
                     <label for="user_role"></label>
                     <select class="form-control" name="user_role" required>
                       <option value="option" selected disabled>Select Role</option>
                       <option value="Subscriber">Subscriber</option>
                       <option value="Admin">Admin</option>
                     </select>
                  </div>
                  <div class="form-group">
                        <label for="user_image"> User Image </label>
                        <input type="file" name="user_image">
                  </div>
                  <div class="form-group">
                      <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
                  </div>
            </form>
