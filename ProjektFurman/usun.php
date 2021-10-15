<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel='stylesheet' href='fontello-246a136e/css/fontello.css'>
    <link rel='stylesheet' href='style.css'>
	<title>usun wyjazdy</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
</head>
<body onLoad=NormalizujTabeleWyjazdy();>

<style type="text/css">
  
	select{background-color: #000;color:white; border:0px solid; }
	#tenO {
            margin: 0 auto;
            margin-top:45px;
            background-color: #fd4e18;
            display: flex;
            border: none;
            width: 250px;
            height: 50px;
            text-align: center;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.9rem;
            border-radius: 12px;
            padding: 3px 5px 5px 5px;
            transition: .5s;}


</style>



<!-- -----podstawowe css, do zmiany, tylko na potrzeby back------------------ -->

<?php
//sprawdźmy czy zalogowany user moze zobaczyc strone - i czy wgl jest w bazie, czy nas nie oszukal w jakis sposob na ekranie logowania
include('czyJest.php');

// nie pozwol zobaczyć strony zablokowanym i usunietym userom (4-zablokowany, 5-usuniety) 
if($pokazStrone==true)
if($_SESSION['uprawnienia']==1 || $_SESSION['uprawnienia']==3){

if(!isset($_SESSION['jer']))
$_SESSION['jer']=date('Y');

if(!isset($_SESSION['mc']))
$_SESSION['mc']=date('m');



//--------------------------------tabela wyjazdy---------------------------------------
?>

<nav>
            <div class='menu'>
                <i class='icon-menu d-none'></i>
                <img class='d-none d-md-block' src='img/2.svg'>
                <img class='d-md-none d-block' src='img/3.1.svg'>
                <i class='icon-user d-none'></i>
                <ul class='menu-list'>
                    <li><a id=index  href='index.php'  >POKAŻ WYJAZDY</a></li>
                      <li><a id=zgloszenia href="zgloszenia.php" >POKAŻ ZGŁOSZENIA
                        <?php if(isset($_SESSION['uprawnienia']) && ( $_SESSION['uprawnienia']==3) )
                        { ?>/DODAJ WYJAZD<?php }  //"dodaj wyjazdy" tylko gdy spedytor lub admn ?>
                        </a></li>
                    <?php if($_SESSION['uprawnienia']!=1){?> 
                   
                    <?php if(isset($_SESSION['uprawnienia']) && ( $_SESSION['uprawnienia']==3) )
                        { ?><li><a id=edycjaWyjazdu href="edycja.php" >EDYTUJ WYJAZD</a></li>
                        <li><a id=usun href="usun.php" class=selected >USUŃ WYJAZD</a></li> <?php }  //to samo co wyzej?>
                <li><a id=wyslijZgloszenie href="zgloszeniadodaj.php" >WYŚLIJ ZGŁOSZENIE</a></li>
                <li><a id=usunZgloszenie href="zgloszeniaZmien.php" >USUŃ ZGŁOSZENIE</a></li>
                <?php
                }else
                {
                    //panel admina
                    ?>
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
        $stmt = $pdo->query('SELECT w.idW,w.Data,w.Godzina,t.Trasa,ts.Kierowca
    FROM wyjazdy w, trasa t , teams ts
    WHERE t.idT=w.Trasa AND w.idW=ts.idW AND MONTH(Data)='.$mc.' AND YEAR(Data)='.$rok.'
    ORDER BY w.Data ');
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


<form method=post>
<table name=wyjazdy id=wyjazdy >
	<caption><?php echo $_SESSION['jer']; ?></caption>
<th >Data</th>  <th>Godzina</th><th >Trasa</th><th >Główny kierowca</th><th >Kierowca pomocniczy</th><th> </th>	

<?php
include("baza.php");

//-------------------- wpisanie do tabeli wartosci z bazy---------------------------
$rok=$_SESSION['jer'];
$mc=$_SESSION['mc'];
$stmt = $pdo->query('SELECT w.idW,w.Data,w.Godzina,t.Trasa,ts.Kierowca
	FROM wyjazdy w, trasa t , teams ts
	WHERE t.idT=w.Trasa AND w.idW=ts.idW AND MONTH(Data)='.$mc.' AND YEAR(Data)='.$rok.'
	ORDER BY Data ');

$idw=0;

while($row=$stmt->fetch(PDO::FETCH_ORI_NEXT) )
      {

      	if($idw!=$row[0])
      		{
      		echo "<tr name=zestawWyjazdow>";
      		echo "
      			<td class=ramka id=daty name=daty>".substr($row[1], 5, 9)."</td>
      			<td class=ramka id=godz name=godz>".substr($row[2], 0, 5)."</td>
      			<td class=ramka>".$row[3]."</td>
      			<td class=ramka  >".$row[4]."</td>";
      		$idw=$row[0];
      		}
		else      	
			{	
			echo "<td class=ramka name=kierowca>".$row[4]."</td>";
      		echo "<td class=ramka><input id=usunCHBX type=checkbox name=".$row[0]."></td>";
      		echo "</tr>";
      		}
      	
      		

      	}
     
   
 $stmt->closeCursor();

//-----------koniec-------tabela--gotowa----------------------------------------------------------

?>

</table>
<td><input type=submit id=tenO value=usunZaznaczone name=delejtuj></td>
</form></div>

<?php
}
 else
 {
    echo "<p style=color:white;font-size:2em;>Brak danych dla wybranego okresu</p>";
 }  
?>


</section></div>




<?php
$bylo=0;
if(isset($_POST['delejtuj']))
{
	$stmt = $pdo->query('SELECT idW FROM wyjazdy');
while($row=$stmt->fetch(PDO::FETCH_ORI_NEXT))
	{
		if(isset($_POST[$row[0]]))
			{
				//usun wyjazd o tym id plus zespoly z nim powiazane 
				echo $row[0]."<br>";
				$pdo->query("DELETE FROM wyjazdy WHERE idW=$row[0]");
				$pdo->query("DELETE FROM teams WHERE idW=$row[0]");
				$bylo=1;
			}

	}


	$stmt->closeCursor();
	
if($bylo==1)
{
	$kto=$_SESSION["IDlogin"];

        $datasString=date("Y-m-d H:i:s");
       // echo "<p style=color:white;>".$kto." ".$datasString."</p>";
        $pdo->query("INSERT INTO updatetable VALUES (null,'$datasString','$kto')") or die("<script> alert('cos poszlo nie tak z update')</script>");
}
	
echo'<script type="text/javascript">
window.alert("Wszelkie zmiany w tabeli wyjazdy zostały zapisane");
location.href="usun.php";
</script>';
}





}
if($pokazStrone==0)
header("Location:logowanie.php");


?>










<?php
//-------------ahhhh PDO lepsze od mysqli!!!-----------------------------------------
//$wyjazdy=mysqli_query($klucz,"SELECT w.Data,w.idW,t.Trasa,u.UserName,u.idU,w.idP1,w.idP2 FROM wyjazdy w, users u, trasa t WHERE t.idT=w.Trasa   AND (w.idP1=u.idU OR w.idP2=u.idU) ORDER BY Data   ") or die("nie ma tabeli");

//$idw=0;
//$koniec=0;
//echo sizeof($wyjazdy); 

/*
while($row=mysqli_fetch_array($wyjazdy))
	{


			if($row[1]!=$idw ) 
			{
 				echo "<tr>";
				echo "<td style='border:1px solid black;' id=daty name=daty>".$row[0]."</td>
				<td style='border:1px solid black;padding:0px;'>
					".$row[2]."</td>";$idw=$row[1];}
 		   		
 		   		if($row[4]==$row[5]){
 		   		echo "<td style='border:1px solid black;padding:0px;'>".$row[3]."</td>";$koniec++;}
 		   		else if($row[4]==$row[6])
 		   		{echo "<td style='border:1px solid black;padding:0px;'>".$row[3]."</td>";$koniec++;}
 		   		else{
 		   		echo "<td style='border:1px solid black;padding:0px;'></td>";}
 		   
				


if($koniec==2 ) {				
echo "</tr>";
$koniec=0;}





}
?>



<?php
*/
//dobra, , trzeba to zrobic js
/*
$ile=1;
for($i=0;$i<sizeof($rows);$i++)
{
	echo "<tr>";
if($rows[$i][1]!=$rows[$i+1][1]){
	echo"
<td style='border:1px solid black;'>".$rows[$i][1]."</td><td style='border:1px solid black;'>".$rows[$i][2] ."</td> <td style='border:1px solid black;'>".$rows[$i][3] ."</td>";
	
$ile=1;
}

else{
	$ile++;
	echo"<td ></td><td style='border:1px solid black;'>".$rows[$i][2] ."</td> <td style='border:1px solid black;'>".$rows[$i][3] ."</td>";

   }
 echo "</tr>";
 }
*/
//-----------------------------------------koniec mysqli---------------------------------------

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

