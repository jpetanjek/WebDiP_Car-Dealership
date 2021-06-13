<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="hr">
    <head>
        <title>Početna stranica</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="naslov" content="Pocetna stranica">
        <meta name="author" content="Josip Petanjek">
        <meta name="keywords" content="Home, Autokuca ,Petanjek">
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>  

        <script>
            $(document).ready(function () {
                $.ajax({
                    url: "izvorne_datoteke/index.php",
                    data: {},
                    method: "POST",
                    dataType: "JSON",
                    success: function (data)
                    {
                        var generiraj = "";
                        for (var i = 0; i < data.length; i++) {
                            generiraj += "<a href='http://barka.foi.hr/WebDiP/2018_projekti/WebDiP2018x112/neregistrirani/autokuca.php?autokuca=" + data[i].id_autokuca + "'>";
                            generiraj += "<div> <img src='multimedija/logotipovi/" + data[i].logo + ".png' height='100' alt='" + data[i].naziv + "'>";
                            generiraj += "<br> " + data[i].naziv + " <br>" + data[i].informacije + " </div> </a>"
                        }
                        $("#generirano").html(generiraj);
                    }
                });
                $(document).on("click", "#test", function () {
                    $.ajax({
                        url: "izvorne_datoteke/index.php",
                        data: {},
                        method: "POST",
                        dataType: "JSON",
                        success: function (data)
                        {
                            var generiraj = "";
                            for (var i = 0; i < data.length; i++) {
                                generiraj += "<a href='http://barka.foi.hr/WebDiP/2018_projekti/WebDiP2018x112/neregistrirani/autokuca.php?autokuca=" + data[i].id_autokuca + "'>";
                                generiraj += "<div> <img src='multimedija/logotipovi/" + data[i].logo + ".png' height='100' alt='" + data[i].naziv + "'>";
                                generiraj += "<br> " + data[i].naziv + " <br>" + data[i].informacije + " </div> </a>"
                            }
                            $("#generirano").html(generiraj);
                        }
                    });
                });
            });
        </script>

    </head>
    <body>
        <header>
            <h1 >Početna stranica</h1>

        </header>
        <nav>
            <div class="navigacija">
                <a target="a" href="index.php">Početak</a>
                <a href="ostalo/multimedija.php">Multimedija</a>
                <a href="ostalo/popis.php">Popis</a>
                <a href="obrasci/obrazac.php">Obrazac</a>
                <a href="obrasci/prijava.php">Prijava</a>
                <a href="obrasci/registracija.php">Registracija</a>
                <a href="ostalo/era.php">ERA dijagram</a>
                <a href="ostalo/navigacijski.php">Navigacijski dijagram</a>
            </div>
        </nav>

        <section>
            <div id="generirano">
            </div>
            <input id="test" type="button" value="Refesh" />
        </section>


        <footer id ="kraj">
            <address><strong>Kontakt: </strong><a href="mailto:jpetanjek@foi.hr">Josip Petanjek</a></address>
            <a href="http://validator.w3.org/check?uri=referer"> <img src="multimedija/HTML5.png" alt="HTML" height="100"> </a>
            <a href="http://jigsaw.w3.org/css-validator/check?uri=referer"><img src="multimedija/CSS3.png" alt="CSS" height="100"></a>
            <p>&copy; 2019 J. Petanjek</p> 
        </footer>
    </body>
</html>
