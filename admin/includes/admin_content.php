  <!-- Page Heading -->
  <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Admin
                            <small>Subheading</small>
                        </h1>
                        <?php 

                     /*

                     check database connection

                        if($database->connection){

                            echo "true";
                        }
                        
                        */

                        /* 
                        
                        test query method
                        */
                        /*
                        $sql = "SELECT * FROM users where id=1";
                        $result = $database->query($sql);
                        $userfound = mysqli_fetch_array($result);
                        echo '<table class = "table">';
                        echo '<tr>';
                        echo '<td>';
                        echo $userfound['username'];
                        echo '</td><td>';
                        echo $userfound['firstname'];
                        echo '</td><td>';
                        echo $userfound['lastname'];
                        echo '</td></tr></table>';
                        $sql = "SELECT * FROM users where id=2";
                        $result = $database->query($sql);
                        $userfound = mysqli_fetch_array($result);
                        echo '<table class = "table">';
                        echo '<tr>';
                        echo '<td>';
                        echo $userfound['username'];
                        echo '</td><td>';
                        echo $userfound['firstname'];
                        echo '</td><td>';
                        echo $userfound['lastname'];
                        echo '</td></tr></table>';
                        $sql = "SELECT * FROM users where id=1";
                        $result = $database->query($sql);
                        $userfound = mysqli_fetch_array($result);
                        echo '<table class = "table">';
                        echo '<tr>';
                        echo '<td>';
                        echo $userfound['username'];
                        echo '</td><td>';
                        echo $userfound['firstname'];
                        echo '</td><td>';
                        echo $userfound['lastname'];
                        echo '</td></tr></table>';

                       
                        */

                        # test find all user method

                        $user = new User();

                        $result_set = $user->find_all_users();

                        while($row = mysqli_fetch_array($result_set)){
                            echo 'User found  <br />';
                            echo $row['username']. "<br />";
                        }
                        ?>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->