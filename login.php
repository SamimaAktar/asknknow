<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		form{
			width: 500px;
			border: 1px solid black;
			padding: 10px;
			margin: auto;
		}
		form div{
			margin-top: 5px;
		}
		label{
			width: 100px;
			display: inline-block;
		}
		#button{
			margin-left: 100px;
		}
		#image{
			text-align: center;
			margin-bottom: 30px;
			margin-left: 150px;
			width: 40%;
			background-color: lightgreen;
			border-radius: 50%;
		}
		#msg{
			border:1px solid black;
			background-color: yellow;
		}
	</style>
</head>
<body>
	<?php include("header.php") ?>
	<?php 
		if(!empty($_REQUEST['SignupSucceeded'])){
			echo "<p id='msg'>$_REQUEST[SignupSucceeded]</p>"; // from create_user.php
			$_REQUEST['SignupSucceeded']=null;
			//header("refresh:3;url=login.php");	
		}
		if(!empty($_REQUEST['FirstLogin'])){
			echo "<p id='msg'>$_REQUEST[FirstLogin]</p>"; // from logout.php
			$_REQUEST['FirstLogin']=null;
			//header("refresh:3;url=questionList.php");	
		}
		if(!empty($_REQUEST['WrongUsernamePassword'])){
			echo "<p id=msg>$_REQUEST[WrongUsernamePassword]</p>"; // from access_account.php
			$_REQUEST['WrongUsernamePassword']=null;
		}
		if(!empty($_REQUEST['FirstLogout'])){
			echo "<p id='msg'>$_REQUEST[FirstLogout]</p>"; //from access_account.php
			$_REQUEST['FirstLogout']=false;
		}
		if(!empty($_REQUEST['LoginBeforePost'])){
			echo "<p id=msg>$_REQUEST[LoginBeforePost]</p>"; //from question_insert.php
			$_REQUEST['LoginBeforePost']=false;
		}
		if(!empty($_REQUEST['LoginBeforeAnswer'])){
			echo "<p id=msg>$_REQUEST[LoginBeforeAnswer]</p>"; //from answer_insert.php
			
		}
	?>
	<form method="post" action="access_account.php">
		<div id="image">
			<img src="user.png" width="150px" height="150px" alt="image">
		</div>
		<div>
			<label>username :</label><input type="text" name="username" required>
		</div>
		<div>
			<label>password :</label><input type="password" name="password" required>
		</div>
		<div>
			<input type="submit" value="Login" id="button">
		</div>
	</form>

</body>
</html>