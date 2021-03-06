<?php include 'db.php'; ?>
<?php session_start(); ?>
<?php

            $_SESSION['username'] = "";
            $_SESSION['firstname'] = "";
            $_SESSION['lastname'] = "";
            $_SESSION['user_role'] = "";
            $session = session_regenerate_id();
            $query = "DELETE FROM users_online WHERE session =  '$session'";
            $delete_online_users = mysqli_query($conn , $query);
        header("Location: ../index.php");
        // $query = "DELETE FROM posts WHERE post_id={$checkValueId}";
        // $delete_Query = mysqli_query($conn,$query);
?>
