<?php
 
// putanja
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$input = "";
 
// konekcija sa bazom
$link = mysqli_connect('mysql-57-centos7', 'root', '', 'healty_life');
mysqli_set_charset($link,'utf8');
 
// tabele sa putanje
$table = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
$key = array_shift($request)+0;
 
$columns = "";
$values = "";
 
switch ($method) {
  case 'GET':
    $sql = "select * from `$table`".($key?" WHERE id=$key":''); break;
}
 
$result = mysqli_query($link,$sql);
 
if (!$result) {
  http_response_code(404);
  die(mysqli_error());
}
 
// ispisi rezultate
if ($method == 'GET') {
  if (!$key) echo '[';
  for ($i=0;$i<mysqli_num_rows($result);$i++) {
    echo ($i>0?',':'').json_encode(mysqli_fetch_object($result), JSON_PRETTY_PRINT);
  }
  if (!$key) echo ']';
}
 
mysqli_close($link);