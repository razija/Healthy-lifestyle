<?php 
	$conn = new mysqli("localhost","root","","healty_life");
	$id = $_GET["id"];
	$query = "DELETE FROM posts WHERE id = '$id'";
	$post = $conn->query($query);

	header("Location: addPost.php");

?>