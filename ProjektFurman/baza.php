<?php



$mysql_host = '*'; 
$port = '*'; 
$username = '*';
$password = '*';
$database = '*'; 


try{
	$pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
	//echo 'Połączenie nawiązane!';
}catch(PDOException $e){
	echo 'Połączenie nie mogło zostać utworzone.<br />';
}


$pdo->query("SET NAMES utf8");
?>