<?php
require_once("includes/init.php");
if (!$session->is_signed_in()) {
    redirect("login.php");
}
?>



 <?php

    if (empty($_GET['id'])) {
        redirect("comment.php");
    }

    $comment = Comment::find_by_id($_GET['id']);

    if ($comment) {
        $comment->delete();
        redirect("comment.php");
    } else {
        redirect("comment.php");
    }

    ?>
              


              