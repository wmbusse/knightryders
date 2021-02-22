<?php

// User Class

class Event extends Db_object
{
    protected static $db_table = "events";
    protected static $db_table_fields = array(
     'id',
     'event_name',
     'event_location',
     'event_date',
     'event_type',
     'event_description',
     'event_image',
     'status',
     'Website'
    );

    public $id;
    public $event_name;
    public $event_location;
    public $event_date;
    public $event_type;
    public $event_description;
    public $event_image;
    public $status;
    public $Website;
    public $upload_directory = "images";
    public $image_placeholder ="http://placehold.it/400x400&text=image";
    public $tmp_path;
    public $errors = array();
    public $uploads_errors_array = array(
            UPLOAD_ERR_OK         =>"There is no error",
          UPLOAD_ERR_INI_SIZE   =>"The uploaded file exceeds the upload_max_filesize",
          UPLOAD_ERR_FORM_SIZE  =>"The uploaded file exceeds the MAX_FILE_SIZE directive",
          UPLOAD_ERR_PARTIAL    => "The uploaded file was only paritally uploaded",
          UPLOAD_ERR_NO_FILE    => "No file was uploaded",
          UPLOAD_ERR_NO_TMP_DIR => "Missing temporary folder",
          UPLOAD_ERR_CANT_WRITE =>"Faile to write to disk",
          UPLOAD_ERR_EXTENSION  => "A PHP extension stopped the file upload"
  );
    
  public static function find_all()
  {

    return static::find_by_query("SELECT * FROM " . static::$db_table." ORDER BY event_date ASC");
  }
  public static function find_by_id($event_id)
  {
    global $database;
    $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table. " WHERE id ='$event_id' LIMIT 1");
    return !empty($the_result_array) ? array_shift($the_result_array) : false;

  } # end method find user by id

  public function image_path_and_placeholder(){
    return empty($this->event_image) ? $this->image_placeholder : $this->upload_directory.DS.$this->event_image;
  }

  public static function find_event_by_event_name($event_name){
    global $database;
    $the_result_array = self::find_by_query("SELECT * FROM ".self::$db_table ." WHERE event_name ='$event_name' LIMIT 1");
    return !empty($the_result_array) ? array_shift($the_result_array) : false;
  }
  
         // This is passing the $_FILES['uploaded_file'] as an argument
 #################################
       ###    SET FILE METHOD       ####
       #################################
       public function set_file($file){

        if(empty($file) || !is_array($file)){
            $this->errors[] = "There is no file here";
            return false;
        }elseif($file['error'] !=0){
            $this->errors[] = $this->uploads_errors_array[$file['error']];
            return false;
      
        }else{
            $this->event_image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type     = $file['type'];
            $this->size     = $file['size'];
        }
      }

  public function picture_path(){
      return $this->upload_directory.DS.$this->event_image ;
  }

  public function upload_photo() {

     
        

      if(empty($this->event_image)||empty($this->tmp_path)){
          $this->errors[] = "The file was not available";
          return false;
      }

      $target_path = SITE_ROOT.DS.'admin'.DS. $this->upload_directory . DS . $this->event_image;

      if(file_exists($target_path)) {
          $this->errors[] = "The file {$this->event_image} already exists!";
          return false;
      }

      if(move_uploaded_file($this->tmp_path, $target_path)) {
          
              unset($this->tmp_path);
              return true;
          
      }else{
          $this->errors[] = "The file directory probably does not have permissions";
          return false;
      }

  

  }


  public function delete_event(){
      if($this->delete()){

          $target_path = SITE_ROOT.DS.'admin'.DS.$this->picture_path();
          return unlink($target_path) ? true : false;

      }else {
          return false;
      }
  }
    }
    

    
// End comment class
