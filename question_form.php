<?php 
	session_start() ;
	include("function.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

	<style type="text/css">
		form{
			width: 1000px;
			margin: auto;
			border: 1px solid black;
			padding: 20px;
		}
		label{
			width: 100px;
			display: inline-block;
			/*background-color: tomato;*/
		}
		form div{
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<?php include("header.php") ?>
	<form method="post" action="question_insert.php">
		<p><b>Ask a question</b></p>
		<hr>
		<div>
			<label>Title :</label><br>
			<textarea name="title" rows="1" cols="100" required></textarea>
		</div>
		<div>
			<label>Description</label><br>
			<textarea name="description" rows="20" cols="100" required></textarea>
		</div>
		<div>
			<label>Category</label><br>
			<input list="category_names" name="category" required>
			<datalist id="category_names">
				<?php 
					$conn=connect();
					$res=mysqli_query($conn,"select distinct category from question");
					if(mysqli_num_rows($res)>0){
						while($row=mysqli_fetch_assoc($res)){
							echo "<option value='$row[category]'>";
							echo "$row[category]";
						}
					}
					
				?>
			</datalist>
			
		</div>
		<div>
			<input type="submit" value="SUBMIT YOUR QUESTION">
		</div>
	</form>
	<script>
		CKEDITOR.replace( 'description' );
	</script>
</body>
</html>