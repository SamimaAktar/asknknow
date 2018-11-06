<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		form{
			width: 500px;
			border:1px solid grey;
			padding: 20px;
			margin: auto;
			border-radius: 5px;
		}
		label{
			width: 100px;
			display: inline-block;
			text-align: right;
		}
		div{
			margin-top: 5px;
		}
		#button{
			margin-left: 100px;
			margin-top: 5px;
		}
		#msg{
			border:1px solid black;
			background-color: yellow;
		}
	</style>
</head>
<body>
	<?php include("header.php")  ?>
	<?php  
		if(!empty($_REQUEST['SignupFailed'])){
			echo "<p id='msg'>$_REQUEST[SignupFailed]</p>";  //creat_user.php
			$_REQUEST['SignupFailed']=null;
			header("refresh:2;url=signup.php");
		}
		
	?>
	<form method="post" action="create_user.php">
		<div>
			<label>user name :</label><input type="text" name="username" required><br>
		</div>
		<div>
			<label>Email :</label><input type="email" name="email" required><br>
		</div>
		<div>
			<label>Password :</label><input type="Password" name="password" required><br>
		</div>
		<div>
			<input  type="submit" id="button" value="Submit">
		</div>
		
	</form>
</body>
</html>