<?php 
	class Addtodolist {
	  	
	    private $conn;

	    public function __construct($db) {

	    	$this->conn = $db;
	    }

	    public function addToDolist($task_title) {

	    	if($this->checkTaskTitle($task_title)) {

	    		if($this->saveTask($task_title)) {
	    			echo "Task added to the To-Do-List Successfully";
	    		}
	    		else{
	    			echo "Task not saved successfully";
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

	    public function saveTask($task_title) {

			$sql = "INSERT INTO todo_tasks (TASK_TITLE,USER_ID) VALUES ('".trim($task_title)."','".$_SESSION['user_details']['USER_ID']."')";
			//echo $sql;exit;

			if ($this->conn->query($sql) === TRUE) {
			    return true;

			} else {
			    return false;

			}

	    }

	}
	
?>

