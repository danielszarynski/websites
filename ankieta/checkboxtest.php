<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body onLoad="test()">

    <form>
        <div>
            <input type=checkbox name="check[]" class=a id=j required> 1<br>
            <input type=checkbox name="check[]" class=a id=d required> 2<br>
            <input type=checkbox name="check[]" class=a id=t required> 3<br>
            <input type=checkbox name="check[]" class=a id=c required> 4<br>
        </div>
        <input type=submit name="ok">

    </form>


    <script>
    function test() {
        $(".a").change(function() {
            console.log("dziala1");
            if ($("#j").prop("checked") == true || $("#d").prop("checked") == true || $("#t").prop("checked") ==
                true || $("#c").prop("checked") == true) {
                console.log("dziala2");
                $(".a").removeAttr("required");
            }

            if ($("#j").prop("checked") == false && $("#d").prop("checked") == false && $("#t").prop(
                    "checked") ==
                false && $("#c").prop("checked") == false) {
                console.log("dziala3");
                $(".a").attr("required", true);
            }
        });
    }
    </script>
</body>

</html>