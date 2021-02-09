<?php include("includes/header.php");
if (!$session->is_signed_in()) {
    redirect("login.php");
}


    $user = new User();
    if(isset($_POST['create'])){


    
        if($user){
            $user->username        =$_POST['username'];
            $user->firstname       =$_POST['firstname'];
            $user->lastname        =$_POST['lastname'];
            $user->password        =$_POST['password'];
            $user->experience      =$_POST['experience'];
            $user->profile         =$_POST['profile'];
            $user->set_file($_FILES['user_image']);
            $user->save_user_and_image();
            redirect("../admin/users.php");
        
     
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
                  <form action="" method="POST" enctype="multipart/form-data">
                      <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                          <input type="file" name="user_image" />
                        </div>
                         <div class="form-group">
                          <label for="username">User Name</label>
                          <input type="text" name="username" class="form-control" >
                         </div>
                         
                         <div class="form-group">
                         <label for = "firstname">First Name</label>
                          <input type="text" name="firstname" class="form-control">
                         </div>
                         <div class="form-group">
                         <label for = "lastname">Last Name</label>
                          <input type="text" name="lastname" class="form-control">
                         </div>
                         <div class="form-group">
                         <label for = "password">Password</label>
                          <input type="password" name="password" class="form-control" >
                         </div>
                         <div class = "form-group">
                          <label for = "experience">Experience</label>
                          <input type="text" name="experience" class="form-control" >
                         </div>
                         <div class="form-group">
                         <label for = "profile">Profile</label>
                         <textarea class="form-control" name="profile" cols="30" rows="10"></textarea>
                         </div>
                         <div class="form-group">
                           <input type="submit" name = "create" class = "btn btn-primary pull-right">
                         </div>
                         </form>  
                      </div> 
                                
            </div>
                      
                  
        </div>
    </div>  

<?php include("includes/footer.php"); ?>