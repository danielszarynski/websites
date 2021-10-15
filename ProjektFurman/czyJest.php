<?php
include("baza.php");
session_start();
$pokazStrone=0;
$users=$pdo->query("SELECT UserName FROM users") or die("bez userow");

while($row=$users->fetch(PDO::FETCH_ORI_NEXT))
{
	if(isset($_SESSION['login']) && $_SESSION['login']==$row[0])
		$pokazStrone=1;
}
$users->closeCursor();

// sprawdza czy sesja istnieje i ma jakies uzyteczne dane 
?>