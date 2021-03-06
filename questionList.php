<?php
session_start();
?>
<?php
	include("header.php");
	include("function.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#msg{
			background-color: yellow;
			border:1px solid black;
		}
		.question_view{
			background-color: lightblue;
			border: 1px solid black;
			margin:50px;
			padding: 25px;
		}
		#current_page{
			font-size: 20px;
			color:red;
			margin-left:50px;
			margin-top: 5px;
			background-color: lightblue;
			display: inline-block;
			padding: 5px;
			border-radius: 50px;
			border:1px solid red;
		}
		#start_tag{
			background-color: green;
			text-decoration: none;
			color: white;
			border-radius: 50px;
			padding: 5px;
		}
		#prev_tag{
			background-color: blue;
			text-decoration: none;
			color: white;
			border-radius: 50px;
			padding: 5px;
		}
		#next_tag{
			background-color: red;
			text-decoration: none;
			color: white;
			border-radius: 50px;
			padding: 5px;
		}
		#page_box{
			margin-left: 50px;
		}
	</style>
</head>
<body>
	

<?php
	if(!empty($_REQUEST['LoginSuccessful'])){           // from access_account.php
		echo "<p id='msg'>$_REQUEST[LoginSuccessful]</p>";
		header("refresh:3;url=questionList.php");	
	}
	if(!empty($_REQUEST['QuestionInserted'])){
		echo "<p id='msg'> $_REQUEST[QuestionInserted]</p>";  // from   question_insert.php

	}
?>
	
	<?php
		$conn=connect();


		$sql="select count(id) from question";

		$result=mysqli_query($conn,$sql);
		
		$row=mysqli_fetch_row($result);
		$total_row=$row[0];
		
		
		$row_per_page=2;

		$total_page=ceil($total_row/$row_per_page);

		if(isset($_REQUEST['current_page']) && is_numeric($_REQUEST['current_page']) ){
			$current_page=$_REQUEST['current_page'];
		}
		else $current_page=1;

		
		$offset=($current_page-1)*$row_per_page;

		$sql="select * from question order by time DESC limit $offset,$row_per_page";
		
		//$sql="select * from question order by time DESC";
		$result=mysqli_query($conn,$sql);

		echo "<div class='question'>";
		echo "<div id='current_page'>Page No: $current_page</div>";
		if(mysqli_num_rows($result)>0){
			
			while($row=mysqli_fetch_assoc($result)){
				echo "<div class='question_view'>";
				echo "<a href='answer.php?question_id=$row[id]'>$row[title]</a><br>";
				
				//echo "$row[id]--- $row[title]<br>$row[question]--$row[category]<br><br>";
				echo "<p>$row[time]</p>";
				echo "</div>";
			}
		}

		echo "<div id='page_box'>";
		if($current_page>1){
			echo "<a id='start_tag' href='$_SERVER[PHP_SELF]?current_page=1'>START</a>";
			$prev_page=$current_page-1;
			echo "<a id='prev_tag' href='$_SERVER[PHP_SELF]?current_page=$prev_page'>PREV</a>";
		}

		if($current_page!=$total_page){
			$next_page=$current_page+1;
			echo "<a id='next_tag' href='$_SERVER[PHP_SELF]?current_page=$next_page'>NEXT</a>";
		}
		echo "</div>";
		echo "</div>";
	?>
</body>
</html>

