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

<body onload=main()>
    <div id=informacjaLandscape>
        <span> Łatwiej jest wypełnić ankietę w widoku poziomym,</br>proszę obróć ekran ;) </span>


    </div>


    <!-- Pytanie filtrujace-->






    <div id=wstep>
        <form>
            <div id=description class="bg-light rounded shadow">
                <span>Witam w ankiecie o komunikacji miejskiej w Szczecinie.</span><br><br>
                <span>Jestem studentem Wydziału Informatyki Zachodniopomorskiego Uniwersytetu Technologicznego w
                    Szczecinie,<br>
                    piszę pracę dyplomową wymagającą danych statystycznych, a tym samym Waszej pomocy.<br>
                    Ankieta skierowana jest do użytkowników komunikacji miejskiej w Szczecinie i jest w pełni
                    anonimowa.<br>
                    Zebrane dane zostaną wykorzystane wyłącznie w pracy dyplomowej. </span>
            </div>

            <div class="bg-light rounded shadow">
                <table>
                    <tr>
                        <th colspan="2">Czy korzystasz z komunikacji miejskiej Szczecin?</th>
                    </tr>
                    <tr>
                        <td class=pf1>
                            <input type=radio id=of0 onClick=dalej(1)>
                        </td>
                        <td class=of1>
                            <label required for=of0>Tak</label>
                        </td>
                    </tr>
                    <tr>
                        <td class=pf1>
                            <input type=radio id=of1 class=of onClick=dalej(0)>
                        </td>
                        <td class=of1>
                            <label required for=of1>Nie</label>
                        </td>
                    </tr>

                </table>
            </div>
        </form>
    </div>









    <!-- -->


    <div id="ankieta">


        <form method="POST" action=thanks.php>
            <!-- pytania metryczne -->
            <div id=pm-1 class="bg-light rounded shadow">
                <table>
                    <tr>
                        <th colspan=2>
                            <nrpytania>M-1</nrpytania> Płeć
                        </th>
                    </tr>
                    <tr>
                        <td class=pm-1><input required name=gender type=radio value=0 id=male></td>
                        <td class=om-1><label required for=male>Mężczyzna</label></td>
                    </tr>
                    <tr>
                        <td class=pm-1><input required name=gender type=radio value=1 id=female></td>
                        <td class=om-1><label required for=female>Kobieta</label></td>
                    </tr>
                </table>
            </div>

            <div id=pm-2 class="bg-light rounded shadow">
                <table>
                    <tr>
                        <th colspan=2>
                            <nrpytania>M-2</nrpytania>Wiek
                        </th>
                    </tr>
                    <tr>
                        <td class=pm-2><input required type=radio name=age value=0 id="pm2o1"></td>
                        <td class=om-2><label required for=pm2o1> Do 25</label> </td>
                    </tr>
                    <tr>
                        <td class=pm-2> <input required name=age type=radio value=1 id="pm2o2"></td>
                        <td class=om-2><label required for=pm2o2> 26-35</label> </td>
                    </tr>

                    <tr>
                        <td class=pm-2> <input required name=age type=radio value=2 id="pm2o3"></td>
                        <td class=om-2><label required for=pm2o3> 36-45</label> </td>
                    </tr>

                    <tr>
                        <td class=pm-2> <input required name=age type=radio value=3 id="pm2o4"></td>
                        <td class=om-2><label required for=pm2o4> Powyżej 45</label> </td>
                    </tr>
                </table>
            </div>

            <div id="pm-3" class="bg-light rounded shadow">
                <table>
                    <tr>
                        <th colspan=2>
                            <nrpytania>M-3</nrpytania>Wykształcenie
                        </th>
                    </tr>

                    <tr>
                        <td class=pm-3> <input required name=school type=radio value=0 id="pm3o1"></td>
                        <td class=om-3><label required for=pm3o1>Ukończone podstawowe</label> </td>
                    </tr>
                    <tr>
                        <td class=pm-3> <input required name=school type=radio value=1 id="pm3o2"></td>
                        <td class=om-3><label required for=pm3o2> Ukończone gimnazjalne </label></td>
                    </tr>
                    <tr>
                        <td class=pm-3> <input required name=school type=radio value=2 id="pm3o3"></td>
                        <td class=om-3><label required for=pm3o3> Ukończone zawodowe </label></td>
                    </tr>
                    <tr>
                        <td class=pm-3> <input required name=school type=radio value=3 id="pm3o4"></td>
                        <td class=om-3><label required for=pm3o4> Ukończone średnie</label> </td>
                    </tr>
                    <tr>
                        <td class=pm-3> <input required name=school type=radio value=4 id="pm3o5"></td>
                        <td class=om-3> <label required for=pm3o5>Ukończone wyższe</label> </td>
                    </tr>
                </table>
            </div>


            <div id="pm-4" class="bg-light rounded shadow">
                <table>
                    <tr>
                        <th colspan=2>
                            <nrpytania>M-4</nrpytania>Sytuacja zawodowa
                        </th>
                    </tr>
                    <tr>
                        <td class=pm-4> <input required name=job type=radio value=0 id="pm4o1"></td>
                        <td class=om-4><label required for=pm4o1> Uczę się </label></td>
                    </tr>
                    <tr>
                        <td class=pm-4> <input required name=job type=radio value=1 id="pm4o2"></td>
                        <td class=om-4><label required for=pm4o2 id=om-4-2> Bezrobotny/a </label></td>
                    </tr>
                    <tr>
                        <td class=pm-4> <input required name=job type=radio value=2 id="pm4o3"></td>
                        <td class=om-4><label required for=pm4o3 id=om-4-3> Pracujacy/a </label></td>
                    </tr>


                </table>
            </div>

            <div id="pm-5" class="bg-light rounded shadow">
                <table>
                    <tr>
                        <th colspan=2>
                            <nrpytania>M-5</nrpytania>Stan cywilny
                        </th>
                    </tr>
                    <tr>
                        <td class=pm-5> <input required name=marriage type=radio value=0 id="pm5o1"></td>
                        <td class=om-5><label required for=pm5o1 id=om-5-1> kawaler/panna</label> </td>
                    </tr>
                    <tr>
                        <td class=pm-5> <input required name=marriage type=radio value=1 id="pm5o2"></td>
                        <td class=om-5><label required for=pm5o2 id=om-5-2> żonaty/zamężna </label> </td>
                    </tr>
                    <tr>
                        <td class=pm-5> <input required name=marriage type=radio value=2 id="pm5o3">
                        </td>
                        <td class=om-5> <label required for=pm5o3 id=om-5-3>partner/partnerka</label> </td>
                    </tr>
                    <tr>
                        <td class=pm-5> <input required name=marriage type=radio value=3 id="pm5o4">
                        </td>
                        <td class=om-5><label required for=pm5o4 id=om-5-4> rozwiedziony/rozwiedziona</label> </td>
                    </tr>


                </table>
            </div>

            <div id="pm-6" class="bg-light rounded shadow">
                <table>
                    <tr>
                        <th colspan=2>
                            <nrpytania>M-6</nrpytania>Czy/ile masz dzieci?
                        </th>
                    </tr>
                    <tr>
                        <td class=pm-6> <input required name=kids type=radio value=0 id="pm6o1"></td>
                        <td class=om-6><label required for=pm6o1> Nie mam dzieci </label></td>
                    </tr>

                    <tr>
                        <td class=pm-6> <input required name=kids type=radio value=1 id="pm6o2"></td>
                        <td class=om-6> <label required for=pm6o2>Mam 1 dziecko </label></td>
                    </tr>
                    <tr>
                        <td class=pm-6> <input required name=kids type=radio value=2 id="pm6o3"></td>
                        <td class=om-6><label required for=pm6o3> Mam 2 dzieci </label></td>
                    </tr>
                    <tr>
                        <td class=pm-6> <input required name=kids type=radio value=3 id="pm6o4">
                        </td>
                        <td class=om-6><label required for=pm6o4> Mam wiecej niż 2 dzieci</label> </td>
                    </tr>
                </table>
            </div>


            <!-- Pytania wlasciwe -->


            <div id="p1" class="bg-light rounded shadow ">
                <table>
                    <tr>
                        <th colspan=2>
                            <nrpytania>1.</nrpytania>Z jakich form zakupu biletu komunikacji miejskiej korzystasz?
                            (możesz wybrać
                            kilka)
                        </th>
                    </tr>

                    <tr>
                        <td class=p1> <input name=p1o1 id="p1o1" class=p1o type="checkbox" value=0 required>
                        </td>
                        <td class=o1><label id="p1o1" for=p1o1>Długookresowy w formie papierowej</label></td>
                    </tr>

                    <tr>
                        <td class=p1><input name=p1o2 id="p1o2" class=p1o type="checkbox" value=1 required>
                        </td>
                        <td class=o1><label id="p1o2l" for=p1o2>Długookresowy w formie elektronicznej</label></td>
                    </tr>

                    <tr>
                        <td class=p1><input name=p1o3 id="p1o3" class=p1o type="checkbox" value=2 required></td>
                        <td class=o1> <label id="p1o3" for=p1o3>Miesięczny w formie papierowej </label></td>
                    </tr>

                    <tr>
                        <td class=p1> <input name=p1o4 id="p1o4" class=p1o type="checkbox" value=3 required>
                        </td>
                        <td class=o1> <label id="p1o4" for=p1o4>Miesięczny w formie elektronicznej</label></td>
                    </tr>

                    <tr>
                        <td class=p1><input name=p1o5 id="p1o5" class=p1o type="checkbox" value=4 required></td>
                        <td class=o1> <label id="p1o5" for=p1o5>Krótkookresowy (do godziny) w formie
                                papierowej </label></td>
                    </tr>

                    <tr>
                        <td class=p1><input name=p1o6 id="p1o6" class=p1o type="checkbox" value=5 required></td>
                        <td class=o1> <label id="p1o6" for=p1o6>Krótkookresowy (do godziny) w formie
                                elektronicznej
                            </label></td>
                    </tr>

                </table>
            </div>

            <div id=p2 class="bg-light rounded shadow">
                <label>
                    <nrpytania>2.</nrpytania>Czy korzystasz z biletomatów stacjonarnych?
                </label><br>
                <input required name=p2o id=p2o1 class=p2o1 type=radio value=0>
                <label for=p2o1 class=p2o1>Tak</label>

                <input required name=p2o class=p2o2 id=p2o2 type=radio value=1>
                <label for=p2o2 class=p2o2>Nie</label>

            </div>



            <div id="p4" class="bg-light rounded shadow">
                <label>
                    <nrpytania>4.</nrpytania>Czy korzystasz z biletomatów mobilnych (umieszczonych w pojazdach
                    komunikacji
                    miejskiej)?
                </label><br>
                <input required name="p4o" class=p4o1 type="radio" value=0 id="p4o1">
                <label for="p4o1" class=p4o1>Tak</label>

                <input required name="p4o" class=p4o2 type="radio" value=1 id="p4o2">
                <label for="p4o2" class=p4o2>Nie</label><br>


            </div>


            <!-------------------------------------------------- Się zaczyna !----------------------------------------------- -->
            <div id=p5 class="bg-light rounded shadow pytanieOaplikacje">
                <table>
                    <tr>
                        <th colspan=2><label>
                                <nrpytania>5.</nrpytania> Z jakiej aplikacji do kupowania biletów komunikacji miejskiej
                                korzystasz? (Możesz wybrać kilka)

                            </label></th>
                    </tr>
                    <tr>
                        <td class=p5><input name="p5o1" id="p5o1" class=p5oS type="checkbox" value=0 required></td>
                        <td class=o5><label for="p5o1">moBiLET</label></td>
                    </tr>

                    <tr>
                        <td class=p5><input name="p5o2" class=p5oS id="p5o2" type="checkbox" value=1 required></td>
                        <td class=o5><label for="p5o2">zbiletem.pl</label></td>
                    </tr>

                    <tr>
                        <td class=p5><input name="p5o3" class=p5oS id="p5o3" type="checkbox" value=2 required></td>
                        <td class=o5><label for="p5o3">Mobilna Karta Miejska</label></td>
                    </tr>

                    <tr>
                        <td class=p5><input name="p5o4" class=p5oS id="p5o4" type="checkbox" value=3 required></td>
                        <td class=o5><label for="p5o4">Z aplikacji bankowej</label></td>
                    </tr>

                    <tr>
                        <td class=p5><input name="p5o5" class=p5oS id="p5o5" type="checkbox" value=4 required></td>
                        <td class=o5><label for="p5o5">Skycash</label></td>
                    </tr>
                </table>
            </div>

            <div id=p6 class="bg-light rounded shadow pytanieOaplikacje">
                <table>
                    <tr>
                        <th colspan=2>
                            <nrpytania>6.</nrpytania> Co miało wpływ na wybór aplikacji do kupowania biletów komunikacji
                            miejskiej? (Możesz wybrać kilka)
                        </th>
                    </tr>
                    <tr>
                        <td class=p6>
                            <input name="p6o1" class=p6oS id="p6o1" type="checkbox" value="0" required>
                        </td>
                        <td class=o6> <label for=p6o1> Model smartfona (np. aplikacja się
                                zacinała)</label></td>
                    </tr>
                    <tr>
                        <td class=p6>
                            <input name="p6o2" class=p6oS id="p6o2" type="checkbox" value="1" required>
                        </td>
                        <td class=o6><label for=p6o2> Zainstalowany na telefonie system
                                operacyjny (np. iOS, Android, Backberry) nie
                                wspierał innej aplikacji</label></td>
                    </tr>
                    <tr>
                        <td class=p6>
                            <input name="p6o3" class=p6oS id="p6o3" type="checkbox" value="2" required>
                        </td>
                        <td class=o6><label for=p6o3> Wybrana aplikacja spełnia moje
                                oczekiwania</label></td>
                    </tr>
                    <tr>
                        <td class=p6>
                            <input name="p6o4" class=p6oS id="p6o4" type="checkbox" value="3" required>
                        </td>
                        <td class=o6><label for=p6o4> Intuicyjność w poruszaniu się po
                                aplikacji</label></td>
                    </tr>
                    <tr>
                        <td class=p6>
                            <input name="p6o5" class=p6oS id="p6o5" type="checkbox" value="4" required>
                        </td>
                        <td class=o6> <label for=p6o5>Szybkość działania aplikacji</label></td>
                    </tr>
                    <tr>
                        <td class=p6>
                            <input name="p6o6" class=p6oS id="p6o6" type="checkbox" value="5" required>
                        </td>
                        <td class=o6><label for=p6o6> Aplikacja umożliwia wyświetlenie zakupionego biletu, nawet przy
                                braku
                                dostępu do
                                internetu</label></td>
                    </tr>
                    <tr>
                        <td class=p6>
                            <input name="p6o7" class=p6oS id="p6o7" type="checkbox" value="6" required>
                        </td>
                        <td class=o6> <label for=p6o7>Aplikacja umożliwia podłączenie mojej karty kredytowej</label>
                        </td>
                    </tr>
                    <tr>
                        <td class=p6>
                            <input name="p6o8" class=p6oS id="p6o8" type="checkbox" value="7" required>
                        </td>
                        <td class=o6><label for=p6o8>Aplikacja udostępnia dodatkowe
                                funkcjonalności (np. zakup biletu
                                pociągu, wykupienie biletu parkingowego w strefie płatnego parkowania)</label></td>
                    </tr>
                    <tr>
                        <td class=p6>
                            <input name="p6o9" class=p6oS id="p6o9" type="checkbox" value="8" required>
                        </td>
                        <td class=o6><label for=p6o9> Aplikacja posiada promocje i zniżki</label></td>
                    </tr>
                    <tr>
                        <td class=p6>
                            <input name="p6o10" class=p6oS id="p6o10" type="checkbox" value="9" required>
                        </td>
                        <td class=o6><label for=p6o10> Aplikację polecili mi znajomi/rodzina</label></td>
                    </tr>

                </table>
            </div>


            <div id=p7 class="bg-light rounded shadow pytanieOaplikacje">
                <label>
                    <nrpytania>7.</nrpytania> Korzystam z biletu elektronicznego, ponieważ: (wybierz jak bardzo zgadzasz
                    się z odpowiedzią)
                </label><br>

                <!-- Tu ma byc tabela jak w google forms -->
                <table class="table ">
                    <tr>
                        <th class="p7"></th>
                        <th scope="col">Nie zgadzam się</th>
                        <th scope="col">Raczej nie</th>
                        <th scope="col">Raczej tak</th>
                        <th scope="col">Zgadzam się</th>
                    </tr>
                    <tr>

                        <td scope="row" class="p7" id=p7o1> Mam go zawsze przy sobie</td>
                        <td> <input required name="p7o1" id="p7o11" type="radio" value=0></td>
                        <td><input required name="p7o1" id="p7o12" type="radio" value=1></td>
                        <td><input required name="p7o1" id="p7o13" type="radio" value=2></td>
                        <td> <input required name="p7o1" id="p7o14" type="radio" value=3></td>



                    </tr>
                    <tr>

                        <td scope="row"> Nie da się go zgubić</td>
                        <td> <input required name="p7o2" id="p7o21" type="radio" value=0></td>
                        <td> <input required name="p7o2" id="p7o22" type="radio" value=1></td>
                        <td> <input required name="p7o2" id="p7o23" type="radio" value=2></td>
                        <td> <input required name="p7o2" id="p7o24" type="radio" value=3></td>


                    </tr>
                    <tr>

                        <td scope="row" class="p7">Jest bardziej odporny na warunki atmosferyczne niż wersja papierowa
                        </td>
                        <td> <input required name="p7o3" id="p7o31" type="radio" value=0></td>
                        <td> <input required name="p7o3" id="p7o32" type="radio" value=1></td>
                        <td> <input required name="p7o3" id="p7o33" type="radio" value=2></td>
                        <td> <input required name="p7o3" id="p7o34" type="radio" value=3></td>


                    </tr>
                    <tr>

                        <td scope="row" class="p7">Szybciej da się go kupić (nie tracę czasu na stanie w kolejce do
                            biletomatu)
                        </td>
                        <td> <input required name="p7o4" id="p7o41" type="radio" value=0></td>
                        <td> <input required name="p7o4" id="p7o42" type="radio" value=1></td>
                        <td> <input required name="p7o4" id="p7o43" type="radio" value=2></td>
                        <td> <input required name="p7o4" id="p7o44" type="radio" value=3></td>



                    </tr>
                    <tr>

                        <td scope="row" class="p7"> Jest formą zakupu bezpieczniejszą dla zdrowia</td>
                        <td><input required name="p7o5" id="p7o51" type="radio" value=0></td>
                        <td> <input required name="p7o5" id="p7o52" type="radio" value=1></td>
                        <td><input required name="p7o5" id="p7o53" type="radio" value=2></td>
                        <td><input required name="p7o5" id="p7o54" type="radio" value=3></td>

                    </tr>
                </table>
            </div>



            <div id=p8 class="bg-light rounded shadow pytanieOkrotkookresowe">
                <label>
                    <nrpytania>8.</nrpytania> Kupuję bilety krótkookresowe, ponieważ : (wybierz jak bardzo zgadzasz się
                    z
                    odpowiedzią)

                </label><br>

                <!-- Tu ma byc tabela jak w google forms -->
                <table class="table ">
                    <tr>
                        <th></th>
                        <th scope="col">Nie zgadzam się</th>
                        <th scope="col">Raczej nie</th>
                        <th scope="col">Raczej tak</th>
                        <th scope="col">Zgadzam się</th>
                    </tr>
                    <tr>


                        <td scope="row" class="p8"> Rzadko korzystam z komunikacji miejskiej</td>
                        <td><input required name="p8o1" id="p8o11" type="radio" value=0></td>
                        <td><input required name="p8o1" id="p8o12" type="radio" value=1></td>
                        <td> <input required name="p8o1" id="p8o13" type="radio" value=2></td>
                        <td><input required name="p8o1" id="p8o14" type="radio" value=3></td>


                    </tr>
                    <tr>


                        <td scope="row" class="p8"> Bardziej mi się to opłaca</td>
                        <td><input required name="p8o2" id="p8o21" type="radio" value=0></td>
                        <td><input required name="p8o2" id="p8o22" type="radio" value=1></td>
                        <td><input required name="p8o2" id="p8o23" type="radio" value=2></td>
                        <td><input required name="p8o2" id="p8o24" type="radio" value=3></td>


                    </tr>
                </table>
            </div>
            <div id=p9 class="bg-light rounded shadow pytanieOdlugookresowe">
                <label>
                    <nrpytania>9.</nrpytania>Kupuję bilety długookresowe, ponieważ: (wybierz jak bardzo zgadzasz się z
                    odpowiedzią)

                </label><br>

                <table class="table ">
                    <tr>
                        <th></th>
                        <th scope="col">Nie zgadzam się</th>
                        <th scope="col">Raczej nie</th>
                        <th scope="col">Raczej tak</th>
                        <th scope="col">Zgadzam się</th>
                    </tr>
                    <tr>

                        <td scope="row" class="p9">Dużo korzystam z komunikacji miejskiej</td>
                        <td><input required name="p9o1" id="p9o11" type="radio" value=0></td>
                        <td><input required name="p9o1" id="p9o12" type="radio" value=1></td>
                        <td><input required name="p9o1" id="p9o13" type="radio" value=2></td>

                        <td><input required name="p9o1" id="p9o14" type="radio" value=3></td>

                    </tr>

                    <tr>

                        <td scope="row" class="p9">Mam świadomość, że bilet mam zawsze przy sobie</td>

                        <td><input required name="p9o2" id="p9o21" type="radio" value=0></td>
                        <td><input required name="p9o2" id="p9o22" type="radio" value=1></td>
                        <td><input required name="p9o2" id="p9o23" type="radio" value=2></td>
                        <td><input required name="p9o2" id="p9o24" type="radio" value=3></td>

                    </tr>

                    <tr>

                        <td scope="row" class="p9"> Nie muszę się martwić kiedy wygasa bilet, ponieważ aplikacja
                            odpowiednio
                            wcześnie mnie
                            poinformuje o tym terminie</td>
                        <td><input required name="p9o3" id="p9o31" type="radio" value=0></td>
                        <td><input required name="p9o3" id="p9o32" type="radio" value=1></td>
                        <td><input required name="p9o3" id="p9o33" type="radio" value=2></td>
                        <td><input required name="p9o3" id="p9o34" type="radio" value=3></td>

                    </tr>
                </table>
            </div>
            <div id=p10 class="bg-light rounded shadow pytanieOaplikacje">
                <label>
                    <nrpytania>10.</nrpytania>Dodatkowe spostrzeżenia i opinie na temat aplikacji do kupowania biletów
                    komunikacji
                    miejskiej
                    w Szczecinie
                </label><br>
                <textarea name="p10o1" id="p10o1" class="toWrite " value="Nie wpisano"></textarea>
            </div>



            <!-- <script>
            pyt10()
            </script> -->
            <div><input type=submit name="answers" id=answer class="btn btn-light" value="Prześlij ankietę"
                    onClick=sprawdzInputy()></div>

        </form>

    </div>

