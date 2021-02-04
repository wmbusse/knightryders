<?php

// User Class

class User{

    # find all users method 

    public static function find_all_users(){

      return self::find_this_query("SELECT * FROM users");

    }

    # end find users method 

    #start find users by id method 

    public static function find_user_by_id($user_id){

        return self::find_this_query("SELECT * FROM users WHERE id ='$user_id'");
    }

    public static function find_this_query($sql){
        global $database;
        $result_set = $database->query($sql);
        return $result_set;

    }

}// End user class








?>