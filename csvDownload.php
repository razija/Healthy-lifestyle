<?php 
    $conn = new mysqli("localhost","root","","healty_life");
	$upis = fopen("test.csv","w");
	 $query = "SELECT * FROM `contacts`";
	 $result = $conn->query($query);
		 if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
			$upisPodaci = "Ime: " .  $row["name"]. " Email: " . $row["email"]. " Komentar: " .  $row["comment"] . "\n\n";
			fputcsv($upis,explode(',',$upisPodaci));
			
		    }
		}
    fclose($upis);	
    $filename="test.csv";
	header('Content-Type: application/csv; charset=UTF-8');
	header('Content-Disposition: attachment;filename="'.$filename.'";');
	readfile("test.csv");		 
	
	
	
	/*$XML = simplexml_load_file("podaci.xml");
	$upis = fopen("test.csv","w");
	
	foreach($XML->data as $data)
	{
	    $upisPodaci = "Ime: " . $data->ime . " Email: " . $data->email . " Komentar: " . $data->komentar . "\n\n";
		fputcsv($upis,explode(',',$upisPodaci));
	}
	fclose($upis);*/
	
	
			

?>