</body>

</html>



<?php
if (isset($_POST['answers'])) {
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $school = $_POST['school'];
    $job = $_POST['job'];
    $marriage = $_POST['marriage'];
    $kids = $_POST['kids'];


    function pokazOdpowiedziPytania($idP, $idO)
    {
        include("baza.php");
        settype($idO, "integer");
        //dla pytania 1=> idPytanie pokaz mozliwe odpowiedzi
        $stat = $pdo->query("SELECT o.idOdpowiedzi, p.idPytania,p.TrescPytania FROM odpowiedzi o, pytania p WHERE o.IdPytaniaS=p.idPytania AND p.IdPytania=$idP") or die("blad zapytania");
        $wynik = $stat->fetchAll(PDO::FETCH_ASSOC);
        $stat->closeCursor();
        // print_r($wynik);
        // print_r(count($wynik));
        // print_r(gettype($idO));
        // wybrano odpowiedz zerowa, czyli o id odpowiedzi 1 
        if ($idO < count($wynik) && is_int($idO))
            $ktore = $wynik[$idO];
        else
            $ktore = $wynik[0];

        $ktore = $ktore['idOdpowiedzi'];
        // print_r($ktore);
        $stat = $pdo->query("SELECT p.TrescPytania, o.IdOdpowiedzi, o.TrescOdpowiedzi FROM odpowiedzi o, pytania p  WHERE o.IdOdpowiedzi=$ktore AND o.IdPytaniaS=p.idPytania ") or die("blad zapytania2");

        $wynik = $stat->fetchAll(PDO::FETCH_ASSOC);
        print("<br>");
        //wyswietl id i tresc tej odpowiedzi
        print_r($wynik);
        $stat->closeCursor();
        return $ktore;
    }
    $ciagId = "";

    $ciagId .= " " . pokazOdpowiedziPytania('1', $gender);

    $ciagId .= " " . pokazOdpowiedziPytania('2', $age);

    $ciagId .= " " . pokazOdpowiedziPytania('3', $school);

    $ciagId .= " " . pokazOdpowiedziPytania('4', $job);

    $ciagId .= " " . pokazOdpowiedziPytania('5', $marriage);

    $ciagId .= " " . pokazOdpowiedziPytania('6', $kids);



    if (isset($_POST['p1o1']))
        $ciagId .= " " . pokazOdpowiedziPytania('7', $_POST['p1o1']);

    if (isset($_POST['p1o2']))
        $ciagId .= " " . pokazOdpowiedziPytania('7', $_POST['p1o2']);


    if (isset($_POST['p1o3']))
        $ciagId .= " " . pokazOdpowiedziPytania('7', $_POST['p1o3']);


    if (isset($_POST['p1o4']))
        $ciagId .= " " . pokazOdpowiedziPytania('7', $_POST['p1o4']);


    if (isset($_POST['p1o5']))
        $ciagId .= " " . pokazOdpowiedziPytania('7', $_POST['p1o5']);


    if (isset($_POST['p1o6']))
        $ciagId .= " " . pokazOdpowiedziPytania('7', $_POST['p1o6']);


    if (isset($_POST['p1o[]']))
        $ciagId .= " " . pokazOdpowiedziPytania('7', $_POST['p1o[]']);


    if (isset($_POST['p2o']))
        $ciagId .= " " . pokazOdpowiedziPytania('8', $_POST['p2o']);

    if (isset($_POST['p2o1']))
        $ciagId .= " " . pokazOdpowiedziPytania('8', $_POST['p2o1']);

    if (isset($_POST['p2o2']))
        $ciagId .= " " . pokazOdpowiedziPytania('8', $_POST['p2o2']);

    if (isset($_POST['p2-2o1']))
        $ciagId .= " " . pokazOdpowiedziPytania('8', $_POST['p2-2o1']);

    if (isset($_POST['p2-2o2']))
        $ciagId .= " " . pokazOdpowiedziPytania('8', $_POST['p2-2o2']);

    if (isset($_POST['p2-2o3']))
        $ciagId .= " " . pokazOdpowiedziPytania('8', $_POST['p2-2o3']);

    if (isset($_POST['p2-2o4']))
        $ciagId .= " " . pokazOdpowiedziPytania('8', $_POST['p2-2o4']);

    if (isset($_POST['p2-2o5']))
        $ciagId .= " " . pokazOdpowiedziPytania('8', $_POST['p2-2o5']);

    // if(isset($_POST['p2o3']))
    // $ciagId.=" ".pokazOdpowiedziPytania('8',$_POST['p2o3']);

    // if(isset($_POST['p2o4']))
    // $ciagId.=" ".pokazOdpowiedziPytania('8',$_POST['p2o4']);

    // if(isset($_POST['p2o5']))
    // $ciagId.=" ".pokazOdpowiedziPytania('8',$_POST['p2o5']);


    if (isset($_POST['p4o']))
        $ciagId .= " " . pokazOdpowiedziPytania('9', $_POST['p4o']);

    if (isset($_POST['p4o1']))
        $ciagId .= " " . pokazOdpowiedziPytania('9', $_POST['p4o1']);

    if (isset($_POST['p4o2']))
        $ciagId .= " " . pokazOdpowiedziPytania('9', $_POST['p4o2']);


    if (isset($_POST['p4-2o1']))
        $ciagId .= " " . pokazOdpowiedziPytania('9', $_POST['p4-2o1']);

    if (isset($_POST['p4-2o2']))
        $ciagId .= " " . pokazOdpowiedziPytania('9', $_POST['p4-2o2']);

    if (isset($_POST['p4-2o3']))
        $ciagId .= " " . pokazOdpowiedziPytania('9', $_POST['p4-2o3']);

    if (isset($_POST['p4-2o4']))
        $ciagId .= " " . pokazOdpowiedziPytania('9', $_POST['p4-2o4']);

    if (isset($_POST['p4-2o5']))
        $ciagId .= " " . pokazOdpowiedziPytania('9', $_POST['p4-2o5']);


    // if(isset($_POST['p4o3']))
    // $ciagId.=" ".pokazOdpowiedziPytania('9',$_POST['p4o3']);

    // if(isset($_POST['p4o4']))
    // $ciagId.=" ".pokazOdpowiedziPytania('9',$_POST['p4o4']);

    // if(isset($_POST['p4o5']))
    // $ciagId.=" ".pokazOdpowiedziPytania('9',$_POST['p4o5']);

    if (isset($_POST['p5o1']))
        $ciagId .= " " . pokazOdpowiedziPytania('10', $_POST['p5o1']);

    if (isset($_POST['p5o2']))
        $ciagId .= " " . pokazOdpowiedziPytania('10', $_POST['p5o2']);

    if (isset($_POST['p5o3']))
        $ciagId .= " " . pokazOdpowiedziPytania('10', $_POST['p5o3']);

    if (isset($_POST['p5o4']))
        $ciagId .= " " . pokazOdpowiedziPytania('10', $_POST['p5o4']);

    if (isset($_POST['p5o5']))
        $ciagId .= " " . pokazOdpowiedziPytania('10', $_POST['p5o5']);



    if (isset($_POST['p6o1']))
        $ciagId .= " " . pokazOdpowiedziPytania('11', $_POST['p6o1']);

    if (isset($_POST['p6o2']))
        $ciagId .= " " . pokazOdpowiedziPytania('11', $_POST['p6o2']);

    if (isset($_POST['p6o3']))
        $ciagId .= " " . pokazOdpowiedziPytania('11', $_POST['p6o3']);

    if (isset($_POST['p6o4']))
        $ciagId .= " " . pokazOdpowiedziPytania('11', $_POST['p6o4']);

    if (isset($_POST['p6o5']))
        $ciagId .= " " . pokazOdpowiedziPytania('11', $_POST['p6o5']);

    if (isset($_POST['p6o6']))
        $ciagId .= " " . pokazOdpowiedziPytania('11', $_POST['p6o6']);

    if (isset($_POST['p6o7']))
        $ciagId .= " " . pokazOdpowiedziPytania('11', $_POST['p6o7']);

    if (isset($_POST['p6o8']))
        $ciagId .= " " . pokazOdpowiedziPytania('11', $_POST['p6o8']);

    if (isset($_POST['p6o9']))
        $ciagId .= " " . pokazOdpowiedziPytania('11', $_POST['p6o9']);

    if (isset($_POST['p6o10']))
        $ciagId .= " " . pokazOdpowiedziPytania('11', $_POST['p6o10']);



    if (isset($_POST['p7o1']))
        $ciagId .= " " . pokazOdpowiedziPytania('121', $_POST['p7o1']);

    if (isset($_POST['p7o2']))
        $ciagId .= " " . pokazOdpowiedziPytania('122', $_POST['p7o2']);

    if (isset($_POST['p7o3']))
        $ciagId .= " " . pokazOdpowiedziPytania('123', $_POST['p7o3']);

    if (isset($_POST['p7o4']))
        $ciagId .= " " . pokazOdpowiedziPytania('124', $_POST['p7o4']);

    if (isset($_POST['p7o5']))
        $ciagId .= " " . pokazOdpowiedziPytania('125', $_POST['p7o5']);

    if (isset($_POST['p8o1']))
        $ciagId .= " " . pokazOdpowiedziPytania('131', $_POST['p8o1']);

    if (isset($_POST['p8o2']))
        $ciagId .= " " . pokazOdpowiedziPytania('132', $_POST['p8o2']);

    if (isset($_POST['p9o1']))
        $ciagId .= " " . pokazOdpowiedziPytania('141', $_POST['p9o1']);

    if (isset($_POST['p9o2']))
        $ciagId .= " " . pokazOdpowiedziPytania('142', $_POST['p9o2']);

    if (isset($_POST['p9o3']))
        $ciagId .= " " . pokazOdpowiedziPytania('143', $_POST['p9o3']);
    echo "<br>" . $ciagId;

    include("baza.php");
    $stat = $pdo->query("INSERT INTO wyniki (IdWyniku,Wartosci) VALUES ('null','$ciagId')") or die("błąd dodawania");
    $stat->closeCursor();

    if (isset($_POST['p10o1']) && $_POST['p10o1'] != "Nie wpisano" && $_POST['p10o1'] != "") {
        $informacjaOdAnkietowanego = $_POST['p10o1'];
        if ($informacjaOdAnkietowanego != null) {
            $stat = $pdo->query("INSERT INTO odpowiedzidodatkowe (IdDodOdp,TrescDodOdp,IdPytaniaD) VALUES ('null','$informacjaOdAnkietowanego',15)") or die("błąd dodawania dodatku");

            $stat->closeCursor();
        }
    }
}
?>