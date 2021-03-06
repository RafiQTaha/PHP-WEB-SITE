


              <h1 class="page-header">
                  All Users
                  <small>Author</small>
              </h1>
<div class="table-responsive">
  <?php include'exportbtn.php' ?>
  <br><br>
<table class="table table-hover table-bordered" id="table">
  <thead>
    <tr>
          <th>#</th>
          <th>Username</th>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email</th>
          <th >Image</th>
          <th>Role</th>
          <th>Changing Role</th>
          <th>Edit</th>
          <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query = "select * from users";
    $All_comment = mysqli_query($conn,$query);
    while ($row = mysqli_fetch_assoc($All_comment))
    {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $password = $row['password'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
        $randsalt = $row['randsalt'];
     ?>
     <tr>
          <th><?php echo $user_id ?></th>
          <td><?php echo $username ?></td>
          <td><?php echo $firstname ?></td>
          <td><?php echo $lastname ?></td>
          <td><?php echo $user_email ?></td>
          <td ><img width="100" src="../images/<?php echo $user_image ?> " alt="Image"></td>
          <td><?php echo $user_role ?></td>
          <td>
            <a onClick="javascript: return confirm('Are You Sure You Want To Change This Role ?!')" href="users.php?admin=<?php echo $user_id ?>">Admin</a>

            <a onClick="javascript: return confirm('Are You Sure You Want To Change This Role ?!')" href="users.php?subscriber=<?php echo $user_id ?>">Subscriber</a>
          </td>
          <td><a href="users.php?source=edit_user&u_id=<?php echo $user_id ?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
          <td><a onClick="javascript: return confirm('Are You Sure You Want To Delete This User ?!');"  href="users.php?delete=<?php echo $user_id ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
<?php
if (isset($_GET['admin'])) {
    $user_id = $_GET['admin'];
    $query = "UPDATE users SET user_role='Admin' WHERE user_id={$user_id}";
    $admin_users_Query = mysqli_query($conn,$query);
      die_query($admin_users_Query);
      header("Location: users.php");
}

if (isset($_GET['subscriber'])) {
    $user_id = $_GET['subscriber'];
    $query = "UPDATE users SET user_role='Subscriber' WHERE user_id={$user_id}";
    $subscriber_users_Query = mysqli_query($conn,$query);
      die_query($subscriber_users_Query);
        if ($_SESSION['user_id'] == $user_id) {
          $_SESSION['user_role'] = 'subscriber';
          header("Location: ../index.php");
        }
        else {
      header("Location: users.php");
        }
}

if (isset($_GET['delete'])) {
  if (isset($_SESSION['user_role'])) {
    if ($_SESSION['user_role'] === "Admin") {
    $user_id = mysqli_real_escape_string($conn,$_GET['delete']);
    $query = "DELETE FROM users WHERE user_id='".$user_id."'";
    $delete_user_Query = mysqli_query($conn,$query);
      die_query($delete_user_Query);
    $query = "DELETE FROM comments WHERE Comment_post_id IN (SELECT post_id FROM posts WHERE post_user='".$user_id."')";
    $delete_comment_Query = mysqli_query($conn,$query);
    header("Location: posts.php?source=all_post");
      die_query($delete_comment_Query);
    $query = "DELETE FROM posts WHERE post_user='".$user_id."'";
    $delete_post_Query = mysqli_query($conn,$query);
      die_query($delete_post_Query);
      $query = "SELECT * FROM posts WHERE post_user='".$user_id."' ";
      header("Location: users.php");
    }
  }
}
 ?>
