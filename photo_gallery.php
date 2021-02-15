<?php require_once("includes/init.php");?>
<?php include("includes/header.php"); 

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 4;
$items_total_count = Photo::count_all();

$paginate = new Paginate($page,$items_per_page,$items_total_count);

$sql  = "SELECT*FROM photos ";
$sql .= "LIMIT {$items_per_page} ";
$sql .= "OFFSET {$paginate->offset()}";
$photos = Photo::find_by_query($sql);

?>


<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">
    <div class="thumbnails row">
<?php  foreach($photos as $photo): ?>

    <div class="col-xs-6 col-md-3">

    <a href="photo.php?id=<?php echo $photo->id;?> " class="thumbnail">
     <img src="admin/<?php echo $photo->picture_path();?>" alt="">
</a>
    </div>



<?php endforeach; ?>
    </div>
   <ul class="pager">
        <?php 
        if($paginate->pageTotal()>1){
            if($paginate->hasNext()){
                echo "<li class='next'><a href='photo_gallery.php?page={$paginate->next()}'>Next</a></li>";
            }
            if($paginate->hasPrevious()){
                echo "<li class='previous'><a href='photo_gallery.php?page={$paginate->previous()}'>Previous</a></li>";
            }
        }


       ?>
        
   </ul>
    </div>




    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">


        <?php include("includes/sidebar.php"); ?>



    </div>
    <!-- /.row -->

    <?php include("includes/footer.php"); ?>
