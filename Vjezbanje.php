<?php 

		$conn = new mysqli("localhost","root","","healty_life");
		$query = "SELECT * FROM `posts` WHERE category_id = 1";
		$result = $conn->query($query);
 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Vjezbanje</title>
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
		<div class="red post">
			<?php 
				if ($result->num_rows > 0) {
					    // output data of each row
				    while($row = $result->fetch_assoc()) 
				    { ?>
						<div>
					        <a class="link" href="post.php?id=<?php echo $row['id'] ?>">
								<h2><?php echo $row["title"] ?></h2>
								<img src="uploads/<?php echo $row['image'] ?>"  alt="Picture">
								<p><?php echo $row["title"] ?></p>
							</a>
						</div>
			<?php	}
				}
			?>

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
		 if (empty($_POST["email"])) 
             $emailErr = "Email is required";
		 $email = test_input($_POST["email"]);
		 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
             $emailErr = "Invalid email format";
		 	    $query = "INSERT INTO contacts (name,email,comment) VALUES ('$ime', '$email', '$komentar')";
			
		$result = $conn->query($query);

		if($result)
			echo "<h2>Successfuly inserted ".$ime." contact </h2>";
	}
     ?>
		   
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
			<img width="100%" src="slicice/srce.png"  alt="Picture">
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