<!DOCTYPE html>
<html lang=pl>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ankieta</title>
    <meta name="description" content="Ankieta">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <div><?php

            include("baza.php");
            $stat = $pdo->query("SELECT IdWyniku, Wartosci FROM wyniki") or die("blad pobierania wynikow");

            $wynik = $stat->fetchAll(PDO::FETCH_ASSOC);

            $stat->closeCursor();

            // print_r(count($wynik));
            $iloscOdpowiedzi = count($wynik);
            $i = 0;
            while ($iloscOdpowiedzi) {
                $zaznaczonePytania[$i] = $wynik[$i]['Wartosci'];
                $i++;
                $iloscOdpowiedzi--;
            }
            // print_r($zaznaczonePytania);
            $iloscOdpowiedzi = count($wynik);

            // tu jest akcja

            //zaznaczonePytania- zawiera wyniki z bazy
            //iloscOdpowiedzi -zawiera informację ile jest uzupelnien ankiety


            $stat = $pdo->query("SELECT IdOdpowiedzi FROM odpowiedzi WHERE  IdPytaniaS<>312 AND IdPytaniaS<>313 AND IdPytaniaS<>314") or die("blad pobierania odpowiedzi");
            $idodpowiedzi = $stat->fetchAll(PDO::FETCH_ASSOC);
            // print_r($idodpowiedzi[1]['IdOdpowiedzi']);

            $stat->closeCursor();


            // print_r($iloscOdpowiedzi);
            print("<br>");
            for ($i = 0; $i < $iloscOdpowiedzi; $i++)
                $nowaTablicaOdp[$i] = explode(" ", $zaznaczonePytania[$i]);
            // print_r($nowaTablicaOdp[2][1]);
            $znaleziono = 0;

            for ($i = 0; $i < count($idodpowiedzi); $i++) {
                for ($j = 0; $j < count($wynik); $j++)
                    for ($k = 0; $k < count($nowaTablicaOdp[$j]); $k++)
                        if ($idodpowiedzi[$i]['IdOdpowiedzi'] == $nowaTablicaOdp[$j][$k])
                            $znaleziono++;
                $ostateczneWyniki[$i] = array(
                    "idOdp" => $idodpowiedzi[$i]['IdOdpowiedzi'],
                    "suma" => $znaleziono
                );
                $znaleziono = 0;
            }

            // print_r($ostateczneWyniki);


            // tu juz nie
            $stringZpyt15 = "";
            $stat = $pdo->query("SELECT p.IdPytania, p.TrescPytania,o.IdOdpowiedzi, o.TrescOdpowiedzi, o.IdPytaniaS FROM pytania p, odpowiedzi o  WHERE o.IdPytaniaS=p.IdPytania   ") or die("blad pobierania pytan");
            $pytaniaOdpowiedzi = $stat->fetchAll(PDO::FETCH_ASSOC);
            $stat->closeCursor();

            $stat2 = $pdo->query("SELECT TrescDodOdp FROM odpowiedzidodatkowe") or die("dodatkowe odp nie do pobrania");
            $odpDod = $stat2->fetchAll(PDO::FETCH_ASSOC);
            $stat2->closeCursor();
            // print("<br>");
            // print_r($pytaniaOdpowiedzi);
            $ilePytOdp = count($pytaniaOdpowiedzi);
            $ilePytOdp -= 10;
            $i = 0;
            // print("ileeee   ");
            // print($ilePytOdp);
            print("<br>");
            print("<table  class=table id=tabelaWynikowa >");
            while ($ilePytOdp) {
                print("<tr>");
                $ilePytOdp--;

                if ($i > 0) {
                    $j = $i - 1;
                    $wczesniejszeIdOdp = $pytaniaOdpowiedzi[$j]["IdPytania"];
                }

                if (!isset($wczesniejszeIdOdp) && $pytaniaOdpowiedzi[$i]["IdPytania"] != 15) {
                    print("<tr><th colspan=2 >");
                    print_r($pytaniaOdpowiedzi[$i]["TrescPytania"]);
                    print("</th></tr>");
                } else

    if ($pytaniaOdpowiedzi[$i]["IdPytania"] != $wczesniejszeIdOdp && $pytaniaOdpowiedzi[$i]["IdPytania"] != 15) {
                    print("<tr><th colspan=2 >");
                    print_r($pytaniaOdpowiedzi[$i]["TrescPytania"]);
                    print("</th></tr>");
                }




                if ($pytaniaOdpowiedzi[$i]["IdPytania"] == 15) {
                    $stringZpyt15 .= "<tr><th colspan=2 class=ramkaDlaDod>";
                    $stringZpyt15 .= $pytaniaOdpowiedzi[$i]["TrescPytania"];
                    $stringZpyt15 .= "</th></tr>";
                }

                if ($pytaniaOdpowiedzi[$i]["IdPytaniaS"] == 15) {
                    $ileRazyDodatkowo = count($odpDod);
                    $t = 0;
                    while ($ileRazyDodatkowo) {
                        $ileRazyDodatkowo--;
                        $stringZpyt15 .= "<tr><td colspan=2 class=ramkaDlaDod >";
                        //zmienna z samymi odp dodatkowymi
                        $stringZpyt15 .= $odpDod[$t]["TrescDodOdp"];
                        $stringZpyt15 .= "</td></tr>";
                        $t++;
                    }
                }


                if ($pytaniaOdpowiedzi[$i]["IdPytaniaS"] != 15) {
                    print("<td >");
                    print_r($pytaniaOdpowiedzi[$i]["TrescOdpowiedzi"]);
                    print("</td>");
                    print("<td >");
                    if ($pytaniaOdpowiedzi[$i]["IdOdpowiedzi"] == $ostateczneWyniki[$i]["idOdp"]) {
                        print($ostateczneWyniki[$i]["suma"]);
                        print("/");
                        print($iloscOdpowiedzi);
                        print("<br> czyli ");
                        print(round($ostateczneWyniki[$i]["suma"] / $iloscOdpowiedzi * 100, 2));
                        print("% ankietowanych");
                    }
                    print("</td>");
                }
                $i++;
                print("</tr>");
            }
            print($stringZpyt15);
            ?>
        </table>
    </div>
</body>

</html>