<?php
session_start();
$_SESSION['login']=null;
$_SESSION['passy']=null;
$_SESSION['moce']=null;
$_SESSION['uprawnienia']=null;
$_SESSION['jer']=null;
$_SESSION['mc']=null;
$_SESSION['poLogowaniu']=null;

		header("Location:logowanie.php");
?>