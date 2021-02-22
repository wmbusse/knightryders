<?php include("includes/header.php"); ?>
<?php
if (!$session->is_signed_in()) {
    redirect("login.php");
}


$events = Event::find_all();



?>
<!-- Top Menu Items -->
<?php include("includes/top_nav.php"); ?>
<!-- Side Nav Items -->
<?php include("includes/side_nav.php"); ?>
</nav>
<div id='page-wrapper'>
    <div class='container-fluid'>
        <div class="row">
            <h1 class="events">All Events</h1>
            <a href="add_event.php" class="btn btn-primary">Add Event</a>
        </div>
        <div class="col-md-2"></div>

        <div class="col-md-9">
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Event Name</th>
                        <th>Event Date</th>
                        <th>Event Location</th>
                        <th>Event Status</th>
                        <th>Event type</th>
                        <th>Website</th>

                    </tr>
                </thead>


                <tbody>
                    <?php

                    foreach ($events as $event) {
                        $status = $event->status; ?>
                        <tr>
                            <td> <img src="<?php echo  $event->image_path_and_placeholder(); ?>" alt="" class="img-circle" style="height:100px;width:100px"></td>
                            <td><?php echo $event->event_name; ?></td>
                            <td><?php echo $event->event_date; ?></td>
                            <td><?php echo $event->event_location; ?></td>
                            <td><?php echo $status; ?></td>
                            <td><?php echo $event->event_type; ?></td>
                            <td><a href="<?php echo $event->Website; ?>" style="color:whitesmoke"><?php echo $event->event_name; ?></a></td>
                            <td><a href="events.php" class="btn btn-danger">Delete Event</a></td>
                            <td><a href="events.php" class="btn btn-primary">Update Event</a></td>


                        </tr>




                    <?php  } ?>
                </tbody>
            </table>

        </div>
        <div class="col-md-2"></div>

    </div>
</div>

</body>
<?php include("includes/footer.php"); ?>

</html>