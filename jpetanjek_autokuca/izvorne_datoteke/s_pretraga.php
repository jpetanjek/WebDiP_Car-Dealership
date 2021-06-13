<?php

require'../vanjske_datoteke/baza.class.php';

if (isset($_POST["tablica"])) {
    $veza = new Baza();
    $veza->spojiDB();
    
    
    
    $tablica = $_POST["tablica"];
    $upit = "SELECT * FROM $tablica";
    
    if($_POST["pretraga"]!=='0'){
        $tabpretraga = $_POST["tabpretraga"];
        $pretraga = $_POST["pretraga"];
        $upit .= " WHERE $tabpretraga LIKE '%$pretraga%'";
        if($_POST["dropodabir"]!=='0'){
            $dropodabir=$_POST["dropodabir"];
            $dropizvor=$_POST["dropizvor"];
            $upit .= " AND $dropizvor = '$dropodabir'";
        }
    }
    if($_POST["dropodabir"]!=='0' && $_POST["pretraga"]==='0'){
            $dropodabir=$_POST["dropodabir"];
            $dropizvor=$_POST["dropizvor"];
            $upit .= " WHERE $dropizvor = '$dropodabir'";
        }
    //SELECT * FROM `lokacija` WHERE `adresa` LIKE "%Zagre%" ORDER BY `lokacija`.`adresa` ASC
    if($_POST["sortiraj"]!=='0'){
            $sortiraj = $_POST["sortiraj"];
            $sort_smjer = $_POST["sort_smjer"];
            $upit .= " ORDER BY $sortiraj $sort_smjer";
        }
        
    
    //dobavljanje konfiguracijskih podataka
    $upit_konfiguracija = "SELECT * FROM `kofiguracija`";
    $sql_konfiguracija = $veza->selectDB($upit_konfiguracija);
    $red_konfiguracija = $sql_konfiguracija->fetch_assoc();
    $konf_broj_rez=$red_konfiguracija["Broj_elemenata"];
    
    //koliko je stranica u upitu
    $sql_broj_rezultata = $veza->selectDB($upit);
    $broj_rezultata = mysqli_num_rows($sql_broj_rezultata);
    $broj_stranica= ceil($broj_rezultata/$konf_broj_rez);
    
    if(isset($_POST["stranica"])){
        $komanda=$_POST["stranica"];
        switch($komanda){
            case "prva":
                $stranica=1;
                break;
            case "posljednja":
                $stranica=$broj_stranica;
                break;
            default:
                $stranica=$komanda;
                break;
        }
    }
        
    $offsetaj_za=($stranica-1)*$konf_broj_rez;
    $upit.= " LIMIT $konf_broj_rez OFFSET $offsetaj_za";
    
    $sql = $veza->selectDB($upit);

    $polje = array();

    while ($red = $sql->fetch_assoc()) {
        $polje[] = $red;
    }
    $polje[] = ["Broj_stranica" => $broj_stranica,"Trenutna" => $stranica ];
    echo json_encode($polje);

    $veza->zatvoriDB();
}