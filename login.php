<!DOCTYPE html>
<html lang="en">
<body>
     <head><title>Sign in</title></head>   
        <form method="post" action="login.php">
        <table>
        <tr><td>Username: </td><td><input name="username"></td></tr>
        <tr><td>Password: </td><td><input type="password" name="password"></td></tr>
        </table>
        <input type="submit" value="Login"/>
        <input type="submit" name="Guest" value="Login as a guest"/>
        </form>
</body>
</html>
    
<?php
    session_start();
	$username = "";
	//if (isset($_SESSION['username']))
        //$username = $_SESSION['username'];
    if (isset($_REQUEST['username'])) {
        if ($_REQUEST['username'] === "admin" && $_REQUEST['password'] === "admin") {
            $username = $_REQUEST['username'];
            $_SESSION['username'] = $username;
	}
    else if (isset($_REQUEST['Guest']) && $_REQUEST['Guest'] == 'Login as a guest') {
        $username = 'guest';
        $_SESSION['username'] = $username;
    }
    else
        print "Greška!Morate popuniti polja.";
    }
	   
    if ($username === "admin")
        header("Location:program.php");
    else if ($username === "guest" ){
	     $xml=simplexml_load_file("podaci.xml") or die("Error: Cannot create object");
		 echo "Komentari i utisci korisnika koji su citali moje price: <br>";
	     foreach($xml->children() as $podaci) {
		     //echo $podaci->ime . ", "; 
		     //echo $podaci->email . ", "; 
		     echo $podaci->komentar . "<br> "; 
		     echo "<br>";
	     }
	 }

?>
	 

