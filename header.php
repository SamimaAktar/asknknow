<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.topnav{
			
			background-color: tomato;
			overflow: hidden;
		}
		.topnav a{
			float: left;
			color: white;
			text-decoration: none;
			/*text-align: center;*/
			padding: 10px 30px;
			font-size: 20px;
		}
		.topnav a:hover{
			background-color: #ddd;
			color: black;
		}
		.topnav a:active{
			background-color: #4CAF50;
			color: white;
		}
		
	</style>
</head>
<body>
	<img src="logo.png">
	<div class="topnav">
		<a href="question_form.php" >Ask</a>
		<a href="questionList.php">Question List</a>
		<a href="signup.php">Sign Up</a>
		
		
		<?php 
			if($_SESSION['loggedin']==true){
				echo "<a href='logout.php'>Log out</a>";
				echo "<a style='color:blue;float:right'  href='profile.php?user_id=$_SESSION[id]'>$_SESSION[username]<a>";
			}
			else{
				echo "<a href='login.php'>Log in</a>";
			}
		?>
	</div>
</body>
</html>