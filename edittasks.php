 <?php
 	session_start();
 	//print_r($_SESSION); 
	
	include_once 'config/db.php';
	include_once 'gettask.php';
	include_once 'edittask.php';

	$database = new Database();
	$db = $database->getConnection();

	if(isset($_POST['edittodolist'])) {
		if($db) {

			$tasklist = new EditTask($db);
			$status = $tasklist->editTask($_GET['id'],$_POST['task_title']);
			if($status) {
				header('Location: addtasks.php');
			}

		}

	}

	$tasklist = new GetTask($db);
	$tasks = $tasklist->getTaskDetail($_GET['id']);
	
	//print_r($tasks);	
?>

 <div id="myDIV" class="header">
  	<h2>Edit Task</h2>
	  <form action="" method="post" name="edittasks">
		  <input type="text" id="myInput" placeholder="Title..." name="task_title" value="<?php echo $tasks['TASK_TITLE'];?>"/>
		  <button value="Update" name="edittodolist" class="addBtn">Update</button>
	  </form>		  
</div>
