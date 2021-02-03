<?php

// Define connection Constants

define("DB_SERVER","localhost");
define("DB_USER","root");
define("DB_PASS","Missie7963");
define("DB_NAME",'teamKnight_db');

 $connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

  /*
  Check Connection
  
  if($connection){

        echo 'True';

    }
    */

?>