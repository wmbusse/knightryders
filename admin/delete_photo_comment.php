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
        redirect("comment_photo.php?id={$the_photo->$photo_id}");
    } else {
        redirect("comment_photo.php?id={$comment->$photo_id}");
    }

    ?>
