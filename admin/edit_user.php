<?php include("includes/header.php");
if (!$session->is_signed_in()) {
    redirect("login.php");
}
if(empty($_GET['id'])){
    redirect("users.php");
}
    $edited_user = User::find_by_id($_GET['id']);

    if (isset($_POST['update'])) {
    
        if ($edited_user) {
            $edited_user->username        = $_POST['username'];
            $edited_user->firstname       = $_POST['firstname'];
            $edited_user->lastname        = $_POST['lastname'];
            $edited_user->password        = $_POST['password'];
            $edited_user->experience      = $_POST['experience'];
            $edited_user->profile         = $_POST['profile'];
            if(empty($_FILES['user_image'])){
                $edited_user->save();
            }else{
                $edited_user->set_file($_FILES['user_image']);
                $edited_user->upload_photo();
                $edited_user->save();
                redirect("edit_user.php?id={$edited_user->id}");
            }
        
            
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
                    Add User
                    <small>Subheading</small>
                </h1>
                <div class="col-md-3">
                <img src="<?php echo $edited_user->image_path_and_placeholder();?>" alt="" class=" admin-thumbnail img-responsive">
                <div class="form-group">
                            <label for="profile" style="margin-top:20px">Profile</label>
                            <span class="form-control" name="profile" cols="30" rows="10" ><?php echo $edited_user->profile;?></span>
                        </div>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <input type="file" name="user_image" />
                        </div>
                        <div class="form-group">
                            <label for="username">User Name</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $edited_user->username;?>">
                        </div>

                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" name="firstname" class="form-control" value="<?php echo $edited_user->firstname;?>">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" class="form-control" value="<?php echo $edited_user->lastname;?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $edited_user->password;?>">
                        </div>
                        <div class="form-group">
                            <label for="experience">Experience</label>
                            <select name="experience" class="form-control">
                                <option>Beginner</option>
                                <option>Intermediate</option>
                                <option>Advanced </option>
                                <option>Professional</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="profile">Profile</label>
                            <textarea class="form-control" name="profile" cols="30" rows="10"><?php echo $edited_user->profile;?></textarea>
                        </div>
                        <div class="form-group">
                        <a href ="../admin/delete_user.php?id=<?php echo $edited_user->id;?>"class = "btn btn-danger">Delete</a>
                            <input type="submit" name="update" class="btn btn-primary pull-right" value="Update">
                        </div>
                </form>
            </div>

        </div>


    </div>
</div>

<?php include("includes/footer.php"); ?>