<?php
	session_start(); 
	if(isset($_POST['submit'])) {
			// include database and object files
		include_once 'config/db.php';
		include_once 'checklogin.php';

		 
		// instantiate database and objects
		$database = new Database();
		$db = $database->getConnection();
		if($db) {

			$login = new Checklogin($db);

			$status = $login->checkUserLogin($_POST['user_email'],$_POST['password']);

			if(! $status) {

				echo "Invalid Credentials";

			}

		}

	}	
	
?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style><!--
            #container{width:400px; margin: 0 auto;}

--></style>

<script type="text/javascript" language="javascript">

            function submitlogin() {
                var form = document.login;
				if(form.user_email.value == ""){
					alert( "Enter email" );
					return false;
				}
				else if(form.password.value == ""){
					alert( "Enter password." );
					return false;
				}
			}

</script>

<span style="font-family: 'Courier 10 Pitch', Courier, monospace; font-size: 13px; font-style: normal; line-height: 1.5;">
<div id="container">
</span>
	<h1>Login</h1>
	<form action="" method="post" name="login">
	<table>
	<tbody>
	<tr>
	<th>Email:</th>
	<td><input type="text" name="user_email" required="" /></td>
	</tr>
	<tr>
	<th>Password:</th>
	<td><input type="password" name="password" required="" /></td>
	</tr>
	<tr>
	<td></td>
	<td><input onclick="return(submitlogin());" type="submit" name="submit" value="Login" /></td>
	</tr>
	<tr>
	<td></td>
	</tr>
	</tbody>
	</table>
	</form>
</div>

