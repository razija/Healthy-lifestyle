<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Moja stranica</title>
	<link rel="stylesheet" href="pravi.css">
	<script src="novi.js"></script>
</head>
 <body>
	<div class="red" id="horizontalni_meni">
		<ul>
  <li><a class="active" href="naslovna.html">Home</a></li>
  <li><a href="Kontakt.html">Kontakt</a></li>
  <li><a href="Omeni.html">O meni</a></li>
  <li><a href="galerija.html">Galerija</a></li>
		</ul>
	</div>
	<div class="red" id="pretraga">
		<form action="action_page.php">
				<input id="i" type="search" placeholder="Search...">
		</form>
	</div>
	<div class="red" id="slika1">
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
		<h2>Sedam minuta do srece!</h2><br><br>
	    <p>Da li ste znali da je dovoljno sedam minuta aktivnosti, da biste osetili ogroman osecaj srece?<br><br>
		
	    Dokaz za to imam ja, kao i svi oni koji su to probali, ali sada je to i naucno objasnjeno. 
		HIIT, ili High Intesity Interval Training, iliti, trening visokog intenziteta u kojem se smenjuje
		veliki napor s trenucima odmora, za samo sedam minuta moze da vas “digne iz mrtvih” i popravi vam raspolozenje za cijli dan.<br><br>

        Fizicka aktivnost je odlicna protiv depresije, takodje.<br><br>

        Naucnici koji su ispitivali ovaj fenomen, podijelili su depresivne ispitanike u tri grupe: prva, koja je lijecena od depresije samo
		lijekovima, drugu, koja je lijecena samo fizickom aktivnoscu i, treca, u kojoj su ljudi kombinovali lijekove sa fizickom aktivnoscu.
		Nakon sest mjeseci rezultat je bio gotovo identican za sve tri grupe – izlijecili su depresiju.<br><br>

		Međutim, ponovna provera stanja ispitanika nakon šest meseci pokazala je zapanjujuće rezultate. Oni koji su uzimali lekove, čak
		njih 36% imalo je ponovo iste simptome. Ispitanici koji su kombinovali lekove s vežbama, u 31% slučajeva vratili su se na staro.
		Ali, hej, oni koji su samo vežbali protiv depresije, bili su ponovo depresivni u samo 9% slučajeva nakon šest meseci!<br><br>

		Nije li to superiška?<br><br>

		E, sad. Zamislite samo sad sebe, ako ste zdravi, samo malo tromi, previše umorni, dekoncentrisani ili pospani više nego što 
		treba. Zamislite koji biste osećaj vi imali nakon sedam minuta HIIT treninga?! Bili biste kao vetar, gromovi i munje!<br><br>

		Evo jednog predloga takvih vežbi, koje možete raditi u kući, a za koje vam je dovoljno i potrebno samo sedam minuta.</p>
		
		<img width="100%" src="slicice/trening.jpg" alt="Picture"/>
		
		<p>Samo malo da pojasnimo za one koji prvi put cuju: Intenzivni trening podrazumijeva intenzitet vjezbe, a intervali podrazumevaju
		da se intervalno smjenjuje snazan fizicki napor s kratkim trenucima odmora.<br><br>
		U ovim vjezbama gore, to znaci da svaku vjezbu uradite po desetak ponavljanja (ili 30 sekundi) u zustrom stilu,
		a da između njih imate 10-tak sekundi odmora. Ako ih pogledate malo bolje,vidjecete da se kroz redoslijed vjezbi 
		smenjuju napori koje imaju gornje i donje velike grupe misica jer rade naizmjenicno. To znaci da 
		imate vise od 10-tak sekundi odmora da opustite umorne misice. A tokom odmora resetovace se i manji misici.<br><br>

        Ne, nece vam biti lako tih sedam minuta. Ali osejeaj srece koji cete imati nakon toga, nosicete ceo dan!<br><br>

       Uostalom, pogledajte svoj mozak, ako biste se samo malo pomerili iz fotelje, koliko biste samo izlucili proteina i endorfina koji
	   ce vas usreciti!<br></p>
		
		<img width="100%" src="slicice/brain.png" alt="Picture"/>
		
		<h3>Zato, go, play!</h3>
	</div>

	<div class="kolona jedan" id="desna_strana">
	     <div class="red" id="prijava">
		<h3>Moji tekstovi u tvom inboxu</h3><br>
        <p>Odluka da pratis u stopu ovaj blog je mozda najbolja odluka koju ces doneti u zivotu. Posebno ako su i ostale bile uzasne.Ima nas 1000.
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
		   
		   <form id="forma1" name="forma1" onclick='return validateForm("forma1")' method="post">
		   <div id="greska" name="greska" style="color:red" font-weight:bold></div>
		   <input type="text" placeholder="Email Adress" id="email" name="email" required>
		   <input type="button" value="Prijavi se!">
		   </form>
		   
		  </div>
		  <div class="red" id="prijava">
		   <h3>Drustvene mreze</h3>
		  </div>
	
			<div class="red" id="logo">
			<img width="100%" src="slicice/srce.png" alt="Picture" />
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