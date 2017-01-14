<?php 
	$conn = new mysqli("mysql-57-centos7","root","","healty_life");
	$id = $_GET["id"];
	$query = "DELETE FROM posts WHERE id = '$id'";
	$post = $conn->query($query);

	header("Location: addPost.php");

?>