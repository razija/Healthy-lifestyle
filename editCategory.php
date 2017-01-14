<?php 
	$conn = new mysqli("mysql-57-centos7","root","","healty_life");
	
	$id = $_GET["id"];
	$query = "SELECT * FROM `categories` WHERE id = '$id'";
	$category = $conn->query($query);

	$category = $category->fetch_assoc();

	if(isset($_POST["save"]))
	{
		$name = $_POST["name"];
		$query = "UPDATE `categories` SET name='$name' WHERE id='$id'";
		
		$result = $conn->query($query);

		if($result)
			echo "<h2>Successfuly edited ".$name." category</h2>";
	}
 ?>

<form method="post">
	<input type="button" onclick="location.href='addCategory.php';" value="Back to categories" /> <br> <br>

	<label>Category name</label>
	<input type="text" name="name" id="name" value="<?php echo $category["name"] ?>"><br><br>
	<input type="submit" name="save" value="Edit">
</form>
