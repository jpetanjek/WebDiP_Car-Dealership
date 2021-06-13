<?php
require '../vanjske_datoteke/baza.class.php';
require '../vanjske_datoteke/sesija.class.php';
Sesija::kreirajSesiju();

$korisnik = $_SESSION['korisnik'];

$statusMsg = '';

$veza = new Baza();
$veza->spojiDB();

if (!isset($_GET['lokacija'])) {
    //echo'Upozorenje';
    header("Location: ../index.php");
} else {
    $lokacija = $_GET['lokacija'];

    $upit_lokacije = "SELECT * FROM lokacija WHERE id_lokacija ='$lokacija'";
    $sql_lokacije = $veza->selectDB($upit_lokacije);

    if ($sql_lokacije->num_rows > 0) {
        $red_lokacije = mysqli_fetch_array($sql_lokacije);
    } else {
        echo'Upozorenje';
        //header("Location: ../index.php");
    }

    $upit_termini = "SELECT * FROM termin WHERE lokacija_id_lokacija ='$lokacija'";
    $sql_termini = $veza->selectDB($upit_termini);
}

/* if (isset($_POST['userfile'])) {
  $korisnik = $_SESSION['korisnik'];
  $upit = "INSERT INTO zahtjev_servis (korisnik_id_korisnik,termin_lokacija_id_lokacija,termin_id_termin,opis,naziv,slika) "
  . "VALUES (1,1,1,1,1,1)";
  $sql = $veza->selectDB($upit);
  } */
$veza->zatvoriDB();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <script>
            $(document).on("click", "#submit", function () {
                $("#generirano").html("pritisnut gumb");
            });
        </script>

    </head>
    <body>
        <?php
        if (isset($_SESSION["korisnik"])) {
            echo "<a href ='../izvorne_datoteke/odjavi.php'><button>Odjava</button></a>";
        } else {
            echo "<a href ='../obrasci/prijava.php'><button>Prijava</button></a>";
        }
        ?> 

        <?php
        echo "
                    <div>
                        <img src='../multimedija/logotipovi/{$red_lokacije['autokuca_id_autokuca']}.png' height='100'>
                        <br>
                        <img src='../multimedija/lokacije/{$red_lokacije['slika']}.png' height='100'>
                        <br>
                        {$red_lokacije['naziv']}
                        <br>
                        {$red_lokacije['adresa']}
                    </div>";
        ?>
        <form  enctype='multipart/form-data' action='../vanjske_datoteke/uploader.php' method='post' novalidate>
            <?php
            echo "<select id='termin' name='termin'>";
            while ($red_termini = mysqli_fetch_array($sql_termini)) {
                if ($red_termini['broj_slobodnih'] > 0) {
                    echo"<option value='{$red_termini['id_termin']}'>{$red_termini['naziv']}</option>";
                }
            }
            ?>
        </select> <br>
        <div>
            <label for='Naziv'>Naziv: </label>
            <input type='text' id='Naziv' name='Naziv' size='20' maxlength='40' placeholder='Naziv' required='required'>
        </div>

        <div>
            <label for='Opis'>Opis: </label>
            <input type='text' id='Opis' name='Opis' maxlength='20' placeholder='Opis' required='required'>
        </div>

        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
        <input type="hidden" name="izvor" value="lokacija" />
        <?php
        echo "<input type=hidden name=lokacija value=$lokacija />";
        echo "<input type=hidden name=korisnik value=$korisnik />";
        ?>
        Preuzmi datoteku: <input name="userfile" type="file" />

        <input type='submit' name='submit' value='Slanje podataka' id='submit'>

    </form>


    <div id="generirano"> test
    </div>
</body>
</html>
