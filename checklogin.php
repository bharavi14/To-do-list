<?php 
	class Checklogin {
	  	
	    private $conn;

	    public function __construct($db) {

	    	$this->conn = $db;
	    }

	    public function checkUserLogin($email,$password) {

	    	$password = md5($password);

	    	$query = "SELECT * FROM users where USER_EMAIL = '".$email."' AND USER_PASSWORD = '".$password."'";
			$res = $this->conn->query($query);
			//echo $res->num_rows;exit;

			if($res->num_rows > 0) {
				while($row = $res->fetch_assoc()){
					//print_r($row);exit;
					$_SESSION['user_details'] = $row;
				}
				header('Location: addtasks.php');
			} else{
				return false;
			}
	    }

	}
	
?>

