<?php
require_once("includes/init.php");
if (!$session->is_signed_in()) {
    redirect("login.php");
}
?>



 <?php

    if (empty($_GET['id'])) {
        redirect("events.php");
    }

    $event = Event::find_by_id($_GET['id']);

    if ($event) {
        $event->delete_user();
        redirect("events.php");
    } else {
        redirect("events.php");
    }

    ?>
              


              