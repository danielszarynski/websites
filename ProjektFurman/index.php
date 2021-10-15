<!DOCTYPE html>
<html>
<head>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel='stylesheet' href='fontello-246a136e/css/fontello.css'>
    <link rel='stylesheet' href='style.css'>
	<title>tabela</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src=js.js></script>
</head>
<style type="text/css">
    select{background-color: #000;color:white; border:0px solid; }
</style>
<?php

//sprawdźmy czy zalogowany user moze zobaczyc strone - i czy wgl jest w bazie, czy nas nie oszukal w jakis sposob na ekranie logowania
include('czyJest.php');

// nie pozwol zobaczyć strony zablokowanym i usunietym userom (4-zablokowany, 5-usuniety) 
if($pokazStrone==true)
if($_SESSION['uprawnienia']!=4 && $_SESSION['uprawnienia']!=5){

if(!isset($_SESSION['jer']))
$_SESSION['jer']=date('Y');

if(!isset($_SESSION['mc']))
$_SESSION['mc']=date('m');

$kto=$_SESSION['IDlogin'];
if($_SESSION['poLogowaniu']==1 )
{
$stmt=$pdo->query("SELECT * FROM updatetable ORDER BY idUT DESC limit 1") or die("<script> alert('nie mozna zaladowac historii operacji')</script>");
$stmt2=$pdo->query("SELECT DataLogowania from users where idU='$kto' ") or die("<script> alert('ktory user robil update?')</script>");
while($row=$stmt->fetch(PDO::FETCH_ORI_NEXT))
while($row2=$stmt2->fetch(PDO::FETCH_ORI_NEXT))
    if($row[1]>=$row2[0])
        {
            $stmt3=$pdo->query("SELECT UserName from users WHERE idU=$row[2]")or die("<script> alert('ktorego usera mam pobrac?')</script>");
            while($row3=$stmt3->fetch(PDO::FETCH_ORI_NEXT))
                echo "<script> alert('od ostatniego Twojego logowania, ".$row3[0]." zaktualizował tabelę wyjazdy')</script>";
        }
        if(isset($stmt))
        $stmt->closeCursor();
        if(isset($stmt2))
        $stmt2->closeCursor();
        if(isset($stmt3))
        $stmt3->closeCursor();
    $_SESSION['poLogowaniu']=0;
    }
//update datalogowania usera
        $datasString=date("Y-m-d H:i:s");
        $kto=$_SESSION["IDlogin"];
        $pdo->query("UPDATE users SET DataLogowania='$datasString' WHERE idU='$kto' ")or die("<script> alert('nie aktualizuje daty logowania')</script>");
        

//porownaj daty logowania i update tabeli 
//jak tabela nowsza to daj js z info ze byl update, a potem aktualizuj date logowania


?>


<body onLoad=NormalizujTabeleWyjazdy(); >

<!-- -----podstawowe css, do zmiany, tylko na potrzeby back------------------ -->




<!--//--------------------------------tabela wyjazdy--------------------------------------- -->

        <nav>
            <div class='menu'>
                <i class='icon-menu d-none'></i>
                <img class='d-none d-md-block' src='img/2.svg'>
                <img class='d-md-none d-block' src='img/3.1.svg'>
                <i class='icon-user d-none'></i>
                <ul class='menu-list'>
                    <li><a id=index  href='index.php' class=selected >POKAŻ WYJAZDY</a></li>
                      <li><a id=zgloszenia href="zgloszenia.php" >POKAŻ ZGŁOSZENIA
                        <?php if(isset($_SESSION['uprawnienia']) && ( $_SESSION['uprawnienia']==3) )
                        { ?>/DODAJ WYJAZD<?php }  //"dodaj wyjazdy" tylko gdy spedytor lub admn ?>
                        </a></li>
                    <?php if($_SESSION['uprawnienia']!=1){?> 
                   
                    <?php if(isset($_SESSION['uprawnienia']) && ( $_SESSION['uprawnienia']==3) )
                        { ?><li><a id=edycjaWyjazdu href="edycja.php" >EDYTUJ WYJAZD</a></li>
                        <li><a id=usun href="usun.php"  >USUŃ WYJAZD</a></li> <?php }  //to samo co wyzej?>
                <li><a id=wyslijZgloszenie href="zgloszeniadodaj.php" >WYŚLIJ ZGŁOSZENIE</a></li>
                <li><a id=usunZgloszenie href="zgloszeniaZmien.php" >USUŃ ZGŁOSZENIE</a></li>
                <?php
                }else
                {
                    //panel admina
                    ?>
                    <li><a id=wyslijZgloszenie href="zgloszeniadodaj.php" >WYŚLIJ ZGŁOSZENIE</a></li>
                    <li><a id=usunZgloszenie href="zgloszeniaZmien.php" >USUŃ ZGŁOSZENIE</a></li>
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
        include("baza.php");

//-------------------- wpisanie do tabeli wartosci z bazy---------------------------

//po roku i mc

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
                <table name=wyjazdy id=wyjazdy >
                
                <caption><?php echo $_SESSION['jer']; ?></caption>
				<th >Data</th> 
                <th >Godzina</th>
				<th >Trasa</th> 
				<th >Główny kierowca</th>
				<th >Kierowca pomocniczy</th>	

<?php
// na sztywno -na razie -maj i 2020

$stmt = $pdo->query('SELECT w.idW,w.Data,w.Godzina,t.Trasa,ts.Kierowca
    FROM wyjazdy w, trasa t , teams ts
    WHERE t.idT=w.Trasa AND w.idW=ts.idW AND MONTH(Data)='.$mc.' AND YEAR(Data)='.$rok.'
    ORDER BY w.Data ');
$idw=0;
//to samo co przy edycji,tyle ze krócej
foreach($stmt as $row )
      {

      	if($idw!=$row[0])
      		{
      		echo "<tr name=zestawWyjazdow>";
      		echo "
      			<td  id=daty name=daty>".substr($row[1], 5, 9)."</td>
      			<td >".substr($row[2], 0, 5)."</td>
                <td >".$row[3]."</td>
      			<td  >".$row[4]."</td>";
      		$idw=$row[0];
      		}
		else      	
			{	
			echo "<td  name=kierowca>".$row[4]."</td>";
      		echo "</tr>";
      		}
      	
      		
      	}
  
 $stmt->closeCursor();

//-----------koniec-------tabela--gotowa----------------------------------------------------------

?>
				</table>
            </div>


 <?php  
}
    else
    {
    echo "<p style=color:white;font-size:2em;>Brak danych dla wybranego okresu</p>";
    }    
            ?>
        </section>
    </div>



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
<?php
}

	
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

</html>

