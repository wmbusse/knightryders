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
    $the_result_array = self::find_this_query("SELECT * FROM ".self::$db_table ." WHERE username ='$username' LIMIT 1");
    return !empty($the_result_array) ? array_shift($the_result_array) : false;
  }
  public static function verify_user($username, $password)
  {
    global $database;
    $username = $database->escape_string($username);
    $password = $database->escape_string($password);
    $sql = "SELECT * FROM " . self::$db_table. " WHERE username = '$username' AND password = '$password'";

    $the_result_array = self::find_this_query($sql);
    return !empty($the_result_array) ? array_shift($the_result_array) : false;
  }

  # properties abstract method 

  protected function properties() {
    //return $object_properties =  get_object_vars($this);
    $properties = array();
    foreach (self::$db_table_fields as $db_field){
      if(property_exists($this,$db_field)){
        $properties[$db_field] = $this->$db_field;
      }
    }
    return $properties;
  }

  # CLEAN PROPERTIES 
   protected function cleaned_properties() {
     global $database;
     $cleaned_properties = array();
     foreach($this->properties() as $key => $value) {
       $cleaned_properties[$key] = $database->escape_string($value);
     }
     return $cleaned_properties;
   }

  # save method begins

  public function save() {
    return isset($this->id) ? $this->update() : $this->create();

  }

  # Create Method
  public function create()
  {

    global $database;
    $properties = $this->cleaned_properties();
    $sql = "INSERT INTO " . self::$db_table . "(".implode(", ", array_keys($properties)) . ")";
    $sql .="VALUES ('".implode("','", array_values($properties)) ."')";
    
/* 
#########################################
# OLD CREATE UNABSTRACTED CREATE METHOD #
#########################################
    $sql = "INSERT INTO ".self::$db_table . "(username,password,firstname,lastname,experience,profile)";
    $sql .= " VALUES ('";
    $sql .= $database->escape_string($this->username) . "', '";
    $sql .= $database->escape_string($this->password) . "', '";
    $sql .= $database->escape_string($this->firstname) . "', '";
    $sql .= $database->escape_string($this->lastname) . "', '";
    $sql .= $database->escape_string($this->experience) . "', '";
    $sql .= $database->escape_string($this->profile) . "')";
*/
    if ($database->query($sql)) {

      $this->id = $database->the_insert_id();

      return true;
    } else {

      return false;
    }
    }# end Create Method 

      #update function
    public function update(){
      global $database;
      $properties = $this->cleaned_properties();
      $property_pairs = array();
      foreach($properties as $key=>$value){
        $property_pairs[] = "{$key} ='{$value}'";
      }
      $sql = "UPDATE " .self::$db_table ." SET ";
      $sql .= implode(",",$property_pairs);
      $sql .=" WHERE id = ". $database->escape_string($this->id);
####################################
#     OLD UPDATE METHOD            #
####################################
/*
      $sql = "UPDATE ".self::$db_table." SET ";
      $sql .= "username= '" . $database->escape_string($this->username) . "', ";
      $sql .= "password= '" .$database->escape_string($this->password) . "', ";
      $sql .= "firstname= '".$database->escape_string($this->firstname) . "', ";
      $sql .= "lastname= '".$database->escape_string($this->lastname) . "', ";
      $sql .= "experience= '".$database->escape_string($this->experience) . "', ";
      $sql .= "profile= '".$database->escape_string($this->profile) . "' ";
      $sql .= " WHERE id= " .$database->escape_string($this->id);
*/


      $database->query($sql);

      return(mysqli_affected_rows($database->connection)== 1) ? true:false;

    }# End update Method 

    # Begin Delete Method 
    public function delete(){
      global $database;
      $sql = "DELETE FROM ". self::$db_table.  "WHERE id = ".$database->escape_string($this->id);
      $database->query($sql);
      return(mysqli_affected_rows($database->connection)==1) ? true:false;
    }# End Delete Method 

}// End user class
