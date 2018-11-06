<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.user_profile_box{
			margin: 50px;
			border: 1px solid green;
			padding: 20px;
			color: #9f03af;
			/*background-color: #9acfc5;*/
		}
		.asked_question_box{
			margin: 50px;
			border: 1px solid orange;
			padding: 20px;
		}
		.answered_question_box{
			margin: 50px;
			border: 1px solid red;
			padding: 20px;
		}
		#profile_text{
			background-color: #9ab1cf;
			color:white;
			padding: 5px;
			font-size: 40px;
		}
		#asked_text{
			background-color: tomato;
			color:white;
			padding: 5px;
		}
		#answered_text{
			background-color: green;
			color:white;
			padding: 5px;
		}
	</style>
</head>
<body>
	<?php include('header.php'); ?>
	<?php 
		include('function.php');
		$user_id=$_REQUEST['user_id'];
		

		$conn=connect();
		$sql="select * from user where id='$user_id'";

		$result=mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)==1){
			$row=mysqli_fetch_assoc($result);
			echo "<div class='user_profile_box'>";
			echo "<div id='profile_text'>Profile</div><hr><br>";
			echo "Name: ".$row['username']."<br>";
			echo "Email:".$row['email']."<br>";
			echo "</div>";
		}

		//Asked question
		
		$sql="select id,title from question where user_id='$user_id'";

		$result=mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)>0){
			echo "<div class='asked_question_box'>";
			echo "<div id='asked_text'>Asked questions</div><hr><br>";
			while ($row=mysqli_fetch_assoc($result)) {
				echo "<a href='answer.php?question_id=$row[id]'>$row[title]</a><br>";	
			}
			echo "</div>";
		}

		//Answered question

		$sql="select question.title,question.id from question,answer where answer.question_id=question.id and answer.user_id='$user_id'";

		$result=mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)>0){
			echo "<div class='answered_question_box'>";
			echo "<div id='answered_text'>Answered questions</div><hr><br>";
			while ($row=mysqli_fetch_assoc($result)) {
				echo "<a href='answer.php?question_id=$row[id]'>$row[title]</a><br>";
			}
			echo "</div>";
		}

	?>
</body>
</html>