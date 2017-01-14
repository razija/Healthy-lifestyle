<?php      
	session_start();
	$conn = new mysqli("mysql-57-centos7","root","","healty_life");

 ?>
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

    if (isset($_REQUEST['Guest']) && $_REQUEST['Guest'] == 'Login as a guest'){
		 echo "<br>Komentari i utisci korisnika koji su citali moje price: <br><br>";
		 $query = "SELECT * FROM `contacts`";
		 $result = $conn->query($query);
		 if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "Komentar:  " . $row["comment"]. "<br><br>";
		    }
		} 
		else {
		    echo "0 results";
		}

	}
	
	$username="";
	if (isset($_SESSION['username'])){
	     $username= $_SESSION['username'];
	     header ("Location:program.php");
	
	}
	
	 else if (isset($_REQUEST['username']) && $_REQUEST['username'] === "admin" && $_REQUEST['password'] === "admin") {
         //$user = htmlEntities($_POST['username'], ENT_QUOTES);
	     //$pass = htmlEntities($_POST['password'], ENT_QUOTES);
	     $query = "SELECT * FROM `admin_table`";
	     $result = $conn->query($query);
		 
	     if ($result->num_rows > 0) {
		     while($row = $result->fetch_assoc()){
		         if ($row["name"] == $_POST['username'] && $row["password"]== $_POST['password']){
			         $_SESSION['username'] = $_POST['username'];
		             header ("Location:program.php");
				 }
		        }
	
	        }
	}
	

	

?>
	 

