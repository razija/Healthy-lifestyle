<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="pravi.css">
	<script src="novi.js"></script>
	<title>O meni</title>
</head>
<body>
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
		<div class="red" id="slika4">
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
		<div class="red"></div>
		<div class="red" id="slika7">
		<img  height="225px" width="100%" src="slicice/me.jpg" alt="Picture"/>
        </div>
		<div class="red">
		<p>Zdravo!<br>Ja sam Razija Djulovic.Iako pisem o zdravoj ishrani, s dubokim uverenjem da 
          izbori u hrani i nas stil zivota mogu da uticu na nase zdravlje i peveniraju 
          bolesti uzrokovane stilom zivota, ja u isto vreme duboko vjerujem ljekarima i nauci,
 konstultujem se sa njima, nikada se ne lijecim na svoju ruku, i imam odgovoran odnos
 prema uzimanju  lijekova. Mnogo puta se desilo da citaoci povjeruju da zbog toga sto 
 sam svoj holesterol “lijecila” drugacijom ishranom i sportom, da ja može biti pripadam 
 onom zavjerenickom krugu ljudi koji zaziru od medicine i nauke. Naprotiv.
 Ako budete mene pitali “ja imam bolest tu i tu, sta da radim”, ja cu vam uvek reci da 
 odmah konsultujete ljekara, a ne Internet.
 Ako zelite da saradjujete sa mnom na ovom blogu, ili da me nesto pitate, ostavite komentar.
 Ostale tekstove cete pronaci cackanjem po arhivi, na sopstvenu odgovornost. :)<p>
		</div>
 <div class="red" id="odgovornost">
 <h3>Odricanje odgovornosti:</h3>
 <p>Nisam profesionalni trener, nisam nutricionista, nisam strucnjak iz oblasti o kojoj pisem. 
Sve sto ovde napisem odnosi se samo na mene i moju praksu i sve što napisem, 
uzmite sa rezervom, a ne kao savet strucnjaka. Jedan vazan 
savjet: konsultujte ljekara ili fizijatra pre nego sto nesto od ponudjenog na blogu, pokusate 
da primijenite na sebi. I ja svaki put konsultujem ljekara, ako zelim nesto u treningu ili ishrani drasticno da promijenim.
Nisam odgovorna za povrede ili zdravstveno stanje onih koji su poslusali savjete sa ovog bloga.</p>
 </div>
	</div>
	
	<div class="kolona jedan" id="desna_strana">
	     <div class="red" id="prijava">
		<h3>Moji tekstovi u tvom inboxu</h3><br>
        <p>Odluka da pratis u stopu ovaj blog je mozda najbolja odluka koju ces donijeti u zivotu. Posebno ako su i ostale bile uzasne.Ima nas 1000.
		   Join 1000 other subscribers!</p>
		   
	 <?php
	 //validacija unesenih sa forme podataka sa forme
     function test_input($data){
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
	 }
	 
	 if (isset($_REQUEST['submit']) && ($_SERVER["REQUEST_METHOD"]=="POST")){
		 $email = "";
		 $email = test_input($_POST["email"]);
		 
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
		   
		   <form id="forma1" name="forma1" onclick='return validateForm("forma1")' method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		   <div id="greska" name="greska" style="color:red" font-weight:bold></div>
		   <input type="text" placeholder="Email Adress" id="email" name="email">
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
</body>
</html>