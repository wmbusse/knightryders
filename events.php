<?php include("includes/header.php"); ?>
<?php


$events = Event::find_all();



?>

<div class="col-md-9">
    <table class="table">
        <thead>
            <tr>
            <th></th>
                <th>Event Name</th>
                <th>Event Date</th>
                <th>Event Location</th>
               
                <th>Event type</th>
               
            </tr>
        </thead>


        <tbody>
            <?php

            foreach ($events as $event) { ?>
                <tr>
                <td> <img src="<?php echo 'admin/' . $event->image_path_and_placeholder(); ?>" alt="" class="img-circle" style="height:100px;width:100px"></td>
                    <td><a href="view_member.php"><?php echo $event->event_name; ?></a></td>
                    <td><?php echo $event->event_date; ?></td>
                    <td><?php echo $event->event_location; ?></td>
                    
                    <td><?php echo $event->event_type; ?></td>

                </tr>


            <?php  }  ?>
        </tbody>
    </table>

</div>
<div class="col-md-3">
    <?php include("includes/sidebar.php"); ?>
</div>


</body>
<?php include("includes/footer.php"); ?>

</html>