<?php

// User Class

class User extends Db_object
{
  protected static $db_table = "users";
  protected static $db_table_fields = array('username','password','firstname','lastname','experience','profile');

  public $id;
  public $username;
  public $firstname;
  public $lastname;
  public $password;
  public $experience;
  public $profile;

  public static function find_user_by_username($username){
    global $database;
    $the_result_array = self::find_by_query("SELECT * FROM ".self::$db_table ." WHERE username ='$username' LIMIT 1");
    return !empty($the_result_array) ? array_shift($the_result_array) : false;
  }
  public static function verify_user($username, $password)
  {
    global $database;
    $username = $database->escape_string($username);
    $password = $database->escape_string($password);
    $sql = "SELECT * FROM " . self::$db_table. " WHERE username = '$username' AND password = '$password'";

    $the_result_array = self::find_by_query($sql);
    return !empty($the_result_array) ? array_shift($the_result_array) : false;
  }
}// End user class
