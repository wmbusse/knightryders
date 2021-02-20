<?php

include("includes/header.php");

$users=User::find_all();


?>
<?php ?>
<div class="col-md-9 content">
  <section>
<table class="table">
<thead>
<tr>
<th>Username</th>
<th>Name</th>
<th>User Id</th>
<th>Picture</th>
<th>Profile</th>
</tr>
</thead>


  <tbody>
  <?php

foreach($users as $user){?>
<tr>
<td><a href="view_member.php?id=<?php echo $user->id;?>"><?php echo $user->username;?></a></td>
<td><?php echo $user->firstname. " " . $user->lastname;?></td>
<td><?php echo $user->id;?></td>
<td> <img src="<?php echo 'admin/'.$user-> image_path_and_placeholder();?>" alt="" class="img-circle" style="height:100px;width:100px"></td>
<td><?php echo $user->profile;?></td>

</tr>


 <?php  }  ?>
 </tbody>
</table>

</div>
<div class="col-md-3 pull-right">
<?php include("includes/sidebar.php");?>
</div>

</section>
</body>
<?php include("includes/footer.php"); ?>
</html>
