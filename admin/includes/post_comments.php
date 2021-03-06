


              <h1 class="page-header">
                  Post Comments
                  <small><?php echo $_SESSION['firstname'] ?></small>
              </h1>
<table class="table table-hover table-bordered" id="table">
  <div class="col-xs-4" style="padding:0">
    <a class="btn btn-primary" href="posts.php">View All Posts</a>
    <a class="btn btn-primary" href="comments.php">View All Comments</a>
      <?php include'exportbtn.php' ?>
  </div>
  <br><br>
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
          <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM comments WHERE Comment_post_id={$id}";
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
          <td><a href="comments.php?approve=<?php echo $comment_id ?>&source=post_comments&id=<?php echo $id ?>">Approve</a></td>
          <td><a href="comments.php?unapprove=<?php echo $comment_id ?>&source=post_comments&id=<?php echo $id ?>">unapprove</a></td>
          <td><a onclick="confirm('Are You Shure You Want To Delete This Comment ?!')" href="comments.php?delete=<?php echo $comment_id ?>&source=post_comments&id=<?php echo $id ?>">Delete</a></td>
    </tr>
    <?php }} ?>
  </tbody>
</table>
<?php
if (isset($_GET['approve'])) {
    $comment_id = $_GET['approve'];
    $query = "UPDATE comments SET Comment_status='Approved' WHERE Comment_id={$comment_id}";
    $approve_comment_Query = mysqli_query($conn,$query);
    header("Location: comments.php?source=post_comments&id={$id}");
      die_query($approve_comment_Query);
}

if (isset($_GET['unapprove'])) {
    $comment_id = $_GET['unapprove'];
    $query = "UPDATE comments SET Comment_status='Unapproved' WHERE Comment_id={$comment_id}";
    $unapprove_comment_Query = mysqli_query($conn,$query);
    header("Location: comments.php?source=post_comments&id={$id}");
      die_query($unapprove_comment_Query);
}


if (isset($_GET['delete'])) {
    $comment_id = $_GET['delete'];
    $query = "DELETE FROM comments WHERE Comment_id='".$comment_id."'";
    $delete_comment_Query = mysqli_query($conn,$query);
    header("Location: comments.php?source=post_comments&id={$id}");
      die_query($delete_comment_Query);
    }

 ?>
