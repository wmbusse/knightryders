<?php include("includes/header.php"); 
if(!$session->is_signed_in()) {redirect("login.php");}?>
        
            <!-- Top Menu Items -->
           <?php include("includes/top_nav.php");?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
           <?php include("includes/side_nav.php"); ?>

            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

              <?php include("includes/admin_content.php"); ?>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>