<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src=js.js></script>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel='stylesheet' href='style.css'>
</head>
<body>
	

    <div id='login' class='container-fluid'>
        <div class='row'>
            <div class='col-12 logo'>
                <img src='img/2.svg'>
            </div>
        </div>
        



        <div class='row text-center'>
            <div class='col-12'>
                <form method=post>
                    <div class='form-group mail'>
                        <input type='text' placeholder="Login" name="login" required>
                    </div>
                    <div class='form-group pass'>
                        <input type='password' placeholder="Hasło" name="passy" required>
                    </div>
                    <div class='form-group log-in'>
                    <input type='submit' value='ZALOGUJ SIĘ' name="zaloguj">
                </div>
     