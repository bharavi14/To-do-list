<?php 
	class Database {
	  
	    // specify your own database credentials
	    private $host = "localhost";
	    private $db_name = "todolist";
	    private $username = "root";
	    private $password = "";
	    public $conn;
	  
	    // get the database connection
	    public function getConnection(){
	  
	        $this->conn = null;
	  
	        try{
	            $this->conn = new mysqli("localhost", "root", "", "todolist");
	            if ($this->conn->connect_errno) {
				    echo "Failed to connect to MySQL: (" . $this->conn->connect_errno . ") " . $this->conn->connect_error;
				}
	        }catch(Exception $exception){
	            echo "Connection error: " . $exception->getMessage();
	        }
	  
	        return $this->conn;
	    }
	}

?>