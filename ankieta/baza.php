<?php
$klucz="*";
$user="*";
$serwer="*";
$baza="*";
$info="mysql:host=$serwer;dbname=$baza;charset=utf8mb4";
$pdo = new PDO($info, $user, $klucz);

?>