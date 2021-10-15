<!DOCTYPE html>
<html>
<head>
	<title>Dodaj zgloszenie</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src=js.js></script>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel='stylesheet' href='fontello-246a136e/css/fontello.css'>
    <link rel='stylesheet' href='style.css'>
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
    </style>
<?php
//if nie ma usera w sesji lub w bazie
// sory, ale musisz byc zalogowanym 

include("czyJest.php");

//gdy sesja z loginem istnieje

if($pokazStrone==1){

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
                        <li><a id=usun href="usun.php"  >USUŃ WYJAZD</a></li> <?php }  //to samo co wyzej?>
                
                <li><a id=wyslijZgloszenie href="zgloszeniadodaj.php" class=selected >WYŚLIJ ZGŁOSZENIE</a></li>

                <li><a id=usunZgloszenie href="zgloszeniaZmien.php" >USUŃ ZGŁOSZENIE</a></li>

                <?php
                }else
                {
                    //panel admina
                    ?>
                    <li><a id=wyslijZgloszenie href="zgloszeniadodaj.php" class=selected >WYŚLIJ ZGŁOSZENIE</a></li>
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


    <div class='add' class='container-fluid'>
        <section class='row'>
            <div class='col-12'>
                <h1>WYŚLIJ ZGŁOSZENIE</h1>
    
                <form method=post >
                <div class='form-group'>
                    <label for='reason'>POWÓD</label>
                    <select id='reason' name=powody required>
                        <option value='' selected hidden  > Wybierz Powód </option>"; 

<?php

$stmt=$pdo->query("SELECT * FROM powody"); 

while($row=$stmt->fetch(PDO::FETCH_ORI_NEXT))
                    echo "<option value=$row[0]>$row[1]</option>";
$stmt->closeCursor();
?>
                     </select>
                </div>
                <div class='form-group'>
                     <label for='date'>DATA</label>
                     <input id='date' type='date' name='data' required>
                </div>


                <div class='form-group'>
                    <label for='comments'>UWAGI</label>
                    <textarea id='comments' name=uwagi rows='3' cols='72'> </textarea>
                </div>

                <input type=submit name=dodajZgloszenie value=ZAPISZ>
        </form>    
    </div>
        


    <br><br><br><br>
    <form method=post>
    	<div class='form-group'>
	   <label for='reasonadd'>DODAJ POWÓD</label>
         <input id='reasonadd' name=nowyPowod required></div>
         
         <input type=submit name=dodajPowod value='Dodaj Powód' >

    </form>
</section>
</div>

<?php

if(isset($_POST['dodajZgloszenie']))
	{

        if(
            $_SESSION['IDlogin']==null ||
            $_POST['data']==null       ||
            $_POST['powody']==null     ||
            $_POST['uwagi']==null
        )

        {
            echo'<script type="text/javascript">
                window.alert("Uzupełnij najpierw wszystkie pola!");
                location.href="zgloszeniadodaj.php";
            </script>';
        }
        else
        {
		
        $login=$_SESSION['IDlogin'];
		$powod=$_POST['powody'];
		$data=$_POST['data'];
		$uwagi=$_POST['uwagi'];
		$widoczny=1;

		$pdo->query("INSERT INTO zgloszenia VALUES (null,'$login','$powod','$data','$uwagi','$widoczny')") or die("<script> alert('nope')</script>");

    echo'<script type="text/javascript">
        window.alert("Wszelkie zmiany w tabeli wyjazdy zostały zapisane");
        location.href="zgloszeniadodaj.php";
    </script>';
	}
}

if(isset($_POST['dodajPowod']))
	{
        if($_POST['nowyPowod']==null)
        {
          echo'<script type="text/javascript">
            window.alert("Wprowadź najpierw powod");
            location.href="zgloszeniadodaj.php";
        </script>';  
        }
        else
        {

		$nowypowod=$_POST['nowyPowod'];
		$pdo->query("INSERT INTO powody VALUES (null,'$nowypowod')");

        echo'<script type="text/javascript">
          window.alert("Dodano nowy powod do listy");
          location.href="zgloszeniadodaj.php";
     </script>';
      }
	}
}
else
	{
header("Location:logowanie.php");}



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