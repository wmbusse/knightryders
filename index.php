<?php include("includes/header.php"); ?>


        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

    <?php 
   $user= new User();
   $found_user = $user->find_user_by_id(2);
    echo $user->username;
    ?>
          
         

            </div>




            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

            
                 <?php include("includes/sidebar.php"); ?>



        </div>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
