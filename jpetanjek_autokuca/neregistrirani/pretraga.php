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
                var broj_stranica;
                var trenutna;
                function tabliciziraj(tablica, pretraga, tabpretraga, dropizvor, dropodabir , stranica , sortiraj , sort_smjer) {
                    var generiraj = "";
                    generiraj += "Prosljedeno Tablica:"+ tablica+ " pretraga " + pretraga + " tabpretraga " + tabpretraga+ " dropodabir "+ dropodabir + " stranica " +stranica + " sortiraj " +sortiraj +" sort_smjer " +sort_smjer +"<br>";
                    if(pretraga===0) pretraga="";
                    generiraj += "Pretraga po adresi: <input type='text' id='unos_za_pretragu' value="+pretraga+">";
                    $.ajax({
                        url: "../izvorne_datoteke/index.php",
                        data: {},
                        method: "POST",
                        dataType: "JSON",
                        success: function (data)
                            {
                            generiraj += "<select id=drop_odabir > <option value='0'>---</option>";
                            for (var i = 0; i < data.length; i++) {
                                if(data[i].id_autokuca === dropodabir){
                                    generiraj += "<option value='" + data[i].id_autokuca + "' selected>" + data[i].naziv + "</option>";
                                }
                                else{
                                    generiraj += "<option value='" + data[i].id_autokuca + "'>" + data[i].naziv + "</option>";
                                }
                            }
                            generiraj += "</select>";
                            generiraj += "<button type=button' id=pretraga>Pretrazi</button>";
                             $("#generirano").html(generiraj);
                            },
                        complete: function(){
                            $.ajax({
                            url: "../izvorne_datoteke/s_pretraga.php",
                            method: "POST",
                            data: {tablica: tablica, pretraga: pretraga, tabpretraga: tabpretraga, dropizvor: dropizvor, dropodabir: dropodabir, stranica: stranica , sortiraj: sortiraj, sort_smjer: sort_smjer},
                            dataType: "JSON",
                            success: function (data)
                            {
                                generiraj += "<br>"+"Prosljedeno Tablica:"+ tablica+ " pretraga " + pretraga + " tabpretraga " + tabpretraga+ " dropodabir "+ dropodabir + " stranica " +stranica + "<br>";
                                generiraj += data;
                                generiraj += "<table> <tr><th><button type=button' id=autokuca>Autokuca</button> </th><th ><button type=button' id=lokacija>Lokacija</button></th> </tr>";
                                for (var i = 0; i < data.length; i++) {
                                    if(data[i].autokuca_id_autokuca){
                                        generiraj += "<tr> <td> <a href='http://barka.foi.hr/WebDiP/2018_projekti/WebDiP2018x112/neregistrirani/autokuca.php?autokuca=" + data[i].autokuca_id_autokuca + "'>";
                                        generiraj += "<img src='../multimedija/logotipovi/" + data[i].autokuca_id_autokuca + ".png' height='100'></td>";
                                        generiraj += "<td><a href='http://barka.foi.hr/WebDiP/2018_projekti/WebDiP2018x112/neregistrirani/lokacija.php?lokacija=" + data[i].id_lokacija + "'>" + data[i].adresa + "</td></tr>";
                                    }
                                }
                                generiraj += "</table>";
                                generiraj += "<button type=button' id=prva>Prva</button>";
                                generiraj += "<button type=button' id=prethodna>Prethodna</button>";
                                generiraj += "<button type=button' id=sljedeca>Sljedeca</button>";
                                generiraj += "<button type=button' id=posljednja>Posljednja</button>";
                                
                                generiraj += "<br>Broj stranica: " + data[data.length-1].Broj_stranica;
                                generiraj += "<br>Trenutna stranica: " + data[data.length-1].Trenutna;
                                
                                $("#generirano").html(generiraj);
                                //$('#unos_za_pretragu').focus().val($('#unos_za_pretragu').val());
                                
                                var originalna = $('#unos_za_pretragu').val();
                                $('#unos_za_pretragu').val('');
                                $('#unos_za_pretragu').focus().val(originalna);
                                
                                broj_stranica = data[data.length-1].Broj_stranica;
                                trenutna=data[data.length-1].Trenutna;
                            }
                            
                            });
                        }
                    });
                }
                var sortiraj =0;
                var sort_smjer =0;
                var stranica =1;
                var tablica = 'lokacija';
                var tabpretraga = 'adresa';
                var dropizvor = 'autokuca_id_autokuca';
                tabliciziraj(tablica, 0, tabpretraga, dropizvor, 0, stranica ,sortiraj,sort_smjer);
                //pretraga i sort po autokuci
                $(document).on("click", "#pretraga", function () {
                //$(document).on("keyup", "#unos_za_pretragu", function () {
                    var unos_za_pretragu = $("#unos_za_pretragu").val();
                    if(unos_za_pretragu === ""){
                        unos_za_pretragu = 0;
                    }
                    var drop_odabir = $("#drop_odabir").val();
                    
                    tabliciziraj(tablica, unos_za_pretragu , tabpretraga,dropizvor, drop_odabir, stranica ,sortiraj,sort_smjer);
                });
                $(document).on("change", "#drop_odabir", function () {
                    var unos_za_pretragu = $("#unos_za_pretragu").val();
                    if(unos_za_pretragu === ""){
                        unos_za_pretragu = 0;
                    }
                    var drop_odabir = $("#drop_odabir").val();
                    
                    tabliciziraj(tablica, unos_za_pretragu , tabpretraga,dropizvor, drop_odabir, stranica ,sortiraj,sort_smjer);
                    //tabliciziraj('lokacija', 0, 0, 0, 0);
                });
                //sort po lokaciji ili autokuci
                $(document).on("click", "#autokuca", function(){
                    var unos_za_pretragu = $("#unos_za_pretragu").val();
                    if(unos_za_pretragu === ""){
                        unos_za_pretragu = 0;
                    }
                    var drop_odabir = $("#drop_odabir").val();
                    
                    sortiraj='autokuca_id_autokuca';
                    
                    switch(sort_smjer){
                        case 0:
                            sort_smjer="ASC";
                            break;
                        case "ASC":
                            sort_smjer="DESC";
                            break;
                        case "DESC":
                            sort_smjer="ASC";
                            break;
                    }
                    tabliciziraj(tablica, unos_za_pretragu , tabpretraga,dropizvor, drop_odabir, stranica ,sortiraj,sort_smjer);
                });
                $(document).on("click", "#lokacija", function(){
                    var unos_za_pretragu = $("#unos_za_pretragu").val();
                    if(unos_za_pretragu === ""){
                        unos_za_pretragu = 0;
                    }
                    var drop_odabir = $("#drop_odabir").val();
                    
                    sortiraj='adresa';
                    
                    switch(sort_smjer){
                        case 0:
                            sort_smjer="ASC";
                            break;
                        case "ASC":
                            sort_smjer="DESC";
                            break;
                        case "DESC":
                            sort_smjer="ASC";
                            break;
                    }
                    
                    tabliciziraj(tablica, unos_za_pretragu , tabpretraga,dropizvor, drop_odabir, stranica ,sortiraj,sort_smjer);
                });
                //paginacija
                $(document).on("click", "#prva", function () {
                    var unos_za_pretragu = $("#unos_za_pretragu").val();
                    if(unos_za_pretragu === ""){
                        unos_za_pretragu = 0;
                    }
                    var drop_odabir = $("#drop_odabir").val();
                    stranica=1;
                    if(trenutna!=stranica){
                        tabliciziraj(tablica, unos_za_pretragu , tabpretraga,dropizvor, drop_odabir, stranica ,sortiraj,sort_smjer);
                    }
                });
                $(document).on("click", "#prethodna", function () {
                    var unos_za_pretragu = $("#unos_za_pretragu").val();
                    if(unos_za_pretragu === ""){
                        unos_za_pretragu = 0;
                    }
                    var drop_odabir = $("#drop_odabir").val();
                    stranica=stranica-1;
                    if(stranica<=0){
                        stranica=1;
                    }
                    if(trenutna!=stranica){
                        tabliciziraj(tablica, unos_za_pretragu , tabpretraga,dropizvor, drop_odabir, stranica ,sortiraj,sort_smjer);
                    }
                });
                $(document).on("click", "#sljedeca", function () {
                    var unos_za_pretragu = $("#unos_za_pretragu").val();
                    if(unos_za_pretragu === ""){
                        unos_za_pretragu = 0;
                    }
                    var drop_odabir = $("#drop_odabir").val();
                    stranica=stranica+1;
                    if(stranica>=broj_stranica){
                        stranica=broj_stranica;
                    }
                    if(trenutna!=stranica){
                        tabliciziraj(tablica, unos_za_pretragu , tabpretraga,dropizvor, drop_odabir, stranica ,sortiraj,sort_smjer);
                    }
                });
                $(document).on("click", "#posljednja", function () {
                    var unos_za_pretragu = $("#unos_za_pretragu").val();
                    if(unos_za_pretragu === ""){
                        unos_za_pretragu = 0;
                    }
                    var drop_odabir = $("#drop_odabir").val();
                    
                    stranica=broj_stranica;
                    if(trenutna!=stranica){
                        tabliciziraj(tablica, unos_za_pretragu , tabpretraga,dropizvor, drop_odabir, stranica ,sortiraj,sort_smjer);
                    }
                });
            });
        </script>
    </head>
    <body>
        <div id="generirano"> test
        </div>
    </body>
</html>
