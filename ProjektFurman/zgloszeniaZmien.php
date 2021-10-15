<!DOCTYPE html>
<html>
<head>
	<title>edytuj Zgloszenia</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src=js.js></script>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel='stylesheet' href='fontello-246a136e/css/fontello.css'>    <link rel='stylesheet' href='style.css'>

</head>
<body>
<style type="text/css">
    select{background-color: #000;color:white; border:0px solid; }
</style>

<?php
//if nie ma usera w sesji lub w bazie
// sory, ale musisz byc zalogowanym 

include("czyJest.php");

//gdy sesja z loginem istnieje
if($pokazStrone==1){

	// gdy !brak uprawnien
	if( !($_SESSION['uprawnienia']==4) && !($_SESSION['uprawnienia']==5) )
		{	
            if(!isset($_SESSION['jer']))
            $_SESSION['jer']=date('Y');

            if(!isset($_SESSION['mc']))
            $_SESSION['mc']=date('m');

?>

 <nav>
            <div class='menu'>
                <i class='icon-menu d-none'></i>
                <img class='d-none d-md-block' src='img/2.svg'>
                <img class='d-md-none d-block' src='img/3.1.svg'>
                <i class='icon-user d-none'></i>
                <ul class='menu-list'>
                    <li><a id=index  href='index.php' >POKAŻ WYJAZDY</a></li>
                      <li><a id=zgloszenia href="zgloszenia.php" >POKAŻ ZGŁOSZENIA
                        <?php if(isset($_SESSION['uprawnienia']) && ( $_SESSION['uprawnienia']==3) )
                        { ?>/DODAJ WYJAZD<?php }  //"dodaj wyjazdy" tylko gdy spedytor lub admn ?>
                        </a></li>
                    <?php if($_SESSION['uprawnienia']!=1){?> 
                   
                    <?php if(isset($_SESSION['uprawnienia']) && ( $_SESSION['uprawnienia']==3) )
                        { ?><li><a id=edycjaWyjazdu href="edycja.php" >EDYTUJ WYJAZD</a></li>
                        <li><a id=usun href="usun.php"  >USUŃ WYJAZD</a></li> <?php }  //to samo co wyzej?>
                <li><a id=wyslijZgloszenie href="zgloszeniadodaj.php" >WYŚLIJ ZGŁOSZENIE</a></li>
                <li><a id=usunZgloszenie href="zgloszeniaZmien.php" class=selected >USUŃ ZGŁOSZENIE</a></li>
                <?php
                }else
                {
                    //panel admina
                    ?>
                    <li><a id=wyslijZgloszenie href="zgloszeniadodaj.php" >WYŚLIJ ZGŁOSZENIE</a></li>
                    <li><a id=usunZgloszenie href="zgloszeniaZmien.php" class=selected>USUŃ ZGŁOSZENIE</a></li>
                    <li><a id=DodajPracownika  href='adminDodaj.php' >DODAJ PRACOWNIKA</a></li>
                    <li><a id=ModyfikujPracownika  href='adminUpdate.php'>EDYTUJ DANE PRACOWNIKA</a></li>
                    
                    <?php

                }
                ?>
                </ul>
            </div>
            <div class='logout'>
                <a href='zmienhaslo.php'>Zmień hasło <i class='icon-cog'></i></a>
                <a href='wyloguj.php'><span>WYLOGUJ SIĘ</span></a>
                <?php
                if(isset($_SESSION['login']))
                    echo "<br><p style='color:white;'>".$_SESSION['login']."</p>";
                ?>
            </div>
        </nav>


<div>
<form method=post id=ukryty>
<button id=wyslij name=wyslij style="border:0px solid black;background:black; color:black;"></button>
<button id=wyslij2 name=wyslij2 style="border:0px solid black;background:black; color:black;"></button>
</form>

</div>
 <div id='departure' class='container-fluid'>
        <section class='row'>
            <div class='right col-sm-12 col-md-4'>
             <?php
              include('daty.php');

              ?>    
            </div>
            
<?php
 $rok=$_SESSION['jer'];
        $mc=$_SESSION['mc'];
        $login=$_SESSION['IDlogin'];
  if( $_SESSION['uprawnienia']==3)
$stmt=$pdo->query('SELECT u.UserName, p.nazwaP, z.data, z.Uwagi FROM zgloszenia z, users u, powody p  WHERE  z.idU=u.idU AND z.idP= p.idP AND z.widoczny=1 AND YEAR(DATA)='.$rok.' AND MONTH(DATA)='.$mc.' order by z.data ') or die("<script> alert('nie0')</script>");
//od usera tez!!!!!!

if($_SESSION['uprawnienia']==2 || $_SESSION['uprawnienia']==1)
$stmt=$pdo->query( 'SELECT u.UserName, p.nazwaP, z.data, z.Uwagi FROM zgloszenia z, users u, powody p  WHERE  z.idU=u.idU AND z.idP= p.idP AND z.widoczny=1 AND u.idU="'.$login.'" AND YEAR(DATA)='.$rok.' AND MONTH(DATA)='.$mc.'  order by z.data  ') or die("<script> alert('nie2')</script>");

 $licznik=0;
       // $zapytanie=$stmt->fetch(PDO::PARAM_NULL);
while($rowF=$stmt->fetch(PDO::FETCH_ORI_NEXT))
    {
        $licznik++;
        if($licznik==1)
            break;
    }
$stmt->closeCursor();
if($licznik==1)
{
    ?>


             <div class='col-sm-12 col-md-8 left'>

<table >
    <caption><?php echo $_SESSION['jer']; ?></caption>
	<th > Login </th>
	<th > Powód </th> 
	<th > Kiedy? </th> 
	<th > Uwagi </th>
	<th > USUŃ </th>

<?php


$login=$_SESSION['IDlogin'];

$rok=$_SESSION['jer'];
$mc=$_SESSION['mc'];
// if login usera to spedytor lub admin
if($_SESSION['uprawnienia']==1 || $_SESSION['uprawnienia']==3)
$stmt=$pdo->query('SELECT z.idZ, u.UserName, p.nazwaP, z.data, z.Uwagi FROM zgloszenia z, users u, powody p  WHERE  z.idU=u.idU AND z.idP= p.idP AND z.widoczny=1 AND YEAR(DATA)='.$rok.' AND MONTH(DATA)='.$mc.' order by z.data ') or die("<script> alert('nie1')</script>");

//gdy zwykly user
if($_SESSION['uprawnienia']==2)
$stmt=$pdo->query('SELECT z.idZ, u.UserName, p.nazwaP, z.data, z.Uwagi FROM zgloszenia z, users u, powody p  WHERE  z.idU=u.idU AND z.idP= p.idP AND z.widoczny=1 AND u.idU='.$login.' AND YEAR(DATA)='.$rok.' AND MONTH(DATA)='.$mc.' order by z.data ') or die("<script> alert('nie2')</script>");



while ($row=$stmt->fetch(PDO::FETCH_ORI_NEXT) ) {
	echo "<tr>
			<td >".$row[1]."</td> 
			<td >".$row[2]."</td>
			<td >".$row[3]."</td> 
			<td >".$row[4]."</td>
			<form method=post><td ><input type=checkbox name=".$row[0]."></td>
		</tr>";
}
$stmt->closeCursor();

?>
</table>
<td ><input type=submit value='USUŃ' name=deletetuj></td>
</form>

<?php
}
    else
    {
    echo "<p style=color:white;font-size:2em;>Brak zgłoszeń dla wybranego okresu</p>";
    }    
?>

 </div>

<?php
	}
	else
	echo "BRAK UPRAWNIEŃ DO WYŚWIETLENIA TEJ STRONY";
}
else
header("Location:logowanie.php");
?>



<?php
if(isset($_POST['deletetuj']))
{

	$stmt=$pdo->query("SELECT idZ FROM zgloszenia");
	while($row=$stmt->fetch(PDO::FETCH_ORI_NEXT))
		if(isset($_POST[$row[0]]))
	$pdo->query("UPDATE zgloszenia SET widoczny=0 WHERE idZ='$row[0]' ");
	
	$stmt->closeCursor();

echo'<script type="text/javascript">
    window.alert("Usunięcie powiodło się");
    location.href="zgloszeniaZmien.php";
</script>';
}

?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script src='script.js'></script>
</body>

</html>