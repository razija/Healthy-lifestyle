<?php 
	$conn = new mysqli("localhost","root","","healty_life");
	$id = $_GET["id"];
	$query = "SELECT * FROM `posts` WHERE id = '$id'";
	$post = $conn->query($query);

	$post = $post->fetch_assoc();

	$queryCategory = "SELECT * FROM `categories`";
	$categories = $conn->query($queryCategory);

	if(isset($_POST["submit"]))
	{
		$title = $_POST["title"];
		$category = $_POST["category"];
		$text = $_POST["text"];
		$image = $_FILES["fileToUpload"]["name"];
		$target_dir = "slicice/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		if($image != "")
		{
			if($_FILES["fileToUpload"]["name"] != "")
			{
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    if($check !== false) {
			        echo "";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
				
				if (file_exists($target_file)) {
				    echo "Sorry, file already exists.";
				    $uploadOk = 0;
				}
				
				if ($_FILES["fileToUpload"]["size"] > 500000) {
				    echo "Sorry, your file is too large.";
				    $uploadOk = 0;
				}
				
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
				    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				    $uploadOk = 0;
				}
				
				if ($uploadOk == 0) {
				    echo "Sorry, your file was not uploaded.";
			
				} else {
				    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				        echo "";
				    } else {
				        echo "Sorry, there was an error uploading your file.";
				    }
				}
			}
		}

		if(empty($title) || empty($category) || empty($text) || empty ($image))
		{
			echo "Molimo Vas popunite sva polja ili ste zaboravili ponovo odabrati sliku!";
		}
		else
		{
			$query = "UPDATE `posts` SET title='$title', category_id = '$category', text='$text', image='$image'  WHERE id='$id'";
		
			$result = $conn->query($query);

			if($result)
				echo "<h2>Successfuly edited ".$title." post</h2>";

		header("Location: addPost.php ");//?id=".$post["id"]);
		}
	}
 ?>

<form method="post" enctype="multipart/form-data">
	<input type="button" onclick="location.href='addPost.php';" value="Back to posts" /> <br> <br>

	<label>Post title</label>
	<input type="text" name="title" value="<?php echo $post["title"] ?>"><br><br>

	<label>Izaberi kategoriju</label>
	<select name="category">
		<?php 
			if ($categories->num_rows > 0) {
				while($row = $categories->fetch_assoc()) { ?>
					<option value="<?php echo $row['id'] ?>" <?php if($row['id'] == $post['category_id']) echo ' selected = "selected"' ?>><?php echo $row["name"] ?></option>


		<?php 	
				}
			} 
		?> 
	</select><br><br>

	<label>Umetni tekst</label>
	<textarea name="text"><?php echo $post["text"] ?></textarea><br><br>

	<label>Odaberi sliku</label>
	<input type="file" name="fileToUpload" value="<?php echo $post["image"]; ?>"><br><br>

	<input type="submit" name="submit" value="Save">
</form>
