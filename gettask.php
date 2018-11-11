<?php 
	class GetTask {
	  	
	  	private $conn;

	    public function __construct($db) {

	    	$this->conn = $db;
	    }

	    public function getTaskDetail($id) {

	    	$query = "SELECT * FROM todo_tasks where TASK_ID = '".$id."'";
			$res = $this->conn->query($query);
			while($row = $res->fetch_assoc()){
				//print_r($row);exit;
				$task = $row;
			}
			return $task;
					
	    }

	}
	
?>

