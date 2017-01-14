<?php 
	$conn = new mysqli("mysql-57-centos7","root","","healty_life");
	$queryCategory = "SELECT * FROM `categories`";
	$categories = $conn->query($queryCategory);

	if(isset($_POST["save"]))
	{
		$name = $_POST["name"];
		$query = "INSERT INTO categories (name) VALUES ('$name')";
		
		$result = $conn->query($query);

		if($result)
			echo "<h2>Successfuly inserted ".$name." category</h2>";
	}
 ?>

<form id="forma1" name="forma1" method="post">
	<input type="button" onclick="location.href='program.php';" value="Back to index" /> <br> <br>

	<label>Category name</label>
	<input type="text" name="name" id="name"><br><br>
	<input type="submit" name="save" value="Save">
</form>

<?php
	if ($categories->num_rows > 0) {
		while($row = $categories->fetch_assoc()) { ?>
		<?php echo $row["name"]; ?> 
		<input type="button" onclick="location.href='editCategory.php?id=<?php echo $row["id"] ?>';" value="Edit" /> 
		<input type="button" onclick="location.href='deleteCategory.php?id=<?php echo $row["id"] ?>';" value="Delete" /> <br> <br>
<?php 
		}
	}
?>