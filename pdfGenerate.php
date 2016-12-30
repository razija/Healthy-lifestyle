<?php
     header('Content-Type: text/html; charset=utf-8');
     require('fpdf181/fpdf.php');
     $pdf = new FPDF();
     $pdf->AddPage();
     $pdf->SetFont('Times','B',18);
     $pdf->SetTitle('Komentari');
	 $pdf->SetTextColor(128, 0, 0);
     $pdf->MultiCell(120,20,'Emailovi korisnika koji su se pretplatili: ');
     $_XML = simplexml_load_file("podaci1.xml");
      foreach($_XML->data as $data)
      {
		  $_ispis =" - ".$data->email.", ".$_knjiga->ime.";";
		  $pdf->SetFont('Times','I',16);
		  $pdf->SetTextColor(0, 0, 102);
          $pdf->MultiCell(150,10,$_ispis);	
	  }
	   ob_end_clean();
       $pdf->Output();



?>