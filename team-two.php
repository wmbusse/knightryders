<?php include("includes/header.php"); ?>
<?php


$users = User::find_all();
$events = Event::find_all();




?>  
<section id="content-3-4" class="content-block content-3-4">
            <div class="container">
            <h1 style="font-size:72px;text-align:center;margin-bottom:50px;font-family: 'Rock Salt', cursive;">Meet Our Team</h1>
            <?php foreach($users as $user):?>
                <div class="row">
                    <div class="col-md-7">
                        <img class="img-responsive" src="<?php echo 'admin/'.$user->image_path_and_placeholder(); ?>" style="height:50%;width:50%;">
                        <h2><?php echo $user->firstname . " " . $user->lastname;?></h2>
                        <p>Magnis modipsae que lib voloratati andigen daepedor quiate ut reporemni aut labor. Laceaque quiae sitiorem ut restibusaes es tumquam core posae volor remped modis volor. Doloreiur qui commolu ptatemp dolupta orem retibusam emnis et consent accullignis lomnus.</p>
                    </div>
                    <div class="col-md-4 col-md-offset-1">
                        <div class="panel-group">
                           
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#content2"><span>Recent Events</span></a></h4>
                                </div>
                                <!-- /.panel-heading -->
                                <div id="content2" class="panel">
                                    <div class="panel-body">
                                        <ul>
                                        <?php foreach($events as $event):?>
                                            <li><?php echo $event->event_name;?></li>
                                            <?php endforeach;?>
                                        </ul>
                                    </div>
                                    <!-- /.panel-body -->
                                </div>
                                <!-- /.content -->
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a class="panel-toggle collapsed" data-toggle="collapse" data-parent=".panel-group" href="#content3"><span>Contact Details</span></a></h4>
                                </div>
                                <!-- /.panel-heading -->
                                <div id="content3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <h4>DM Images</h4>
                                        <p>123 Anywhere Street,<br> London,<br> LO4 6ON</p>
                                        <img class="img-responsive" src="images/seagulls.jpg">
                                    </div>
                                    <!-- /.panel-body -->
                                </div>
                                <!-- /.content -->
                            </div>
                        </div>
                        <!-- /.accordion -->
                    </div>
                    <!-- /.column -->
                </div>
                <div style = "background:skyblue;height:20px;margin-top:10px; margin-bottom:50px;"></div>
                <?php endforeach;?>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <?php include('includes/footer.php');?>