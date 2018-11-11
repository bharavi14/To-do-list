<?php 
	class EditTask {
	  	
	  	private $conn;

	    public function __construct($db) {

	    	$this->conn = $db;
	    }

	    public function editTask($id,$task_title) {

	    	if($this->checkTaskTitle($task_title)) {

		    	$query = "UPDATE todo_tasks SET TASK_TITLE = '".$task_title."' WHERE TASK_ID = '".$id."'";
				$res = $this->conn->query($query);
				if($this->conn->affected_rows){
					
					return true;
				}
			}else{

				echo "Task Title already exists";

			}		
				
	    }

	    public function checkTaskTitle($task_title) {

	    	$query = "SELECT * FROM todo_tasks where TASK_TITLE = '".trim($task_title)."'";
			$res = $this->conn->query($query);
			//echo $res->num_rows;exit;
			if($res->num_rows > 0) {
				return false;
			}else{
				return true;
			}
	    }

	}
	
?>

