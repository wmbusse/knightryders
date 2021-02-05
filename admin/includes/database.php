<?php 

    require_once("new_config.php"); 

// Database Class

class Database {

    public  $connection;

    function __construct(){
        $this->open_db_connection();
    }

    // open connection method

    public function open_db_connection(){

        // $this->connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

        $this->connection = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

        if($this->connection->connect_errno){

            die("Database connection failed badly". $this->connection->connect_error);
        }

        
    }

    // end open connection function

        // open query method

        public function query($sql){

            $result = $this->connection->query($sql);
            $this->confirm_query($result);
            
            return $result;

            
        }

        // end query method

        // confirm query method 

        private function confirm_query($result){

            if(!$result){

                die("Query Failed" . $this->connection->error);
    
            }

        }

        // end confirm query method 

        // escape string method 

        public function escape_string($string){

           $escaped_string = $this->connection->real_escape_string($string);

           return $escaped_string;
        }

        // end escape string method

        // insert id method 

        public function the_insert_id() {
            return $this->connection->insert_id;
        }

        // end insert id method 
        






    
}
// End Database Class

// Instantiate class

$database = new Database();






?>