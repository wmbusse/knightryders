<?php
require("includes/init.php");

if(empty($_GET['id'])){
    redirect("index.php");
}

$photo = Photo::find_by_id($_GET['id']);


if(isset($_POST['submit'])){

    $author=($_POST['author']);
    $body=($_POST['body']);

$new_comments = Comment::create_comment($photo->id, $author, $body);
if($new_comments){
    $new_comments->save();
    redirect("photo.php?id={$photo->id}");
}else{
    $message = "There was some problem saving";
    echo $message;
}
}else{
    $author ="";
     $body = "" ;
}
$comments = Comment::find_comment($photo->id);


?>

<!DOCTYPE html>
<html lang="en">

<?php include("includes/header.php");?>

<body>

    <!-- Navigation -->
   <?php include("includes/header.php");?>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $photo->title;?></h1>

                <!-- Author -->
                
                <hr>

                <!-- Date/Time -->
               

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="<?php echo "admin/".$photo->picture_path(); ?>" style="object-fit:cover;object-position:center;" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $photo->caption;?></p>
                <p><?php echo $photo->description;?></p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" enctype="multipart/form-data" method="POST">
                    <div class="form-group" >
                            <label for="author">Author</label>
                            <input class="form-control"  type="text" name="author">
                        </div>
                        <div class="form-group">
                            <textarea name="body" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name = "submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php
                foreach($comments as $comment):?>


                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment->author;?>
                            <small></small>
                        </h4>
                       <?php echo $comment->body;?>
                    </div>
                </div>
<?php endforeach;?>


            </div>


        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
           <?php include("includes/footer.php");?>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
