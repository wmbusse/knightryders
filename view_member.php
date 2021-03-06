
<?php include("includes/header.php");?>
<?php


if (empty($_GET['id'])) {
    redirect("index.php");
}

$user = User::find_by_id($_GET['id']);

if(isset($_POST['submit'])){
 
    $author=($_POST['author']);
    $body=($_POST['body']);

$new_comments = Comment::create_comment($user->id, $author, $body);
if($new_comments){
    $new_comments->save();
    redirect("view_member.php?id={$user->id}");
}else{
    $message = "There was some problem saving";
    echo $message;
}
}else{
    $author ="";
     $body = "" ;
}

$comments = Comment::find_comment($user->id);




?>



    <!-- Navigation -->
   <?php include('includes/navigation.php');?>
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    
    

        <div class="row">
        <div class = "content">
        <section>

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- User -->
                <h1>About<?php echo $user->username;?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $user->firstname . " " .$user->lastname;?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="<?php echo "admin/" . $user->picture_path(); ?>" style="height:300px;width:900px" alt="">

                <hr>

                <!-- Post Content -->
           <span class="lead"><?php echo $user->profile;?></span>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input class="form-control" type="text" name="author">
                        </div>
                        <div class="form-group">
                            <textarea name="body" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php
                
                foreach ($comments as $comment) : ?>


                    <div class="media">
                      
                        <div class="media-body">
                            <h4 class="media-heading">Posted By : <?php echo $comment->author; ?>
                                <small></small>
                            </h4>
                            <?php echo $comment->body; ?>
                        </div>
                    </div>
                <?php endforeach; ?>


            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3 pull-right">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-3 text-center">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 text-center">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>
            </section>
        </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

  
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>