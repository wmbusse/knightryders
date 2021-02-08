<?php include("includes/header.php"); if(!$session->is_signed_in()) {redirect("login.php");}?>

        
            <!-- Top Menu Items -->
           <?php include("includes/top_nav.php");?>
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
                  Photos
                            <small>Subheading</small>
                        </h1>
                       <div class="col-md-12">
                            <table class = "table table-hover">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Id</th>
                                        <th>File Name</th>
                                        <th>Title</th>
                                        <th>Size</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $photos = Photo::find_all();
                                foreach($photos as $photo){
                                ?>
                                    <tr>
                                        <td><img src="<?php echo $photo->picture_path();?>"style="width:250px;height:150px" alt=""></td>
                                        <td><?php echo $photo->photo_id;?></td>
                                        <td><?php echo $photo->filename;?></td>
                                        <td><?php echo $photo->title;?></td>
                                        <td><?php echo $photo->size;?></td>
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