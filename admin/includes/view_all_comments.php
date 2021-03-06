


              <h1 class="page-header">
                  All Comments
                  <small>Author</small>
              </h1>
<div class="table-responsive">
    <table class="table table-hover table-bordered" id="table">
      <thead>
        <tr>
              <th>#</th>
              <th>Author</th>
              <th>Comment</th>
              <th>Email</th>
              <th>Status</th>
              <th>In Response to</th>
              <th>Date</th>
              <th>Approve</th>
              <th>unapprove</th>
              <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "select * from comments";
        $All_comment = mysqli_query($conn,$query);
        while ($row = mysqli_fetch_assoc($All_comment))
        {
            $comment_id = $row['Comment_id'];
            $comment_post_id = $row['Comment_post_id'];
            $comment_author = $row['Comment_author'];
            $comment_email = $row['comment_email'];
            $comment_content = $row['Comment_content'];
            $comment_status = $row['Comment_status'];
            $comment_date = $row['Comment_date'];
         ?>
              <th><?php echo $comment_id ?></th>
              <td><?php echo $comment_author ?></td>
              <td><?php echo $comment_content ?></td>
              <td><?php echo $comment_email ?></td>
              <td ><?php echo $comment_status ?></td>
              <?php
              $query = "select * from posts WHERE post_id={$comment_post_id}";
              $comment_title = mysqli_query($conn,$query);
              while ($row = mysqli_fetch_assoc($comment_title))
              {
                  $post_id = $row['post_id'];
                  $post_title = $row['post_title'];
              }
               ?>
              <td><a href="../post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a></td>
              <td width=100px><?php echo $comment_date ?></td>
              <td><a href="comments.php?approve=<?php echo $comment_id ?>">Approve</a></td>
              <td><a href="comments.php?unapprove=<?php echo $comment_id ?>">unapprove</a></td>
              <td><a onClick="javascript: return confirm('Are You Sure You Want To Delete This Comment ?!');" href="comments.php?delete=<?php echo $comment_id ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
</div>
<?php include 'exportbtn.php' ?>
<?php
if (isset($_GET['approve'])) {
    $comment_id = $_GET['approve'];
    $query = "UPDATE comments SET Comment_status='Approved' WHERE Comment_id={$comment_id}";
    $approve_comment_Query = mysqli_query($conn,$query);
    header("Location: comments.php");
      die_query($approve_comment_Query);
}

if (isset($_GET['unapprove'])) {
    $comment_id = $_GET['unapprove'];
    $query = "UPDATE comments SET Comment_status='Unapproved' WHERE Comment_id={$comment_id}";
    $unapprove_comment_Query = mysqli_query($conn,$query);
    header("Location: comments.php");
      die_query($unapprove_comment_Query);
}


if (isset($_GET['delete'])) {
  if (isset($_SESSION['user_role'])) {
    if ($_SESSION['user_role'] === "Admin") {
    $comment_id = mysqli_real_escape_string($conn,$_GET['delete']);
    $query = "DELETE FROM comments WHERE Comment_id='".$comment_id."'";
    $delete_comment_Query = mysqli_query($conn,$query);
    header("Location: comments.php");
      die_query($delete_comment_Query);
      }
    }
  }

 ?>
