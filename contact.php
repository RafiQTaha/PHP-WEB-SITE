<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php
        // the message
        $msg = "First line of text\nSecond line of text";
        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);
        // send email


        if (isset($_POST['submit'])) {
            $to = "taharafik89@gmail.com";
            $email = $_POST['email'];
            $subject =wordwrap($_POST['subject'],70);
            $body = $_POST['body'];
            mail($to,$subject,$body,$email);
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
                <h1>Contact</h1>
                    <form role="form" action="contact.php" method="post" >
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Somebody@example.com">
                        </div>
                        <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Your Subject">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="body" rows="10" cols="50" id='body'></textarea>
                        </div>
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Send">
                    </form>

                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
