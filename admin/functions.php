<?php
function die_query($result){
  global $conn;
  if (!$result) {
    die("querry feiled !! ". mysqli_error($conn));
  }
}
function users_online(){

  if (isset($_GET['onlineusers'])) {

        global $conn;
        if (!$conn) {
            session_start();
            include("../includes/db.php");

            $session = session_regenerate_id();
            $time = time();
            $time_out_in_seconds = 30;
            $time_out = $time - $time_out_in_seconds;

            $query = "SELECT * FROM users_online WHERE session = '$session'";
            $send_query = mysqli_query($conn, $query);
            $count = mysqli_num_rows($send_query);
                if ($count == NULL) {
                mysqli_query($conn , "INSERT INTO `users_online`(`session`, `time`) VALUES ('$session','$time')");
                }
                else {
                mysqli_query($conn , "UPDATE users_online SET 'time' = '$time' WHERE SESSION = '$session'");
                }
            $users_online_query = mysqli_query($conn , "SELECT * FROM users_online  WHERE 'time' > '$time_out'");
            echo $count_user = mysqli_num_rows($users_online_query);
        }

  } // GET request isset();
}
users_online();

function Add_Categories(){
 global  $conn;
  if (isset($_POST['submit'])) {
  $Cat = $_POST['cat_title'];
  if (!empty($Cat)) {
  $query = "INSERT INTO categories(cat_title) VALUE('".$Cat."')";
  $add_Cat_Query = mysqli_query($conn,$query);
  echo "<h5 style='color:green'>Added successfully!</h5>";
      if (!$add_Cat_Query) {
          die("Querry Failed !!" . mysqli_error($conn));
      }
  }
  else {
  echo "<h5 style='color:red'>Merci D'entre La Category!!</h5>";
  }
  }
}



function ReadAllCategories(){
  global $conn;
  $query = "select * from categories";
  $All_categories = mysqli_query($conn,$query);
  while ($row = mysqli_fetch_assoc($All_categories))
  {
  $Id_Cat = $row['cat_id'];
  $cattegory = $row['cat_title'];
   ?>
      <tr>
        <th><?php echo $Id_Cat ?></th>
        <td><?php echo $cattegory ?></th>
        <td><a href="categories.php?Edit=<?php echo $Id_Cat ?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
        <td>
          <a onClick="javascript: return confirm('Are You Sure You Want To Delete This Category ?!');" href="categories.php?delete=<?php echo $Id_Cat ?>">
            <i class="glyphicon glyphicon-trash"></i>
          </a>
        </td>
      </tr>
   <?php
  }
}

function DeleteCategories(){
  global $conn;
  if (isset($_GET['delete'])) {
    if (isset($_SESSION['user_role'])) {
      if ($_SESSION['user_role'] === "Admin") {
      $The_Id_cat = $_GET['delete'];
      $query = "DELETE FROM categories WHERE cat_id='".$The_Id_cat."'";
      $delete_Cat_Query = mysqli_query($conn,$query);
      header("Location: categories.php");
        if (!$delete_Cat_Query) {
            die("Querry Failed !!" . mysqli_error($conn));
        }}}
  }
}

function UpdateCategories(){
  global $conn;
  if (isset($_GET['Edit'])) {
            $The_Id_cat = $_GET['Edit'];
          include 'includes/Update_category.php';
  }
}

?>
