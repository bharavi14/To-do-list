 <?php
 	session_start();
 	//print_r($_SESSION); 
	
	include_once 'config/db.php';
	include_once 'addtodolist.php';
	include_once 'tasklist.php';
	include_once 'deletetask.php';

	$database = new Database();
	$db = $database->getConnection();

	if(isset($_POST['addtodolist'])) {
		if($db) {

			$task = new Addtodolist($db);

			$status = $task->addToDolist($_POST['task_title']);

		}

	}

	$tasklist = new Tasklist($db);
	$tasks = $tasklist->tasksList();	
?>

 <div id="myDIV" class="header">
  	<h2>My To Do List</h2>

	  <form action="" method="post" name="addtasks">
		  <input type="text" id="myInput" placeholder="Title..." name="task_title"/>
		  <button value="Add" name="addtodolist" class="addBtn">Add</button>
	  </form>		  
</div>


<ul id="myUL">
	<?php 
	if(!empty($tasks)) {
		foreach($tasks as $key=>$value)	{?>	
	  		<li id="<?php echo  $value['TASK_ID']; ?>">
	  			<input type ="checkbox" name="task"><?php echo $value['TASK_TITLE']?> | &nbsp; <a href="edittasks.php?id=<?php echo $value['TASK_ID'] ?>">Edit</a>
	  			| &nbsp; <span class='delete' id='del_<?php echo  $value['TASK_ID']; ?>' style="cursor:pointer">Delete</span>
	  		</li>
	<?php } 	
  	} else{
  		echo "No Tasks in the List";

    }?>
</ul>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){

	 $('.delete').click(function(){
	   var el = this;
	   var id = this.id;
	   var splitid = id.split("_");

	   // Delete id
	   var deleteid = splitid[1];
	   // AJAX Request
	   $.ajax({
	     url: 'deletetask.php',
	     type: 'POST',
	     data: { id:deleteid },
	     success: function(response){
	     	console.log(response)
	       if(response){
		    $('#'+deleteid).remove();
	      }else{
		 	alert('Invalid ID.');
	      }

	    }
	   });

	 });

	});
</script>