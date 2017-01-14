<?php      
	session_start();
	//if(!isset($_SESSION))
		//header("Location: login.php");

	//$conn = mysql_connect("localhost","root","");
	//mysql_select_db("healty_life");
	$conn = new mysqli("localhost","root","","healty_life");

 ?>

<!DOCTYPE html>
<html>
<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <a id="linkLogout" href="logout.php"> Log out </a><br><br>
    <input type="button" onclick="location.href='csvDownload.php';" value="Download CSV File" /> <br>
	
    <p>Ako želite generisati izvještaj u pdf-u kliknite <a onclick="location.href='pdfGenerate.php';">ovdje.</a></p>
	

    <input type="button" onclick="location.href='addCategory.php';" value="Add new category" /> <br> <br>

    <input type="button" onclick="location.href='addPost.php';" value="Add new post" /> <br><br>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<?php
			$name = "";
			if(isset($_GET["search"]))
			{
				$name = $_GET["search"];
			}
		?>
	
		<input type="text" name="search" placeholder="Search" value="<?php echo $name ?>">
		<input type="submit" value="submit">
		<br>
		
		<?php
			if(isset($_GET["search"]))
			{
				echo '<div>Rezultati</div>';
				$name = $_GET["search"];

				/*
				$xml = simplexml_load_file('podaci.xml');				
				$users = $xml->xpath("//data/ime[contains(text(), '$name')]");
				*/

				$query = "SELECT * FROM contacts WHERE name LIKE '%$name%'";
				$result = $conn->query($query);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "Name: " . $row["name"]. "<br> Email: " . $row["email"]. "<br><br>";
				    }
				} else {
				    echo "0 results";
				}
				echo '<br>';
			}
		?>
	</form>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	    Brisanje podataka je na osnovu email-a<br>
        Unesite email:<input type="text" id="email" name="email" placeholder="Email Adress">
		<input type="submit" value="Submit" name="ok">
	</form>
     <br>	 
<?php

//Brisanje podataka iz xml
     if (isset($_REQUEST['ok']))
	 {
		 /*$xml=new DOMDocument("1.0", "UTF-8");
		 $xml->load("podaci.xml");
		 
	     $cemail = $_POST['email'];
		 $xpath = new DOMXPATH($xml);
		 
		 foreach($xpath->query("/all_data/data[email='$cemail']") as $node)
		 {
			 $node->parentNode->removeChild($node);
		 }
	     $xml->save("podaci.xml");
		*/
	    $email = $_POST['email'];

	    $sql = "DELETE FROM contacts WHERE email='$email'";

		if ($conn->query($sql) === TRUE) {
		    echo "Record deleted successfully";
		} else {
		    echo "Error deleting record: " . $conn->error;
		}
	}

	?>

     <form method="get" action="program.php">
	 <?php
		 //$xml=simplexml_load_file("podaci.xml") or die("Error: Cannot create object");
		 
	 	$query = "SELECT * FROM `contacts`";
		//$result = mysqli_query($con,$query);
		//$count = mysql_num_rows($result);
		$result = $conn->query($query);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "Name: " . $row["name"]. "<br> Email: " . $row["email"]. "<br><br>";
		    }
		} else {
		    echo "0 results";
		}



	?>
	 </form>
	 
	<form method="post" action="xmltodatabase.php">
		<input type="submit" value="Import XML file to database" />
	</form>

</body>
</html>