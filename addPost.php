<?php 
	$conn = new mysqli("mysql-57-centos7","root","","healty_life");
	$queryCategory = "SELECT * FROM `categories`";
	$categories = $conn->query($queryCategory);

	$queryPosts = "SELECT * FROM `posts`";
	$posts = $conn->query($queryPosts);
	
	if(isset($_POST["submit"]))
	{
		$title = $_POST["title"];
		$category = $_POST["category"];
		$text = $_POST["text"];
		$image = $_FILES["fileToUpload"]["name"];
		
        $target_dir = "slicice/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	
		
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
             echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } 
	    else {
             echo "Sorry, there was an error uploading your file.";
        }
		
        if(empty($title) || empty($category) || empty($text) || empty($image))
		{
			echo "Please insert all fields";
		}
		else
		{
			$query = "INSERT INTO posts (title,category_id,text,image) VALUES ('$title', '$category', '$text', '$image')";
			
			$result = $conn->query($query);

			if($result)
				echo "<h2>Successfuly inserted ".$title." post</h2>";
		}
	}
 ?>

<form method="post" enctype="multipart/form-data">
	<input type="button" onclick="location.href='program.php';" value="Back to index" /> <br> <br>

	<label>Umetni naslov</label>
	<input type="text" name="title"><br><br>

	<label>Odaberi kategoriju</label>
	<select name="category">
		<option "">Choose category</option>
		<?php 
			if ($categories->num_rows > 0) {
				while($row = $categories->fetch_assoc()) { ?>
					<option value="<?php echo $row['id'] ?>"><?php echo $row["name"] ?></option>
			
		<?php 	
				}
			} 
		?> 
	</select><br><br>

	<label>Umetni tekst</label>
	<textarea name="text"></textarea><br><br>

	<label>Odaberi sliku</label>
	<input type="file" name="fileToUpload"><br><br>

	<input type="submit" name="submit" value="Save">
</form>

<?php
	if ($posts->num_rows > 0) {
		while($row = $posts->fetch_assoc()) { ?>
		<?php echo $row["title"]; ?> 
		<input type="button" onclick="location.href='editPost.php?id=<?php echo $row["id"] ?>';" value="Edit" /> 
		<input type="button" onclick="location.href='deletePost.php?id=<?php echo $row["id"] ?>';" value="Delete" /> <br> <br>
<?php 
		}
	}
?>