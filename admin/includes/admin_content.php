  <!-- Page Heading -->
  <div class="row">
      <div class="col-lg-12 text-center" style="background:#ffff99;">
          <h1 class="page-header">
              Admin
              <small>The Future is Here and Now </small>
          </h1>
      
           <?php
      
       echo SITE_ROOT ."<BR>";
       echo INCLUDES_PATH ;
/*
           $user = new User();
           $user->username = "new";
          

           $user->create();
      /*
      $user = User::find_user_by_id($user->id);
      $user->username = "Roe Roe";
      $user->update();

      $user = User::find_by_id(38);
    
      $user->profile = "Now hmm well let me tell you.. contrary to what Dundee thinks and tells you... Im actually the senior cat in this house.!!!";
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
  