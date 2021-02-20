<?php include("includes/header.php");
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 6;
$items_total_count = Photo::count_all();

$paginate = new Paginate($page,$items_per_page,$items_total_count);

$sql  = "SELECT*FROM photos ";
$sql .= "LIMIT {$items_per_page} ";
$sql .= "OFFSET {$paginate->offset()}";
$photos = Photo::find_by_query($sql);?>



        <section class="jumbotron text-center">
                <div class="container-fluid">
                    <h1 class="jumbotron-heading">Our Photo Album</h1>
                    <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
                  
                </div>
            </section>
            <div class="album py-5 bg-light">
                <div class="container">
                    <div class="row">
<?php foreach($photos as $photo):?>
        <div class="col-md-4">
             <div class="card mb-4 box-shadow">
               <img class=" admin-thumbnail" style="width:300px; height:250px;" src="admin/<?php echo  $photo->picture_path();?>"/>
                    <div class="card-body">
                       <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group " style="margin-bottom:20px">
                            <a href="photo.php?id=<?php echo $photo->id;?> "class="btn btn-sm btn-outline-secondary">View</a>
                               
                            </div>
                        
                    </div>
                 </div>
             </div>
        </div>
        <?php endforeach;?>
</div>
<ul class="pagination">
        <?php 
        if($paginate->pageTotal()>1){
            if($paginate->hasNext()){
                echo "<li class='next'><a href='gallery.php?page={$paginate->next()}'>Next</a></li>";

                for($i=1; $i <= $paginate->pageTotal(); $i++) {

                    if($i == $paginate->current_page) {

                        echo "<li class='active'><a href='gallery.php?page={$i}'>{$i}</a></li>";
                    }else{
                        echo "<li><a href='gallery.php?page={$i}'>{$i}</a></li>";
                    }
                }



            }
            if($paginate->hasPrevious()){
                echo "<li class='previous'><a href='gallery.php?page={$paginate->previous()}'>Previous</a></li>";
            }
        }


       ?>
</div>

<?php include('includes/footer.php');?>