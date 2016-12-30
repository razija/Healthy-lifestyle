<?php 
	$XML = simplexml_load_file("podaci.xml");
	
	$upis = fopen("test.csv","w");
	
	foreach($XML->data as $data)
	{
	    $upisPodaci = "Ime: " . $data->ime . " Email: " . $data->email . " Komentar: " . $data->komentar . "\n\n";
		fputcsv($upis,explode(',',$upisPodaci));
	}
	fclose($upis);
	
	//Skidanje Novost.csv
	$filename="test.csv";
	header('Content-Type: application/csv; charset=UTF-8');
	header('Content-Disposition: attachment;filename="'.$filename.'";');
	readfile("test.csv");			

?>