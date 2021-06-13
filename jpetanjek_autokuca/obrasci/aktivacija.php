<?php
require '../vanjske_datoteke/baza.class.php';

$statusMsg = '';

$veza = new Baza();
$veza->spojiDB();

if (!isset($_GET['email']) || !isset($_GET['aktivacijski_kod'])) {
    header("Location: registracija.php");
} else {
    $email = $_GET['email'];
    $aktivacijski_kod = $_GET['aktivacijski_kod'];

    $upit_korisnik = "SELECT * FROM korisnik WHERE email ='$email'";
    $sql_korisnik = $veza->selectDB($upit_korisnik);

    //http://barka.foi.hr/WebDiP/2018_projekti/WebDiP2018x112/obrasci/aktivacija.php?email=jpetanjek@foi.hr&aktivacijski_kod=JZNG0DCs9F
    if ($sql_korisnik->num_rows > 0) {
        $red_korisnik = mysqli_fetch_array($sql_korisnik);

        //[9] - datum 2019-05-25 13:36:29
        //[12] - aktiviran
        //[15] - aktivacijski kod
        //ako je datum + vrijeme za aktivaciju < trenutno onda oznaci korisnika kao aktiviranog i promjeni ulogu
        //u protivnom obrisi korisnika iz db i preusmjeri na registraciju
        //
        //dobavi konfiguracijsko vrijeme za aktivaciju
        $upit_vrijeme = "SELECT `Sati_za_aktivaciju` FROM `kofiguracija` WHERE 1";
        $sql_vrijeme = $veza->selectDB($upit_vrijeme);

        if ($sql_vrijeme->num_rows > 0) {
            $red_vrijeme = mysqli_fetch_row($sql_vrijeme);

            $trenutno_vrijeme = date("Y-m-d H:i:s");
            $reg_plus_konf = DateTime::createFromFormat('Y-m-d H:i:s', $red_korisnik['datum_vrijeme_uvjet']);
            $reg_plus_konf->modify("+$red_vrijeme[0] hours");

            if (($reg_plus_konf->format('Y-m-d H:i:s') > $trenutno_vrijeme) && $aktivacijski_kod == $red_korisnik['aktivacijski_kod'] && $red_korisnik['aktiviran'] == 0) {
                $statusMsg .= "Uspjesna registracija! " . '<br>' . "Do kada traje aktivacija: " . $reg_plus_konf->format('Y-m-d H:i:s') . '<br>' . "Trenutno vrijeme: " . $trenutno_vrijeme;

                //update korisnika kao aktiviranog 1 i kao registriranog 3 + datum registracije
                $upit_update = "UPDATE `korisnik` SET `uloga_id_uloga` = '3', `datum_registracije` = '$trenutno_vrijeme', `aktiviran` = '1' WHERE `korisnik`.`id_korisnik` = {$red_korisnik['id_korisnik']}";
                $veza->selectDB($upit_update);
            } else {
                //obrisi korisnika iz db
                //ako nije aktiviran
                if ($red_korisnik['aktiviran'] == 0) {
                    $upit_delete = "DELETE FROM `korisnik` WHERE `korisnik`.`id_korisnik` = {$red_korisnik['id_korisnik']}";
                    $veza->selectDB($upit_delete);
                    $statusMsg .= "Pre kasno ste aktivirali račun ili ste predali krivi aktivacijski kod! Registrirajte se ponovo! ";
                }
                //ako je aktiviran ga obavijesti o tome
                else{
                     $statusMsg .= "Već ste aktivirani!";
                }
            }
        } else {
            $statusMsg .= 'Nije postavljeno konfiguracijsko vrijeme!';
        }
    } else {
        $statusMsg .= 'Ovaj korisnik ne postoji, molimo ponovite registraciju!';
    }
}
$veza->zatvoriDB();
?>

<html>
    <head>
        <title>Aktivacija</title>
    </head>
    <body>
        <?php
        if (!empty($statusMsg)) {
            echo $statusMsg . "<br><br>";
        }
        ?>
    </body>
</html>
