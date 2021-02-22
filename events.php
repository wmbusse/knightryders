<?php include("includes/header.php"); ?>
<?php


$events = Event::find_all();



?>
<div class="row"><h1 class="events">Current Events</h1></div>
<div class= "col-md-2"></div>

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
                $status = $event->status;
                
           if($status ==='Current'||  $status==="Registration Open" || $status==="Event Completed"){?>
            <tr>
                <td> <img src="<?php echo 'admin/' . $event->image_path_and_placeholder(); ?>" alt="" class="img-circle" style="height:100px;width:100px"></td>
                    <td><?php echo $event->event_name; ?></td>
                    <td><?php echo $event->event_date; ?></td>
                    <td><?php echo $event->event_location; ?></td>
                    <td><?php echo $status;?></td>                      
                    <td><?php echo $event->event_type; ?></td>
                    <td><a href = "<?php echo $event->Website;?>"><?php echo $event->event_name;?></a></td>

                </tr>

         
                

            <?php  }} ?>
        </tbody>
    </table>

</div>
<div class="col-md-2"></div>


<?php include("includes/footer.php"); ?>
