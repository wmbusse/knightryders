<?php 

class Db_object{
    protected static $db_table = "users";
    public static function find_all()
    {
  
      return static::find_by_query("SELECT * FROM " . static::$db_table." ");
    }
  
    # end find users method 
  
    #start find users by id method 
  
    public static function find_by_id($user_id)
    {
      global $database;
      $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table. " WHERE id ='$user_id' LIMIT 1");
      return !empty($the_result_array) ? array_shift($the_result_array) : false;
     
    } # end method find user by id
    # begin find this query method 

  public static function find_by_query($sql)
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
  
  # save method begins

  public function save() {
    return isset($this->id) ? $this->update() : $this->create();

  }

  # Create Method
  public function create()
  {

    global $database;
    $properties = $this->cleaned_properties();
    $sql = "INSERT INTO " . static::$db_table . "(".implode(", ", array_keys($properties)) . ")";
    $sql .="VALUES ('".implode("','", array_values($properties)) ."')";
    

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
      $sql = "UPDATE " .static::$db_table ." SET ";
      $sql .= implode(",",$property_pairs);
      $sql .=" WHERE id = ". $database->escape_string($this->id);



      $database->query($sql);

      return(mysqli_affected_rows($database->connection)== 1) ? true:false;

    }# End update Method 

    # Begin Delete Method 
    public function delete(){
      global $database;
      $sql = "DELETE FROM ". static::$db_table.  " WHERE id = ".$database->escape_string($this->id);
      $database->query($sql);
      return(mysqli_affected_rows($database->connection)==1) ? true:false;
    }# End Delete Method 
    protected function properties() {
        //return $object_properties =  get_object_vars($this);
        $properties = array();
        foreach (static::$db_table_fields as $db_field){
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
}

















?>