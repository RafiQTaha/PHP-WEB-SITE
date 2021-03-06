<?php include 'db.php'; ?>
<?php session_start(); ?>
<?php
if (isset($_POST['login'])) {
  $pusername=$_POST['username'];
  $ppassword=$_POST['password'];

  $pusername = mysqli_real_escape_string($conn,$pusername);
  $ppassword = mysqli_real_escape_string($conn,$ppassword);
 
  $query = "SELECT * FROM users where username='{$pusername}'";
  $select_user_query= mysqli_query($conn, $query);
  if (!$select_user_query) {
    die("Query Failed" . mysqli_error($conn));
  }
  while ($row = mysqli_fetch_assoc($select_user_query)) {
     $user_id = $row['user_id'];
     $username = $row['username'];
     $password = $row['password'];
     $firstname = $row['firstname'];
     $lastname = $row['lastname'];
     $user_email = $row['user_email'];
     $user_image = $row['user_image'];
     $user_role = $row['user_role'];
  }

    if (password_verify($ppassword , $password)) {

            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['user_role'] = $user_role;
            $_SESSION['user_image'] = $user_image;
            $_SESSION['user_email'] = $user_email;
            header("Location: ../index.php");
    }
    else {
      header("Location: ../index.php");
    }
  }
?>
