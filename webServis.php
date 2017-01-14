<?php

	$veza = new PDO("mysql:dbname=healty_life;host=localhost;charset=utf8", "root");
	$veza->exec("set names utf8");
	
	function zag() {
		header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
		header('Content-Type: application/json');
		header('Access-Control-Allow-Origin: *');
	}

	function rest_get($request, $data){
		/*$veza = new PDO("mysql:dbname=healty_life; host=localhost ;charset=utf8" , "root");
		$veza->exec("set names utf8");
		
		
		if (isset($data['posts'])){
			echo "Post: " . $data['posts'] . "\n";
			$upit = $veza->prepare("SELECT * FROM posts where title = :title");
			$upit->bindValue(':title', $data['title'], PDO::PARAM_STR);
			$upit->execute();
			echo json_encode($upit->fetchALL(PDO::FETCH_ASSOC),JSON_PRETTY_PRINT);
		}
		else {
			echo "Svi postovi u bazi" . "\n";
			$upit = $veza->prepare("SELECT * FROM posts");
			$upit->execute();
			echo json_encode($upit->fetchALL(PDO::FETCH_ASSOC),JSON_PRETTY_PRINT);
		}*/
	}
	
	function rest_post($request, $data) { }
	function rest_delete($request) { }
	function rest_put($request, $data) { }
	function rest_error($request) { }
	
	$method = $_SERVER['REQUEST_METHOD'];
	$request = $_SERVER['REQUEST_URI'];

	switch($method) {
    case 'PUT':
        parse_str(file_get_contents('php://input'), $put_vars);
        zag(); $data = $put_vars; rest_put($request, $data); break;
    case 'POST':
        zag(); $data = $_POST; rest_post($request, $data); break;
    case 'GET':
        zag(); $data = $_GET; rest_get($request, $data); break;
    case 'DELETE':
        zag(); rest_delete($request); break;
    default:
        header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
        rest_error($request); break;
}

?>
