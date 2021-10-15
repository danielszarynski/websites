<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel='stylesheet' href='fontello-246a136e/css/fontello.css'>    <link rel='stylesheet' href='style.css'>
	<title>Zgloszenia</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src=js.js></script>
</head>
<body>

<style type="text/css">
    select{background-color: #000;color:white; border:0px solid; }
    html body .add section form .form-group input {
            color: #fff;
  padding: 4px;
  font-weight: 500;
  font-size: 1.6rem;
  letter-spacing: 2px;
  display: block;
  background-color: #7a7a7a;
  border: none;
 text-transform: none;
         }
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

//-------------------------------------------menu-------------------------------------------------------------------------
?>

  <nav>
            <div class='menu'>
                <i class='icon-menu d-none'></i>
                <img class='d-none d-md-block' src='img/2.svg'>
                <img class='d-md-none d-block' src='img/3.1.svg'>
                <i class='icon-user d-none'></i>
                <ul class='menu-list'>
                    <li><a id=index  href='index.php' >POKAŻ WYJAZDY</a></li>
                      <li><a id=zgloszenia href="zgloszenia.php" class=selected>POKAŻ ZGŁOSZENIA
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
 <!--------------------pomocny div, jquery klika w razie potrzeby----------------------------------------------------------------->
<div>
<form method=post id=ukryty>
<button id=wyslij name=wyslij style="border:0px solid black;background:black; color:black;"></button>
<button id=wyslij2 name=wyslij2 style="border:0px solid black;background:black; color:black;"></button>
<button id=wyslij3 name=wyslij3 style="border:0px solid black;background:black; color:black;"></button>
</form>

</div>
<!------------------------------------------------------------------------------------------------------------------------------->
<div id='show' class='container-fluid'>
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

if($licznik>=1)
{
    ?>
            <div class='col-sm-12 col-md-8 left'>

<table >
	<caption><?php echo $_SESSION['jer']; ?></caption>
	<th > Login </th>
	<th > Powód </th> 
	<th > Kiedy? </th> 
	<th > Uwagi </th>

<?php






// if login usera to spedytor 
if($_SESSION['uprawnienia']==3)
$stmt=$pdo->query('SELECT u.UserName, p.nazwaP, z.data, z.Uwagi FROM zgloszenia z, users u, powody p  WHERE  z.idU=u.idU AND z.idP= p.idP AND z.widoczny=1 AND YEAR(DATA)='.$rok.' AND MONTH(DATA)='.$mc.' order by z.data ') or die("<script> alert('nie1')</script>");

//gdy zwykly user lub admin
if($_SESSION['uprawnienia']==2 || $_SESSION['uprawnienia']==1 )
$stmt=$pdo->query( 'SELECT u.UserName, p.nazwaP, z.data, z.Uwagi FROM zgloszenia z, users u, powody p  WHERE  z.idU=u.idU AND z.idP= p.idP AND z.widoczny=1 AND u.idU="'.$login.'" AND YEAR(DATA)='.$rok.' AND MONTH(DATA)='.$mc.'  order by z.data  ') or die("<script> alert('nie2')</script>");

// ---------------------------------tabelka zgłoszen-------------------------------

foreach ($stmt as $row) {
	echo "<tr>
			<td >".$row[0]."</td> 
			<td >".$row[1]."</td>
			<td >".$row[2]."</td> 
			<td >".$row[3]."</td>
		</tr>";
}
$stmt->closeCursor();

?>
</table>
 
            </div>

<?php
}
    else
    {
    echo "<p style=color:white;font-size:2em;>Brak zgłoszeń dla wybranego okresu</p>";
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






<?php
// -------------------gdy spedytor  to pokaz "dodaj wyjazd"----------------------------------------------
if( $_SESSION['uprawnienia']==3)
{
?>
<br><br><br><br>
<div class='add' class='container-fluid'>
        <section class='row'>
            <div class='col-12'>
                <h1>DODAJ WYJAZD</h1>

	
                <form method=post>
                <div class='form-group'>
                        <label for='who'>Główny kierowca</label>
                        <select id='who' name=kierowca1 required>
                        <option value='' selected hidden >Wybierz Kierowcę</option>

<?php

$stmt=$pdo->query("SELECT idU, UserName FROM users WHERE AccountType=2");
    while($row=$stmt->fetch(PDO::FETCH_ORI_NEXT))
	   {      
             if($row[0]!=1)
                    echo "<option value=".$row[1].">".$row[1]."</option>";
        }
$stmt->closeCursor();
?>
                    </select>
                </div>

                <div class='form-group'>
                        <label for='with'>Kierowca pomocniczy</label>
                        <select id='with' name=kierowca2 required>
                        <option value='' selected hidden >Wybierz Kierowcę</option>
<?php
$stmt=$pdo->query("SELECT idU, UserName FROM users WHERE AccountType=2 OR (AccountType=4 AND idU=1)");
while($row=$stmt->fetch(PDO::FETCH_ORI_NEXT))
	                   echo "<option value=".$row[1].">".$row[1]."</option>";
$stmt->closeCursor();
?>
                    </select>
                </div>

                        <div class='form-group'>
                        <label for='route' >TRASA</label>
                        <select id='route' name=trasa required>
                        <option value='' selected hidden >Wybierz Trasę</option>
<?php
$stmt=$pdo->query("SELECT * FROM trasa where ukryta=0");
while($row=$stmt->fetch(PDO::FETCH_ORI_NEXT))
	                   echo "<option value=".$row[0].">".$row[1]."</option>";
$stmt->closeCursor();
?>
                        </select>
                    </div>



                        <div class='form-group'>
                        <label for='date'>DATA</label>
                        <input id='date' type='date' name='data' required>
                        </div>

                        <div class='form-group'>
                        <label for='godz'>Godzina</label>
                        <input id='godz' type='time' name='godz' required></div>
                        <input type=submit name=dodajWYJAZD value=ZATWIERDŹ>
                </form>

    <br><br>
    <form method=post>

        <div class='form-group'>
	       <label for ='nowaTrasa'>Wprowadź nowa trasę</label>
	       <input id=nowaTrasa name=nowaTrasa required>
        </div>

        <input type=submit value='Dodaj Trasę' name=dodajTrase>
    </form>



<?php
if($_SESSION['uprawnienia']==1 || $_SESSION['uprawnienia']==3)
{ ?>
    <br><br>

    <form method=post>

    <div class='form-group'>
    <label for ='trasy'>Usuń trasę</label>
    <select  id=trasy name=trasy required>
        <option value='' selected hidden >Wybierz</option>
       <?php
       $trasy=$pdo->query("SELECT * FROM trasa where ukryta=0") or die("<script> alert('blad w odczycie tras')</script>");
      while($row=$trasy->fetch(PDO::FETCH_ORI_NEXT))
       echo "<option value=".$row[0].">".$row[1]."</option>";

        ?>
    </select>


    </div>
    <input type=submit value='zatwierdź' name=usunTrasa>
</form>
</section>

<?php
$trasy->closeCursor();
}
/*
if($_SESSION['uprawnienia']==3)
{
   
     echo "<br><br><form method=post>";
    
?>
<div class='form-group'>
    <label for ='trasa'>Edytuj trasę</label>
    <select name=trasa id=trasa onChange=wybierzTrase()>
        <option value='0' selected hidden>Wybierz</option>
       <?php
       $trasy=$pdo->query("SELECT * FROM trasa where ukryta=0") or die("<script> alert('')</script>blad w odczycie tras");
      while($row=$trasy->fetch(PDO::FETCH_ORI_NEXT))
       echo "<option value=".$row[0].">".$row[1]."</option>";

        ?>
    </select>

<?php

echo "</form></section>";


$trasy->closeCursor();
}

?>
<script type="text/javascript">
    
    function wybierzTrase(){
        var trasa=document.getElementById('trasa');
        //console.log(pracownicy.value);
        var idTrasa=trasa.value;
    var znacznik = document.createElement('input');
        znacznik.setAttribute('type', 'hidden');
        znacznik.setAttribute('name', 'ktoraTrasa');
        znacznik.setAttribute('value',idTrasa );
        var kontener = document.getElementById("ukryty");
        kontener.appendChild(znacznik);
        
         $( "button[name=wyslij3]" ).trigger( "click" );
}

</script>

<?php

if(isset($_POST['wyslij3']))
{
 
    $dajTrase=$_POST['ktoraTrasa'];
    $GLOBALS['trasaa']=$dajTrase;
    $trasaa=$pdo->query("SELECT Trasa from trasa where idT='$dajTrase'")or die('<script> alert('')</script>ktora trase??');

    while($row=$trasaa->fetch(PDO::FETCH_ORI_NEXT))
    echo"
    <form method=post>
    <input value='".$row[0]."' name=trasaEdytowana >
    <input type=submit name=zedytowane value=zapisz>
    </form>";
   
   
 $trasaa->closeCursor();

}

 if(isset($_POST['zedytowane']))
    { 
        $dajTrase=$GLOBALS['trasaa'];
        echo $dajTrase;
        $formtrasa=$_POST['trasaEdytowana'];
        $pdo->query("UPDATE trasa SET Trasa='$formtrasa' WHERE idT='$dajTrase' ")or die("<script> alert('')</script><p 'style=color:red;'>nie zrobie update tras</p>");
     echo'<script type="text/javascript">
window.alert("'.$dajTrase.'");
location.href="zgloszenia.php";
</script>';
    }
*/

if(isset($_POST['usunTrasa']))
{

$trasa=$_POST['trasy'];
    
    if ($trasa==0)
    {
        echo "<script >alert('Najpierw Wybierz Trasę');</script>";
    }
    else
    {
       
        $pdo->query("UPDATE trasa SET ukryta=1 WHERE idT='$trasa'")or die("<script> alert('blad w usuwaniu tras')</script>");
        echo'<script type="text/javascript">
           window.alert("Usunieto trase");
            location.href="zgloszenia.php";
        </script>';
    }


}




if(isset($_POST['dodajWYJAZD']))
	{
        if(
            $_POST['kierowca1']==null ||
            $_POST['kierowca2']==null ||
            $_POST['trasa']==null ||
            $_POST['data']==null ||
            $_POST['godz']==null 
            )
        {
            echo'<script type="text/javascript">
            window.alert("Uzupełnij wszystkie pola zanim zatwierdzisz!");
            
            </script>';
        }
        else{
		//echo"poszlo";
		$kiero1=$_POST['kierowca1'];
		$kiero2=$_POST['kierowca2'];
		$tras=$_POST['trasa'];
		$dat=$_POST['data'];
        $godz=$_POST['godz'];
		$pdo->query("INSERT INTO wyjazdy VALUES (null,'$dat','$godz','$tras')" ) or die("<script> alert('nie wrzuce')</script>");
		$stmt=$pdo->query("SELECT idW FROM wyjazdy order by idW  DESC LIMIT 1") or die("<script> alert('nie pobiore')</script>");
		while($row=$stmt->fetch(PDO::FETCH_ORI_NEXT) )
			$wyjazd=$row[0];
		$stmt->closeCursor();

		$pdo->query("INSERT INTO teams VALUES (null,'$kiero1','$wyjazd')");
		$pdo->query("INSERT INTO teams VALUES (null,'$kiero2','$wyjazd')");

        //update daty zmiany wyjazdow
        $kto=$_SESSION["IDlogin"];

        $datasString=date("Y-m-d H:i:s");
       // echo "<p style=color:white;>".$kto." ".$datasString."</p>";
        $pdo->query("INSERT INTO updatetable VALUES (null,'$datasString','$kto')") or die("<script> alert('cos poszlo nie tak z update')</script>");

        echo'<script type="text/javascript">
            window.alert("Wszelkie zmiany w tabeli wyjazdy zostały zapisane");
            location.href="zgloszenia.php";
        </script>';
	}
}


	if(isset($_POST['dodajTrase']))
	{
        if($_POST['nowaTrasa']!=null)
        {
            $trasa=$_POST['nowaTrasa'];
            if(
                (
                strpos($trasa,'1') ||
                strpos($trasa,'2') ||
                strpos($trasa,'3') ||
                strpos($trasa,'4') ||
                strpos($trasa,'5') ||
                strpos($trasa,'6') ||
                strpos($trasa,'7') ||
                strpos($trasa,'8') ||
                strpos($trasa,'9') ||
                strpos($trasa,'0') 

                 )
              )
            {
                echo'<script type="text/javascript">
                window.alert("Trasa nie powinna zawierać cyfr");
                location.href="zgloszenia.php";
        </script>';
                }
                else{
		
		$pdo->query("INSERT INTO trasa VALUES (null,'$trasa',0)")or die("<script> alert('trasa nie dodana')</script>");

		echo'<script type="text/javascript">
                window.alert("Dodano trasę");
                location.href="zgloszenia.php";
        </script>';
        }
       
    }
        else
        {
           echo'<script type="text/javascript">
                window.alert("Nie wprowadzono trasy");
        </script>'; 
        }

	}

}


	}
	else
	echo "BRAK UPRAWNIEŃ DO WYŚWIETLENIA TEJ STRONY";
}
else
header("Location:logowanie.php");
?>
</body>
</html>






















