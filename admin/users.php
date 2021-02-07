<?php include("includes/header.php"); ?>

        
            <!-- Top Menu Items -->
           <?php include("includes/top_nav.php");?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
           <?php include("includes/side_nav.php"); ?>

            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid" style="background:#ffff99;">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1 class="page-header">
                        Meet The Team
                        </h1>
                        <h4>The Best of All the Rest</h4>
                        <?php 
                     /*   $sql = "SELECT * FROM users where id=1";
                        $result = $database->query($sql);
                        $userfound = mysqli_fetch_array($result);
                        echo '<table class = "table" style = "text-align:center">';
                        echo '<tr style = "border-bottom:2px solid black"><td><h2>User Name</h2></td><td><h2>First Name</h2><td><h2>Last Name</h2><td><h2>Experience</h2></tr>';
                        echo '<tr>';
                        echo '<td>';
                        echo $userfound['username'];
                        echo '</td><td>';
                        echo $userfound['firstname'];
                        echo '</td><td>';
                        echo $userfound['lastname'];
                        echo '</td><td>';
                        echo $userfound['experience'];
                        echo '</td></tr>';
                        $sql = "SELECT * FROM users where id=2";
                        $result = $database->query($sql);
                        $userfound = mysqli_fetch_array($result);
                        echo '<tr>';
                        echo '<td>';
                        echo $userfound['username'];
                        echo '</td><td>';
                        echo $userfound['firstname'];
                        echo '</td><td>';
                        echo $userfound['lastname'];
                        echo '</td><td>';
                        echo $userfound['experience'];
                        echo '</td></tr>';
                        $sql = "SELECT * FROM users where id=3";
                        $result = $database->query($sql);
                        $userfound = mysqli_fetch_array($result);
                        echo '<tr>';
                        echo '<td>';
                        echo $userfound['username'];
                        echo '</td><td>';
                        echo $userfound['firstname'];
                        echo '</td><td>';
                        echo $userfound['lastname'];
                        echo '</td><td>';
                        echo $userfound['experience'];
                        echo '</td></tr></table>';
                        */
                       $users = User::find_all();
                        ?>
                        <table class = "table" style = "text-align:center">
                        <?php
                        foreach($users as $user){
                            echo "<tr><td>".$user->firstname.
                            "<td>".$user->lastname.
                            "</td><td>".$user->experience.
                            "</td><td>".$user->username.
                            "</td><td><textarea style = 'width:200px;height:100px;background:yellow'>".$user->profile.
                            "</textarea></td></tr>";
                        }
                      
                        
                        ?>
                        </table>
                        
                      
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>