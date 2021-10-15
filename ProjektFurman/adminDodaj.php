<!DOCTYPE html>
<html>
<head>
	<title>Dodaj pracownika</title>
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
		 html body .add section form .form-group select{
		 	color: #fff;
  padding: 4px;
  font-weight: 500;
  font-size: 1.6rem;
  letter-spacing: 2px;
  display: block;
  background-color: #7a7a7a;
  border: none;
 text-transform: none;
 width:30%;
		 }
	</style>
	<!--
<div>
	<form method=post id=ukryty>
		<button  id=wyslij name=wyslij style="border:0px solid white; color:white;"></button>
	</form>

</div>
-->
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
                <li><a id=usunZgloszenie href="zgloszeniaZmien.php"  >USUŃ ZGŁOSZENIE</a></li>
                <?php
                }else
                {
                    //panel admina
                    ?>
                    <li><a id=wyslijZgloszenie href="zgloszeniadodaj.php" >WYŚLIJ ZGŁOSZENIE</a></li>
                    <li><a id=usunZgloszenie href="zgloszeniaZmien.php" >USUŃ ZGŁOSZENIE</a></li>
                    <li><a id=DodajPracownika  href='adminDodaj.php' class=selected >DODAJ PRACOWNIKA</a></li>
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


    <div class='add' class='container-fluid'>
        <section class='row'>
            <div class='col-12'>

<form method=post>

	<div class='form-group'>
		<label>Login</label>
		<input name=login required>
	</div>

	<div class='form-group'>
		 <label>Haslo</label>
		 <input name=haslo required>
		</div>

		<div class='form-group'>
			<label>Imie</label>
			<input name=imie required>
		</div>

		<div class='form-group'>
		<label>Nazwisko</label>
		<input name=nazwisko required>
	</div>
		
		<?php
		include("baza.php");
		$stmt=$pdo->query("SELECT * FROM uprawnienia ");
			echo "<div class='form-group'>

			<label>Uprawnienia</label><select  id='Uprawnienia' onChange=wybierzUprawnienia() name=Uprawnienia required>";
			echo "<option value='' selected hidden > Wybierz Typ Konta </option>";
		while($row=$stmt->fetch(PDO::FETCH_ORI_NEXT))
		echo "<option value=$row[0]>$row[1]</option>";

		echo"</select></div>";
		$stmt->closeCursor();
		?>
		
		<div class='form-group'>
			<label>Email</label>
			<input name=mail required>
		</div>

		<input type=submit value='dodaj' name=dodajP>
</form>

</div><
</section>
</div>

<script type="text/javascript">
/*	
	function wybierzUprawnienia(){
		var upr=document.getElementById('Uprawnienia');
		//console.log(pracownicy.value);
		var idUpr=upr.value;
	var znacznik = document.createElement('input');
		znacznik.setAttribute('type', 'hidden');
		znacznik.setAttribute('name', 'idupr');
		znacznik.setAttribute('value',idUpr );
		var kontener = document.getElementById("ukryty");
		kontener.appendChild(znacznik);
		
 		// $( "button[name=wyslij]" ).trigger( "click" );
}
*/
</script>

<?php
if(isset($_POST['dodajP']))
{
	
if(
	$_POST['login']==null || 
	$_POST['imie']==null || 
	$_POST['nazwisko']==null || 
	$_POST['mail']==null || 
	$_POST['Uprawnienia']==null ||
	$_POST['haslo']==null

)
        {
          echo'<script type="text/javascript">
			window.alert("Uzupełnij wszystkie pola");
            location.href="admindodaj.php";
        </script>';  
        }
        else
        {


	$login=$_POST['login'];
	$imie=$_POST['imie'];
	$nazwisko=$_POST['nazwisko'];
	$mail=$_POST['mail'];
	$upr=$_POST['Uprawnienia'];
	$haslo=$_POST['haslo'];
	$haslo=md5($haslo);
$data=date("Y-m-d");
	$stmt=$pdo->query("INSERT INTO users VALUES (null,'$login' ,'$haslo', '$imie', '$nazwisko', '$upr','$data','$mail') ") or die ("<script> alert('nope')</script>");

?>
<script type="text/javascript">
	alert("dodano pracownika");
</script>

<?php
}}

?>


<?php
	}
	else
	echo "BRAK UPRAWNIEŃ DO WYŚWIETLENIA TEJ STRONY";
}
else
header("Location:logowanie.php");
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