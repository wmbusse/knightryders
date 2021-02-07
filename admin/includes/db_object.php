<?php 

class Db_object{
    protected static $db_table = "users";
    public static function find_all()
    {
  
      return static::find_this_query("SELECT * FROM " . static::$db_table." ");
    }
  
    # end find users method 
  
    #start find users by id method 
  
    public static function find_by_id($user_id)
    {
      global $database;
      $the_result_array = static::find_this_query("SELECT * FROM " . static::$db_table. " WHERE id ='$user_id' LIMIT 1");
      return !empty($the_result_array) ? array_shift($the_result_array) : false;
      /* if(!empty($the_result_array)){
  
              $first_item = array_shift($the_result_array);
  
              return $first_item;
          }else{
              return false;
          }*/
    } # end method find user by id
    # begin find this query method 

  public static function find_this_query($sql)
  {
    global $database;
    $result_set = $database->query($sql);
    $the_object_array = array();
    while ($row = mysqli_fetch_array($result_set)) {
      $the_object_array[] = static::instantiation($row);
    }
    return $the_object_array;
  } #end method find this query
  
  # begin instantiation method

  public static function instantiation($the_record)
  {
      $calling_class = get_called_class();
    $the_object = new $calling_class;
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
}

















?>