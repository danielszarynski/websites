

<!DOCTYPE html>
<html>
<head>
	<title>Edytuj wyjazdy</title>
		 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel='stylesheet' href='fontello-246a136e/css/fontello.css'>
    <link rel='stylesheet' href='style.css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src=./js.js></script>
</head>
<body> 
<style>
	select{background-color: #000;color:white; border:0px solid; margin:0 auto; text-align:center;}

	#daty>input:disabled{background-color: #000;color:white;border:0px, solid; }
	#daty>input{width:100%;text-align:center; }
	#godz>input:disabled{background-color: #000;color:white;border:0px, solid; }
	#godz>input{width:100%;text-align:center; }

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

<?php
//sprawdźmy czy zalogowany user moze zobaczyc strone - i czy wgl jest w bazie, czy nas nie oszukal w jakis sposob na ekranie logowania
include('czyJest.php');

// nie pozwol zobaczyć strony zablokowanym i usunietym userom (3-spedytor, 1-admin) 
if($pokazStrone==true)
if($_SESSION['uprawnienia']==3 || $_SESSION['uprawnienia']==1){

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
                    <li><a id=index  href='index.php'  >POKAŻ WYJAZDY</a></li>
                      <li><a id=zgloszenia href="zgloszenia.php" >POKAŻ ZGŁOSZENIA
                        <?php if(isset($_SESSION['uprawnienia']) && ( $_SESSION['uprawnienia']==3) )
                        { ?>/DODAJ WYJAZD<?php }  //"dodaj wyjazdy" tylko gdy spedytor lub admn ?>
                        </a></li>
                    <?php if($_SESSION['uprawnienia']!=1){?> 
                   
                    <?php if(isset($_SESSION['uprawnienia']) && ( $_SESSION['uprawnienia']==3) )
                        { ?><li><a id=edycjaWyjazdu href="edycja.php" class=selected>EDYTUJ WYJAZD</a></li>
                        <li><a id=usun href="usun.php"  >USUŃ WYJAZD</a></li> <?php }  //to samo co wyzej?>
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
<form method=post name=wyjazdyEdytowalne id=wyjazdyEdytowalne>


<table name=wyjazdy id=wyjazdy >
	<caption><?php echo $_SESSION['jer']; ?></caption>
<tr>	
<th >Data</th> <th>Godzina</th><th>Trasa</th> <th >Główny kierowca</th><th>Kierowca pomocniczy</th>	</tr>

<?php
include("baza.php");

$rok=$_SESSION['jer'];
$mc=$_SESSION['mc'];
//----pobierz wyjazdy i zespoly tylko z zadango miesiaca ... aktualnie na stałe, ale będzie wqybieralne po zmiennej
$stmt = $pdo->query('SELECT w.idW,w.Data,w.Godzina,t.idT,t.Trasa,ts.Kierowca,ts.idTeam
	FROM wyjazdy w, trasa t , teams ts
	WHERE  t.idT=w.Trasa AND w.idW=ts.idW AND MONTH(Data)='.$mc.' AND YEAR(Data)='.$rok.'
	ORDER BY Data ');




$idw=0;
//to samo co przy edycji,tyle ze krócej
while ($row=$stmt->fetch(PDO::FETCH_ORI_NEXT) ) 
      {

      	if($idw!=$row[0])
      		{
      		echo "<tr name=zestawWyjazdow>";
      		echo " 
      			<td  id=daty onClick=odblokuj('daty_".$row[0]."') ><input type=date disabled name='daty_".$row[0]."' id='daty_".$row[0]."' value='".$row[1]."'></td>
      			<td  id=godz onClick=odblokuj('godz_".$row[0]."') ><input type=time disabled name='godz_".$row[0]."' id='godz_".$row[0]."' value='".substr($row[2], 0, 5)."'></td>

      			<td onClick=odblokuj('trasa_".$row[0]."')  >

      			<select name='trasa_".$row[0]."' id='trasa_".$row[0]."'>
      			<option disabled selected hidden value='".$row[3]."'  >".$row[4]."</option>";
      			
      			$stmt2=$pdo->query("SELECT idT, Trasa FROM trasa WHERE ukryta=0");
      			
      			while ($row2=$stmt2->fetch(PDO::FETCH_ORI_NEXT) ) {
      				echo "<option  value='".$row2[0]."'>".$row2[1]."</option>";
      			}
      
      			echo "</select></td>";
      			$stmt2->closeCursor();

      				
      			echo "<td  onClick=odblokuj('kierowca_".$row[6]."',".$row[0].") >
      			
      			<select  name='kierowca_".$row[6]."' id='kierowca_".$row[6]."'>
      			<option selected hidden value='".$row[5]."'>".$row[5]."</option>";

      			$stmt3=$pdo->query("SELECT UserName FROM users WHERE AccountType=2 ");

      			while ($row3=$stmt3->fetch(PDO::FETCH_ORI_NEXT) ) {
      				if($row3[0]!='')
      				echo"<option value='".$row3[0]."'>".$row3[0]."</option> ";
      			}

      			echo "</select></td>";
      			$stmt3->closeCursor();


      		$idw=$row[0];
      		}
		else      	
			{	
			echo "<td onClick=odblokuj('kierowca_".$row[6]."',".$row[0].")>
			
      			<select  name='kierowca_".$row[6]."'  id='kierowca_".$row[6]."'>
      			<option  selected hidden value='".$row[5]."'>".$row[5]."</option>";

      			$stmt4=$pdo->query("SELECT UserName FROM users WHERE AccountType=2 OR (AccountType=4 AND idU=1)   ");

      			while ($row4=$stmt4->fetch(PDO::FETCH_ORI_NEXT) ) {
      				echo"<option value='".$row4[0]."'>".$row4[0]."</option> ";
      			}

      			echo "</select></td> ";
      			$stmt4->closeCursor();
      		echo "</tr>";
      		}
      	
      		
      	}
      
 $stmt->closeCursor();
echo "</table>
   </div>";
   }
 else
 {
    echo "<p style=color:white;font-size:2em;>Brak danych dla wybranego okresu</p>";
 }        

        echo"</section>
    </div>";
//echo "<input type=submit value='ZAPISZ ZMIANY' name=saveCh>";

?>


</form>


<?php

if(isset($_POST['wyslijZmiany']))
{

$stmt=$pdo->query("SELECT w.idW, t.idTeam FROM wyjazdy w, teams t WHERE w.idW=t.idW  ORDER by w.Data");
$bylo=0;

while($row=$stmt->fetch(PDO::FETCH_ORI_NEXT) )
{
	$trasa="trasa_".$row[0] ;
	$kierowca="kierowca_".$row[1];
	$data="daty_".$row[0];
	$godz="godz_".$row[0];
	if(isset($_POST[$trasa]))
	{

		$gdzie=$_POST[$trasa];
		//id wybranej trasy oraz id wyjazdu 
		//echo "<br> id wyjazdu: ".$row[0]." id trasy: ".$gdzie;  //za duzo razy sie powtarza, trzeba zrobic zeby pomijalo te id ktore juz wystapily-tablica pamiec i bd git 
		$idw=$row[0];
		//aktualizuj where idw=row[0]
		//UPDATE `wyjazdy` SET `idW`=[value-1],`Data`=[value-2],`Trasa`=[value-3] WHERE 1
		$pdo->query("UPDATE wyjazdy SET Trasa='$gdzie' WHERE idW='$idw' ") or die("<script> alert('bez trasy')</script>");
		
		$bylo=1;


	}


	if(isset($_POST[$data]))
	{
		$idw=$row[0];
		$daty=$_POST[$data];
		//echo "<br> id wyjazdu: ".$row[0]." data: ".$daty;
		$pdo->query("UPDATE wyjazdy SET Data='$daty' WHERE idW='$idw' ") or die("<script> alert('bez daty')</script>");
		$bylo=1;
	}

	if(isset($_POST[$godz]))
	{
		$idw=$row[0];
		$godz=$_POST[$godz];
		//echo "<br> id wyjazdu: ".$row[0]." data: ".$daty;
		$pdo->query("UPDATE wyjazdy SET Godzina='$godz' WHERE idW='$idw' ") or die("<script> alert('bez godz')</script>");
		$bylo=1;
	}

	if(isset($_POST[$kierowca]))
	{
		$idw=$row[0];
		$idTm=$row[1];
		$kierowca=$_POST[$kierowca];
		//echo "<br> id teams: ".$row[1]." id kierowcy: ".$kierowca;  
		//UPDATE `teams` SET `idTeam`=[value-1],`Kierowca`=[value-2],`idW`=[value-3] WHERE 1
		$pdo->query("UPDATE teams SET Kierowca='$kierowca' WHERE idW='$idw' AND idTeam=$idTm ") or die("<script> alert('bez team')</script>");
		//aktualizuj  where idW = $row[0] and idteam=$row[1]
		$bylo=1;
	}



}

if($bylo==1)
{
	$kto=$_SESSION["IDlogin"];

        $datasString=date("Y-m-d H:i:s");
       // echo "<p style=color:white;>".$kto." ".$datasString."</p>";
        $pdo->query("INSERT INTO updatetable VALUES (null,'$datasString','$kto')") or die("<script> alert('cos poszlo nie tak z update')</script>");
}

echo'<script type="text/javascript">
window.alert("Zaktualizowano wyjazdy");
location.href="edycja.php";
</script>';


$stmt->closeCursor();


}


}
else
echo "spadaj";























/*

//wstepny idw potrzebny dla dlaeszego skryptu 
$idw=0;
 
//skrypt tworzy zablokowane inputy z danymi z bazy, po kliknięciu input się odblokowuje, i można wprowadzac zmiany
//gdy wpisze sie dane nie będce powizane-tj nie bedace w bazie to input zaswieca sie na czerwono -czyWbazie
while($row = $stmt->fetch(PDO::FETCH_ORI_NEXT))
      {
// jezeli poprzednie idw nie jest takie samo jak aktualne
      	if($idw!=$row[0])
      		{
      			//wyswietl 1. kierowce
      		echo "<tr name=zestawWyjazdow>";
      		echo "
      			<td class=ramka id=daty name=daty>".$row[1]."</td>
      			
      			<td class=ramka onClick=odblokuj('trasa_".$row[0]."')  ><input onBlur=czyWbazie('trasa_".$row[0]."') style='background:white;width:95%; text-align:center; color:black;box-shadow:none !important;border:0px;' disabled value='".$row[2]."' id=trasa_".$row[0]." name=trasa_".$row[0]." ></td>

      			<td class=ramka  onClick=odblokuj('user_".$row[4]."') ><input onBlur=czyWbazie('user_".$row[4]."') style='background:white;width:95%; text-align:center; color:black;box-shadow:none !important;border:0px;' disabled value='".$row[3]."' id=user_".$row[4]." name=user_".$row[4]."></td>";
      		//update idw
      		$idw=$row[0];
      		}
		else      	
			{	
				//jezeli jest takie samo, to wyswietl 2. kierowce
			echo "<td class=ramka  onClick=odblokuj('user_".$row[4]."') ><input onBlur=czyWbazie('user_".$row[4]."') style='background:white;width:95%; text-align:center; color:black;box-shadow:none !important;border:0px;' disabled value='".$row[3]."' id=user_".$row[4]." 
			name=user_".$row[4]."></td>";
      		echo "</tr>";

      		}
      	
      		
      	}
      
      
 $stmt->closeCursor();
*/
//-----------koniec-------tabela--gotowa----------------------------------------------------------




//gdy chcemy zaktualizowac baze

/*
if(isset($_POST['wyslijZmiany']))
{

$stmt = $pdo->query('SELECT * FROM wyjazdy,trasa,teams,users ');


	while($row = $stmt->fetch(PDO::FETCH_ORI_NEXT))
	{
		//odszyfruj id usera i id trasy zeby moc je wykorzystac to zlokalizowania tego co potrzebujemy
		$ktoryPracownik='user_'.$row[5];
		$ktoraWyprawa='trasa_'.$row[0];
		
		if(isset($_POST[$ktoraWyprawa])) 
			{
				$gdzie=$_POST[$ktoraWyprawa];
				
					if($row[4]==$gdzie)
						{
							$gdzieNumer=$row[3];
							$tab=explode("_", $ktoraWyprawa);
							$id=$tab[1];
							$pdo->query(" UPDATE wyjazdy SET Trasa='$gdzieNumer' WHERE idW=$id "); 
							
						}
			}
		if(isset($_POST[$ktoryPracownik])) 
			{
				$kto=$_POST[$ktoryPracownik];
				
				if($row[9]==$kto)
					{
						$tab2=explode("_", $ktoryPracownik);
						$id2=$tab2[1];
						$pdo->query(" UPDATE teams SET Kierowca='$kto' WHERE idTeam=$id2 ");

					}

				
			}
			 
	}

 $stmt->closeCursor();
*/




//}


if($pokazStrone==0 )
{
header("Location:logowanie.php");
	}

if($_SESSION['uprawnienia']==4 || $_SESSION['uprawnienia']==5)
	{
		echo "<p style='color:red;'>masz zablokowane lub usunięte konto</p>"; 
		$_SESSION['login']=null;
		$_SESSION['passy']=null;
		$_SESSION['moce']=null;
		$_SESSION['uprawnienia']=null;
		echo "<a href=logowanie.php><button>Przejdź do strony logowania</button></a>";
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