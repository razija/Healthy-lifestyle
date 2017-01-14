<?php
     header('Content-Type: text/html; charset=utf-8');
     require('fpdf181/fpdf.php');
     $pdf = new FPDF();
     $pdf->AddPage();
     $pdf->SetFont('Times','B',18);
     $pdf->SetTitle('Subscribers');
	 $pdf->SetTextColor(128, 0, 0);
     $pdf->MultiCell(120,20,'Emailovi korisnika koji su se pretplatili: ');
	 $conn = new mysqli("localhost","root","","healty_life");
	 $query = "SELECT * FROM `subscribers`";
	 $result = $conn->query($query);
		 if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
				 $_ispis =" - ". $row["email"]." ";
		         $pdf->SetFont('Times','I',16);
		         $pdf->SetTextColor(0, 0, 102);
                 $pdf->MultiCell(150,10,$_ispis);	
			
			
		    }
		}
	 ob_end_clean();
     $pdf->Output();

	 
	 
	 /*$_XML = simplexml_load_file("podaci1.xml");
      foreach($_XML->data as $data)
      {
		  $_ispis =" - ".$data->email.", ".$_knjiga->ime.";";
		  $pdf->SetFont('Times','I',16);
		  $pdf->SetTextColor(0, 0, 102);
          $pdf->MultiCell(150,10,$_ispis);	
	  }
	   ob_end_clean();
       $pdf->Output();*/



?>