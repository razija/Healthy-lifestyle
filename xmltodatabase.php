<?php 
	$con = mysql_connect("mysql-57-centos7","root","");
	mysql_select_db("healty_life");

	$xml=simplexml_load_file("podaci.xml");
	foreach($xml->children() as $podaci) 
	{ 
		$query = "SELECT 1 FROM `contacts` WHERE `email` = '$podaci->email' LIMIT 1";
		$result = mysql_query($query);

		$count = mysql_num_rows($result);

		if($count != 1)
		{
			mysql_query("INSERT INTO contacts (name,email,comment) VALUES ('$podaci->ime','$podaci->email','$podaci->komentar')");
		}
	}

	$xml1=simplexml_load_file("podaci1.xml");
	foreach($xml1->children() as $podaci) 
	{ 
		$query = "SELECT 1 FROM `subscribers` WHERE `email` = '$podaci->email' LIMIT 1";
		$result = mysql_query($query);

		$count = mysql_num_rows($result);

		if($count != 1)
		{
			mysql_query("INSERT INTO subscribers (email) VALUES ('$podaci->email')");
		}
	}

	header("Location: program.php");
?>