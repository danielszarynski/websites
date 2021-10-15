<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel-zmiana hasla</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src=js.js></script>
</head>
<body>
<div>
<form method=post id=ukryty>
<button  id=wyslij name=wyslij style="border:0px solid white; color:white;"></button>
</form>

</div>
<?php
// <ok> wybieramy z listy usera, wtedy pojawiaj się uzupełnione inputy jego danymi , mozna je edytować ,i zapis robi update do bazy
// <*> zrob liste jesli chodzi o uprawnienia, zeby admin mogl wybrac z listy -automatycznie wybrane to co user ma w bazie
include("baza.php");


//---------------------------------------lista userow ------------------------
$stmt=$pdo->query("SELECT idU,UserName FROM users");

echo "Wybierz pracownika: <select id='pracownicy' onChange=wybierzPracownika()>";

while($row=$stmt->fetch(PDO::FETCH_ORI_NEXT))
	{
		echo"<option value=$row[0]>$row[1]</option>";
			
	}

echo "</select>";
$stmt->closeCursor();


//----------------------------------------------------------------------------

//-----------po wybraniu selecta z userem, wywoluje funkcje js, --------------------------------
//--------------------ktora tworzy ukryty input z id usera i z automatu tworzy posta dla php-
?>

<script type='text/javascript'>
	
	function wybierzPracownika(){
		var pracownicy=document.getElementById('pracownicy');
		console.log(pracownicy.value);
		var idPracownika=pracownicy.value;

	var znacznik = document.createElement('input');
		znacznik.setAttribute('type', 'hidden');
		znacznik.setAttribute('name', 'ktoryPracownik');
		znacznik.setAttribute('value',idPracownika );
		var kontener = document.getElementById('ukryty');
		kontener.appendChild(znacznik);


/*
	var znacznik2 = document.createElement('input');
		znacznik2.setAttribute('type', 'hidden');
		znacznik2.setAttribute('name', 'nazwaPracownika');
		znacznik2.setAttribute('value',nazwaPracownika );
		
		kontener.appendChild(znacznik2);
*/
 		 $( 'button[name=wyslij]' ).trigger( 'click' );
}

</script>

<?php

//---jezeli wykryto posta od js, spr id usera z ukrytego inputu i napisz jego login i pozwol zmienic jego haslo---
if(isset($_POST['wyslij']))
{
	echo "<br>";
	$idPracownika=$_POST['ktoryPracownik'];

	$stmt=$pdo->query("SELECT * FROM users WHERE idU=$idPracownika ") or die("nope");

?>
	<form method=post>
<?php
	while($row=$stmt->fetch(PDO::FETCH_ORI_NEXT))
	{	echo "<input type=hidden name=id value=".$row[0].">";
		//id: echo"<input name='".$row[0]."' value='".$row[0]."'>";
		echo"<br>Login:".$row[1]."	<br>";
		 echo"Nowe Hasło: <input name=haslo><br>";

		echo "<input type=submit value='zmien haslo' name=zaapisz>";
	}
?>

</form>
<?php
$stmt->closeCursor();
}
	
// gdy wykryto probe zmiany hasla, to zrob to 	

if(isset($_POST['zaapisz']))
{
	$idU=$_POST['id'];
	$haslo=$_POST['haslo'];
	$haslo=md5($haslo);
$pdo->query("UPDATE users SET Password='$haslo' WHERE idU='$idU' ") or die("nope");

?>

<script type="text/javascript">
	alert("zapisano zmiany");
</script>
<?php
}


?>

</body>
</html>