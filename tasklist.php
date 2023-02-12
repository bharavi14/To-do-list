<?php 
	class Tasklist {
	  	
	  	private $conn;

	    public function __construct($db) {

	    	$this->conn = $db;
	    }

	    public function tasksList() {

	    	$query = "SELECT * FROM todo_tasks ORDER BY TASK_ID DESC";
			$res = $this->conn->query($query);
			if($res->num_rows){
				while($row = $res->fetch_assoc()){
					//print_r($row);exit;
					$tasks[] = $row;
				}
				return $tasks;
			} else{
				return 0;
			}	
				
	    }

	}
	
?>

