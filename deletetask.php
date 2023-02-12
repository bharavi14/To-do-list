<?php 

	include_once 'config/db.php';
	$conn = new Database();
	$db = $conn->getConnection();
	if(isset($_POST['id'])) {
		$query = "DELETE FROM todo_tasks WHERE TASK_ID = '".$_POST['id']."'";
		$res = $db->query($query);
		if($db->affected_rows){
			
			echo true;
		}else{
			echo false;
		}
	}	
		
	
?>

