  <!-- Page Heading -->
  <div class="row">
      <div class="col-lg-12 text-center" style="background:#ffff99;">
          <h1 class="page-header">
              Admin
              <small>The Future is Here and Now </small>
          </h1>
      
           <?php
           

           $user = new User();
           $user->username = "L.G";
           $user->firstname = "Little ";
           $user->lastname = "Girl";
           $user->password = "TheOnlyFemaleCat";
           $user->experience = "Professional";
           $user->profile = "I am the only female Cat in this house... and I demand all the respect!";

           $user->create();
      /*
      $user = User::find_user_by_id($user->id);
      $user->username = "Roe Roe";
      $user->update();

      $user = User::find_user_by_id(48);
      $user->firstname = "Arlo";
      $user->lastname = "Knight";
      $user->username = "Skinny Boy";
      $user->experience = " Not in your or my life ";
      $user->profile = " I am the bestest, skinniest friendliest most loving cat in the house........... NOT DUNDEE";
      $user->save();
     /*
      $user = User::find_user_by_username("Chrys");
      echo $user->firstname;
      */
?>
          <ol class="breadcrumb">
              <li>
                  <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
              </li>
              <li class="active">
                  <i class="fa fa-file"></i> Blank Page
              </li>
          </ol>
      </div>
  </div>
  <!-- /.row -->
  <div class="col-lg-12">
      <div class="row">
          <h3>What would you like to do today?</h3>
          <ul>
              <li>
                  <a href="users.php">See a list of all users</a>
              </li>
          </ul>
      </div>
  </div>