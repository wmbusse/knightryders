<?php include("includes/header.php");
if (!$session->is_signed_in()) {
    redirect("login.php");
} ?>


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
                    users
                    <small>Subheading</small>
                </h1>
                <a href="add_user.php" class ="btn btn-primary">Add User</a>
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Photo</th>
                                <th>User Name</th>
                                <th>first name</th>
                                <th>Last Name</th>
                                <th>Experience</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                       
                            $users = User::find_all();
                            foreach ($users as $user) {
                            ?>
                                <tr>
                                <td><?php echo $user->id ;?></td>
                                    <td><img src="<?php  echo  $user->image_path_and_placeholder(); ?>" class = "admin-thumbnail" alt=""></td>
                                    <td><?php echo $user->username ;?>
                                    <div class="actions_link">
                                            <a href="delete_user.php?id=<?php echo $user->id; ?>">Delete</a>
                                            <a href="edit_user.php?id=<?php echo $user->id; ?>">Edit</a>
                                            
                                        </div>
                                    </td>
                                    <td><?php echo $user->firstname; ?></td>
                                    <td><?php echo $user->lastname; ?></td>
                                    <td><?php echo $user->experience; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->


    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>