<!DOCTYPE html>
<html>
<head>
	<title>zmien swoje haslo</title>
	  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel='stylesheet' href='fontello-246a136e/css/fontello.css'>    <link rel='stylesheet' href='style.css'>
</head>
<body>

<?php
session_start();
if(isset($_SESSION['login']))
{
	$login=$_SESSION['login'];
	
	
?>
	 <?php
    include('nav.php');
    ?>
    <div id='change' class='container-fluid'>
        <section class='row'>
            <div class='col-12'>
                <h1>ZMIEŃ HASŁO</h1>
                <form method=post>
                    
                    <div class='form-group'>
                        <label for='repassword'>NOWE HASŁO</label>
                        <input id='repassword' type='password' name=haslo>
                    </div>
                    <input  type='submit' value='ZATWIERDŹ' name=zmienH >
                </form>
            </div>
        </section>
    </div>

<?php
	
	if(isset($_POST['zmienH']))
	{
		$haslo=$_POST['haslo'];
		$haslo=md5($haslo);
		include('baza.php');
		$pdo->query("UPDATE users SET Password='$haslo' WHERE UserName='$login' ") or die("<script> alert('nope')</script>");
		echo "<script>alert('haslo zostalo zmienione')</script>";
	}
}
else{
	header("Location:logowanie.php");
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