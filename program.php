<?php      
	//session_start();
	//if(!isset($_SESSION))
		//header("Location: login.php");
 ?>

<!DOCTYPE html>
<html>
<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
     <form method="POST" action="login.php">
	     <input type="submit" value="Log out" name="logout">
	 </form><br>
	 <?php
	 if (isset($_REQUEST['logout'])){
     session_destroy();
	 header ("Location: login.php");
	 }
     ?>
    <input type="button" onclick="location.href='csvDownload.php';" value="Download CSV File" /> <br><br>
	
    <p>Ako želite generisati izvještaj u pdf-u kliknite <a onclick="location.href='pdfGenerate.php';">ovdje.</a></p>
	
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
				$xml = simplexml_load_file('podaci.xml');				
				$users = $xml->xpath("//data/ime[contains(text(), '$name')]");
		
				foreach($users as $user)
				{
					echo $user . '<br>'; // Full Package
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
		 $xml=new DOMDocument("1.0", "UTF-8");
		 $xml->load("podaci.xml");
		 
	     $cemail = $_POST['email'];
		 $xpath = new DOMXPATH($xml);
		 
		 foreach($xpath->query("/all_data/data[email='$cemail']") as $node)
		 {
			 $node->parentNode->removeChild($node);
		 }
	     $xml->save("podaci.xml");

		 }
		  function search($test)
	 {
		 var_dump($test);
	 }
	?>

     <form method="get" action="program.php">
	 <?php
	
	 $xml=simplexml_load_file("podaci.xml") or die("Error: Cannot create object");
	 foreach($xml->children() as $podaci) { 
		 echo $podaci->ime . ", "; 
		 echo $podaci->email . ", "; 
		 echo $podaci->komentar . "<br> "; 
		 echo "<br>";
	 }?>
	 </form>
	 
	 


</body>
</html>