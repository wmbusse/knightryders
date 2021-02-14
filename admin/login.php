<?php
require_once("includes/header.php");

if ($session->is_signed_in()) {
    
    redirect("index.php");
}

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);


    // Method to check database user

    $user_found = User::verify_user($username, $password);

    if ($user_found) {
        $session->login($user_found);
        redirect("index.php");
    } else {
        $the_message = "Your password or username are incorrect";
    }
} else {
    $username = null;
    $password = null;
    $the_message = null;
}





?>
<div class="col-md-4 col-md-offset-3">
<div class="row text-center" style = "color:yellowgreen"><h1>Knight Ryders Team Administration</h1></div>
<h3 style = "color:yellowgreen">Login</h3>
    <h4 class="bg-danger"><?php echo $the_message; ?></h4>

    <form action="" method="post">

        <div class="form-group">
            <label for="username" style = "color:yellowgreen">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>">

        </div>

        <div class="form-group">
            <label for="password" style = "color:yellowgreen">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">

        </div>


        <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">

        </div>


    </form>


</div>