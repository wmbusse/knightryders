<?php include("includes/header.php");
$users = User::find_all();
$events = Event::find_all();
$number_of_users = count($users);
$number_of_events = count($events);
?>




        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
         <div style = "background-color:black; color:white; height:100px;width:100px; text-align:center;" class = "img-circle col-md-5"> <h2 style="color:red;"> <?php echo $number_of_users;?> </h2>
 </div>  
 <h3>users</h3>
           <h2>The number of events  is : <?php echo $number_of_events;?> </h2> 

            </div>




            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">


                 <?php include("includes/sidebar.php"); ?>



        </div>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
