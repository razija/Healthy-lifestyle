<!DOCTYPE html>
<html lang="en">
     <head>
	     <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="pravi.css">
	     <title>Kontakt</title>
	     <script src="novi.js"></script>
     </head>

	 <div class="red" id="horizontalni_meni">
		 <ul>
             <li><a class="active" href="naslovna.html">Home</a></li>
             <li><a href="Kontakt.html">Kontakt</a></li>
             <li><a href="Omeni.html">O meni</a></li>
             <li><a href="galerija.html">Galerija</a></li>
			 <li><a href="../projects/login.php">Sign in</a></li>

		 </ul>
	</div>
	
     <div class="red" id="pretraga">
		 <form action="action_page.php">
			 <input id="i" type="search" placeholder="Search...">
		 </form>
	</div>
	
	 <div class="red" id="slika5">
	 <div class="red"></div>
	 <div class="red"></div>
	 <div class="red"></div>
	 <div class="red"></div>
	 <div class="red"></div>
	 <div class="red"></div>
	 <div class="red"></div>
	 <div class="red"></div>
	 </div>
	 	<div class="kolona jedan" id="meni">
		<ul>
	        <li><a class="active" id="naslovna.html" href="naslovna.php">Home</a></li>
			<li><a href="#" onmouseover="mopen('m1')" onmouseout="mclosetime()">Vježbanje</a>
			  <div id="m1" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
                  <a href="Vjezbanje.php">Kod kuće</a>
                  <a href="Vjezbanje.php" onclick="ucitaj('Vjezbanje.html')">Teretana</a>
              </div>
			</li>
	    
            <li><a href="#"  onmouseover="mopen('m2')" onmouseout="mclosetime()">Ishrana</a>
			  <div id="m2" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
                  <a href="Ishrana.php" >Dijeta</a>
                  <a href="Ishrana.php" >Glavna jela</a>
			  </div>
		   </li>
	       <li><a id="Omeni.html" href="Omeni.php" >O meni</a></li>
           <li><a id="Kontakt.html" href="Kontakt.php">Kontakt</a></li>
	  </ul>
	</div>


	 <div class="kolona dva">
	     <div class="red">
		     <p>Kada ste vec tu, mozda zelite i da mi nesto kazete.<br><br>S obzirom da dobijam mnogo pisama
             i mnostvo pitanja, budite strpljivi ako ne odgovorim odmah.<br><br> Hvala i lijep pozdrav.</p>
	     </div>
	 </div>
	 
	<?php
	 //validacija podataka sa forme
     function test_input($data){
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}
	 //Unos podataka u xml
	 if (isset($_REQUEST['ok']) && ($_SERVER["REQUEST_METHOD"]=="POST")){
		 $ime = $email = $komentar = "";
		 $nameErr = $emailErr = $genderErr = $websiteErr = "";
		 
         if (empty($_POST["ime"])) 
             $nameErr = "Name is required";
         $ime = test_input($_POST["ime"]);
		 if (!preg_match("/^[a-zA-Z ]*$/",$ime)) 
             $nameErr = "Only letters and white space allowed"; 
		 
		 if (empty($_POST["email"])) 
             $emailErr = "Email is required";
         $email = test_input($_POST["email"]);
		 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
             $emailErr = "Invalid email format"; 
			 
		 if (empty($_POST["komentar"])) 
             $comment = "";
		 $komentar = test_input($_POST["komentar"]);
		 
		 $xml=new DOMDocument("1.0", "UTF-8");
		 $xml->load("podaci.xml");
		 
		 $rootTag = $xml->getElementsByTagName("all_data")->item(0);
		 
		 $dataTag = $xml->createElement("data");
		 
		 $imeTag = $xml->createElement("ime", $ime);
		 $emailTag = $xml->createElement("email", $email);
		 $komentarTag = $xml->createElement("komentar", $komentar);
		 
		 $dataTag->appendChild ($imeTag);
		 $dataTag->appendChild ($emailTag);
		 $dataTag->appendChild ($komentarTag);
		 
		 $rootTag->appendChild ($dataTag);
		 
	     $xml->save("podaci.xml");
		 }
		 
     if (isset($_REQUEST['submit']) && ($_SERVER["REQUEST_METHOD"]=="POST")){
		 $email = "";
		 if (empty($_POST["email"])) 
             $emailErr = "Email is required";
		 $email = test_input($_POST["email"]);
		 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
             $emailErr = "Invalid email format"; 
		 
		 $xml=new DOMDocument("1.0", "UTF-8");
		 $xml->load("podaci1.xml");
		 
		 $rootTag = $xml->getElementsByTagName("all_data")->item(0);
		 $dataTag = $xml->createElement("data");
		 $emailTag = $xml->createElement("email", $email);
		 
		 $dataTag->appendChild ($emailTag);
		 $rootTag->appendChild ($dataTag);
		 
	     $xml->save("podaci1.xml");
		 }
	 ?>
	 <div class="kolona dva">
	 <div class="red">
         <form id="forma1" name="forma1" onsubmit='return validateForm("forma1")' method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			<div id="greska" name="greska" style="color:red" font-weight:bold></div>
			<label>Ime</label>
			<input type="text" name="ime" id="ime">
			<label>Email</label>
			<input type="text" id="email" name="email" placeholder="Email Adress">
			<label>Komentar</label>
			<input type="text" name="komentar" id="komentar">
			<input type="submit" value="Submit" name="ok">
		 </form>
	 </div>
	 <img width="100%" src="slicice/trcanje.jpg" alt="Picture"  id="slika6">
	 </div>
	 
     <div class="kolona jedan" id="desna_strana">
	     <div class="red" id="prijava">
		     <h3>Moji tekstovi u tvom inboxu</h3><br>
             <p>Odluka da pratis u stopu ovaj blog je mozda najbolja odluka koju ces donijeti u zivotu. Posebno ako su i ostale bile uzasne.Ima nas 1000.
			     Join 100 other subscribers!
		     </p>
		     <form id="forma2" name="forma2" onclick="return validateForm('forma2')" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		          <div id="greska" name="greska" style="color:red" font-weight:bold></div>
		             <input type="text" placeholder="Email Adress" name="email" id="email" required>
		             <input type="submit" value="Prijavi se!" name="submit">
		     </form>
		 </div>
		 
		 <div class="red" id="prijava">
		     <h3>Drustvene mreze</h3>
		 </div>
	
		 <div class="red" id="logo">
			 <img width="100%" src="slicice/srce.png" alt="Picture">
		 </div>
	 </div>
		
     <div class="red" id="horizontalni_meni">
		 <ul>
             <li><a class="active" href="naslovna.html">Home</a></li>
             <li><a href="Kontakt.html">Kontakt</a></li>
             <li><a href="Omeni.html">O meni</a></li>
             <li><a href="galerija.html">Galerija</a></li>
		 </ul>
     </div>
	 
     <div class="red" id="zadnji_red"></div>



</html>