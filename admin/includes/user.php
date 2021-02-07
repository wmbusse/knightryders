<?php

// User Class

class User
{

  public $id;
  public $username;
  public $firstname;
  public $lastname;
  public $password;
  public $experience;
  public $profile;


  # find all users method 

  public static function find_all_users()
  {

    return self::find_this_query("SELECT * FROM users");
  }

  # end find users method 

  #start find users by id method 

  public static function find_user_by_id($user_id)
  {
    global $database;
    $the_result_array = self::find_this_query("SELECT * FROM users WHERE id ='$user_id' LIMIT 1");
    return !empty($the_result_array) ? array_shift($the_result_array) : false;
    /* if(!empty($the_result_array)){

            $first_item = array_shift($the_result_array);

            return $first_item;
        }else{
            return false;
        }*/
  } # end method find user by id

  public static function find_user_by_username($username){
    global $database;
    $the_result_array = self::find_this_query("SELECT * FROM users WHERE username ='$username' LIMIT 1");
    return !empty($the_result_array) ? array_shift($the_result_array) : false;
  }

  # begin find this query method 

  public static function find_this_query($sql)
  {
    global $database;
    $result_set = $database->query($sql);
    $the_object_array = array();
    while ($row = mysqli_fetch_array($result_set)) {
      $the_object_array[] = self::instantiation($row);
    }
    return $the_object_array;
  } #end method find this query

  # begin verify user method 

  public static function verify_user($username, $password)
  {
    global $database;
    $username = $database->escape_string($username);
    $password = $database->escape_string($password);
    $sql = "SELECT * FROM users WHERE username = '$username' AND password= '$password'";

    $the_result_array = self::find_this_query($sql);
    return !empty($the_result_array) ? array_shift($the_result_array) : false;
  }

  # begin instantiation method

  public static function instantiation($the_record)
  {
    $the_object = new self;
    // $the_object->id         = $founduser['id'];
    // $the_object->username   = $founduser['username'];
    // $the_object->lastname   = $founduser['lastname'];
    // $the_object->firstname  = $founduser['firstname'];
    // $the_object->experience = $founduser['experience'];

    foreach ($the_record as $the_attribute => $value) {

      if ($the_object->has_the_attribute($the_attribute)) {

        $the_object->$the_attribute = $value;
      }
    }

    return $the_object;
  } #end instantiation method 


  # has the attribute method 
  private function has_the_attribute($the_attribute)
  {
    $object_properties =  get_object_vars($this);

    return  array_key_exists($the_attribute, $object_properties);
  } #end has attribute method


  # Create Method
  public function create()
  {

    global $database;

    $sql = "INSERT INTO users (username,password,firstname,lastname,experience,profile)";
    $sql .= " VALUES ('";
    $sql .= $database->escape_string($this->username) . "', '";
    $sql .= $database->escape_string($this->password) . "', '";
    $sql .= $database->escape_string($this->firstname) . "', '";
    $sql .= $database->escape_string($this->lastname) . "', '";
    $sql .= $database->escape_string($this->experience) . "', '";
    $sql .= $database->escape_string($this->profile) . "')";

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

      $sql = "UPDATE users SET ";
      $sql .= "username= '" . $database->escape_string($this->username) . "', ";
      $sql .= "password= '" .$database->escape_string($this->password) . "', ";
      $sql .= "firstname= '".$database->escape_string($this->firstname) . "', ";
      $sql .= "lastname= '".$database->escape_string($this->lastname) . "', ";
      $sql .= "experience= '".$database->escape_string($this->experience) . "', ";
      $sql .= "profile= '".$database->escape_string($this->profile) . "' ";
      $sql .= " WHERE id= " .$database->escape_string($this->id);



      $database->query($sql);

      return(mysqli_affected_rows($database->connection)== 1) ? true:false;

    }# End update Method 

    # Begin Delete Method 
    public function delete(){
      global $database;
      $sql = "DELETE FROM users WHERE id = ".$database->escape_string($this->id);
      $database->query($sql);
      return(mysqli_affected_rows($database->connection)==1) ? true:false;
    }# End Delete Method 

}// End user class
