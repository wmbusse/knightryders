<?php include("includes/header.php");
if (!$session->is_signed_in()) {
    redirect("login.php");
} ?>
<?php

if(empty($_GET['id'])){
  redirect("photos.php");
}
$the_comment = Comment::find_comment($_GET['id']);
$the_photo = Photo::find_by_id($_GET['id']);
?>

<!-- Top Menu Items -->
<?php include("includes/top_nav.php"); ?>
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<?php include("includes/side_nav.php"); ?>

<!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                   Comments
                    <small>Listing all the comments</small>
                </h1>

                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Author</th>
                                <th>Comment</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($the_comment as $comment) {
                            ?>
                                <tr>
                                <td><img src="<?php echo $the_photo->picture_path(); ?>" class = "admin-thumbnail" alt=""></td>

                                    <td><?php echo $comment->author ;?>
                                    <div class="actions_link">
                                            <a href="delete_photo_comment.php?id=<?php echo $comment->id; ?>">Delete</a>

                                        </div>
                                    </td>
                                    <td><?php echo $comment->body; ?></td>


                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->


    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>
