  <!-- Page Heading -->
  <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Admin
                            <small>The Future is Here and Now </small>
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

                       
                       

                        # test find all user method

                      
                            
                        $result_set = User::find_all_users();

                        while($row = mysqli_fetch_array($result_set)){
                            echo 'User found  <br />';
                            echo $row['username']. "<br />";
                        }
                        ?>
                        <h3>Find user by id</h3>
                        <?php 

                        $founduser = User::find_user_by_id(2);
                        $user = User::instantiation($founduser);
                        
                        echo $user->username;

                        */
                       ?>
                       <h2>All Users</h2>
                       <?php 

                        $users= User::find_all_users();
                        foreach($users as $user){
                            echo $user->id."&nbsp;".$user->username. "&nbsp;".$user->lastname."<br />";
                          
                        }
                    ?>
                    <h3>Find user by id </h3>
                    <?php 
                    $found_user = User::find_user_by_id(2);
                    echo $found_user->firstname.'&nbsp;'.$found_user->lastname;
                            
                          

                        ?>
                       
                       
                        <?php 
                        
                        ?>
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