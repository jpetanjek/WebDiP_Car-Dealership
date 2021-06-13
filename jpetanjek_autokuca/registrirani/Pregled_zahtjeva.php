<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pretraga</title>

        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>  

        <script>
            $(document).ready(function () {
                function pocetna() {
                    var generiraj = "";
                    generiraj += "Pretraga po adresi: <input type='text' id='unos_za_pretragu' >";
                    generiraj += "<button type=button id=pretraga>Pretrazi</button>";
                    $("#generirano1").html(generiraj);
                }

                function tabliciziraj(tablica, pretraga, tabpretraga, dropizvor, dropodabir, stranica, sortiraj, sort_smjer) {
                    var generiraj = "";
                    generiraj += "Prosljedeno Tablica:" + tablica + " pretraga " + pretraga + " tabpretraga " + tabpretraga + " dropizvor " + dropizvor + " dropodabir " + dropodabir + " stranica " + stranica + " sortiraj " + sortiraj + " sort_smjer " + sort_smjer + "<br>";
                    $.ajax({
                        url: "../izvorne_datoteke/s_pretraga.php",
                        method: "POST",
                        data: {tablica: tablica, pretraga: pretraga, tabpretraga: tabpretraga, dropizvor: dropizvor, dropodabir: dropodabir, stranica: stranica, sortiraj: sortiraj, sort_smjer: sort_smjer},
                        dataType: "JSON",
                        success: function (data)
                        {
                            generiraj += "<br>" + "Prosljedeno Tablica:" + tablica + " pretraga " + pretraga + " tabpretraga " + tabpretraga + " dropizvor " + dropizvor + " dropodabir " + dropodabir + " stranica " + stranica + "<br>";
                            generiraj += data;
                            /*generiraj += "<table> <tr><th><button type=button' id=autokuca>Autokuca</button> </th><th ><button type=button' id=lokacija>Lokacija</button></th> </tr>";
                             for (var i = 0; i < data.length; i++) {
                             if(data[i].autokuca_id_autokuca){
                             generiraj += "<tr> <td> <a href='http://barka.foi.hr/WebDiP/2018_projekti/WebDiP2018x112/neregistrirani/autokuca.php?autokuca=" + data[i].autokuca_id_autokuca + "'>";
                             generiraj += "<img src='../multimedija/logotipovi/" + data[i].autokuca_id_autokuca + ".png' height='100'></td>";
                             generiraj += "<td><a href='http://barka.foi.hr/WebDiP/2018_projekti/WebDiP2018x112/neregistrirani/lokacija.php?lokacija=" + data[i].id_lokacija + "'>" + data[i].adresa + "</td></tr>";
                             }
                             }
                             generiraj += "</table>";*/
                            /*generiraj += "<button type=button' id=prva>Prva</button>";
                             generiraj += "<button type=button' id=prethodna>Prethodna</button>";
                             generiraj += "<button type=button' id=sljedeca>Sljedeca</button>";
                             generiraj += "<button type=button' id=posljednja>Posljednja</button>";
                             
                             generiraj += "<br>Broj stranica: " + data[data.length - 1].Broj_stranica;
                             generiraj += "<br>Trenutna stranica: " + data[data.length - 1].Trenutna;
                             
                             
                             //$('#unos_za_pretragu').focus().val($('#unos_za_pretragu').val());
                             
                             
                             
                             broj_stranica = data[data.length - 1].Broj_stranica;
                             trenutna = data[data.length - 1].Trenutna;*/
                            $("#generirano2").html(generiraj);
                        }
                    });

                    var originalna = $('#unos_za_pretragu').val();
                    $('#unos_za_pretragu').val('');
                    $('#unos_za_pretragu').focus().val(originalna);
                }
                pocetna();
                var sortiraj = 0;
                var sort_smjer = 0;
                var stranica = 1;
                var tablica = 'zahtjev_servis';
                var tabpretraga = 0;
                var dropizvor = 0;
                tabliciziraj(tablica, 0, tabpretraga, dropizvor, 0, stranica, sortiraj, sort_smjer);

            });
        </script>
    </head>
    <body>
        <div id="generirano1"> test
        </div>
        <div id="generirano2"> test
        </div>
    </body>
</html>
