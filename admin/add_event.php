<?php include("includes/header.php");



$event = new Event();
if (isset($_POST['create'])) {



    if ($event) {
        $event->event_name = $_POST['eventname'];
        $event->event_location = $_POST['eventlocation'];
        $event->event_date = $_POST['eventdate'];
        $event->event_type = $_POST['eventtype'];
        $event->event_description = $_POST['eventdescription'];
        $event->status = $_POST['status'];
        $event->Website = $_POST['Website'];
        $event->set_file($_FILES['event_image']);
        $event->save();
        $event->upload_photo();
       // redirect("../admin/add_event.php");
    }
}


?>


<!-- Top Menu Items -->
<?php include("includes/top_nav.php"); ?>
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
                    Add Event
                    
                </h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <input type="file" name="event_image" />
                        </div>
                        <div class="form-group">
                            <label for="eventname">Event Name</label>
                            <input type="text" name="eventname" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="eventlocation">Location</label>
                            <input type="text" name="eventlocation" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="eventdate">Event Date</label>
                            <input type="date" name="eventdate" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Website">Website</label>
                            <input type="url" name="Website" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="eventtype">Type of Event</label>
                            <select name="eventtype" class="form-control">
                                <option>Running</option>
                                <option>Cycling</option>
                                <option>Stair Climb</option>
                                <option>Training</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Event Status</label>
                            <select name="status" class="form-control">
                                <option>Current </option>
                                <option>Registration Open</option>
                                <option>Event Completed</option>
                                <option>Scheduled</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="eventdescription">Description</label>
                            <textarea name="eventdescription" class="form-control" cols="30" rows="10">

                            </textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="create" class="btn btn-primary pull-right">
                        </div>
                </form>
            </div>

        </div>


    </div>
</div>

<?php include("includes/footer.php"); ?>