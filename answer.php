<?php session_start() ?>
<?php include("function.php");
	//$id="";
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

	<style type="text/css">
	.question_view{
		border: 1px solid black;
		margin: 50px;
		padding: 25px;
	}	
	.answer_view{
		border: 1px solid black;
		margin: 50px;
		padding: 25px;
		background-color: lightblue;
	}
	.answer_box{
		border: 1px solid black;
		margin: 40px;
		padding: 20px;
	}
	</style>
</head>
<body>
	<?php include("header.php") ?>
	<?php 
		$conn=connect();

		$id=$_REQUEST['question_id'];
		//$_REQUEST['id']=$id;
		$sql="select * from question where id='$id'";
		$result=mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)==1){
			$row=mysqli_fetch_assoc($result);
			echo "<div class='question_view'>";
			echo "<p><b>$row[title]</b></p><hr>";
			echo "<p>$row[question]</p>";
			echo "<p>category:$row[category]</p>";
			echo "</div>";

		}

//SELECT a.*, b.username FROM `answer` a, user b WHERE a.user_id = b.id AND a.`question_id` = 3 
		//$answer_sql="select * from answer where question_id='$id'";
		$answer_sql="select a.*, b.username from answer a,user b where a.user_id=b.id and a.question_id=$id";

		$answer_res=mysqli_query($conn,$answer_sql);

		if(mysqli_num_rows($answer_res)>0){
			echo "<div class='answer_view'>".
				 "<b>ANSWERS</b><br>";


			while($row=mysqli_fetch_assoc($answer_res)){
				//$user_sql="select username from user where id='$row[user_id]'";
				//$user_res=mysqli_query($conn,$user_sql);
				//$row_user="";
				/*if(mysqli_num_rows($user_res)==1){
					$row_user=mysqli_fetch_assoc($user_res);
				}*/
				echo "<hr><p>$row[answer]<br><br>$row[time] answer given by ".
				     " <a style='color:red' href='profile.php?user_id=$row[user_id]'>$row[username]</a></p>";

			}
			echo "</div>";
		}
		
		if($_SESSION['loggedin']==true){

		}
	?>
	<div class="answer_box">
		<form method="post" action="answer_insert.php?question_id=<?php echo($id); ?>">
			<p><b>Answer this question</b></p>
			<hr>
			<textarea name="answer" rows="20" cols="100" required></textarea><br>
			<input type="submit" value="SUBMIT YOUR ANSWER">
		</form>
	</div>
	
	<script>
		CKEDITOR.replace('answer');
	</script>


</body>
</html>