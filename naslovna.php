<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Helathy Lifestyle</title>
<link rel="stylesheet" href="pravi.css">
<script src="novi.js"></script>

</head>

	<div class="red" id="horizontalni_meni">
		<ul>
  <li><a class="active" href="naslovna.html">Home</a></li>
  <li><a href="Kontakt.html">Kontakt</a></li>
  <li><a href="Omeni.html">O meni</a></li>
  <li><a href="galerija.html">Galerija</a></li>
  <li><a href="login.php">Sign in</a></li>
		</ul>
	</div>
		<div class="red" id="pretraga">
		<form action="action_page.php">
				<input id="i" type="search" placeholder="Search...">
		</form>
	</div>
		<div class="red" id="slika3">
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

	<div id="stranica"></div> 
	
	<div class="kolona dva">
		<div class="red post">
			<div>
				<a class="link" href="post1-v.html">
					<h2>Sedam minuta do srece!</h2>
					<img src="slicice/image1.jpg" alt="Picture">
					<p>Da li ste znali da je dovoljno sedam minuta aktivnosti, da biste osjetili ogroman osjecaj srece?
					   Dokaz za to imam ja, kao i svi oni koji su to probali, ali sada je to i naucno objasnjeno....
					</p>
				</a>
			</div>
			<div>
				<a class="link" href="post1-v.html">
					<h2>Sedam minuta do srece!</h2>
					<img src="slicice/image2.jpg" alt="Picture">
					<p>Da li ste znali da je dovoljno sedam minuta aktivnosti, da biste osjetili ogroman osjecaj srece?
					   Dokaz za to imam ja, kao i svi oni koji su to probali, ali sada je to i naucno objasnjeno.
					</p>
				</a>
			</div>
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
	
	<div class="kolona jedan" id="desna_strana">
	     <div class="red" id="prijava">
		<h3>Moji tekstovi u tvom inboxu</h3>
        <p>Odluka da pratis u stopu ovaj blog je mozda najbolja odluka koju ces donijeti u zivotu. Posebno ako su i ostale bile uzasne.Ima nas 1000.
		   Join 1000 other subscribers!</p>
		   
		   <form id="forma1" name="forma1" onclick='return validateForm("forma1")' method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		   <div id="greska" name="greska" style="color:red" font-weight:bold></div>
		   <input type="text" placeholder="Email Adress" id="email" name="email" required>
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
  <li><a href="galerija.php">Galerija</a></li>
		</ul>
   </div>
   
<div class="red" id="zadnji_red"></div>
 


</html>