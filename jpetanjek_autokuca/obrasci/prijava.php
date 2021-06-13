<?php
// https
if ($_SERVER['HTTPS'] != "on") {
    $url = "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    header("Location: $url");
    exit;
}

require '../vanjske_datoteke/baza.class.php';
require '../vanjske_datoteke/sesija.class.php';

$statusMsg = '';

if (isset($_POST["submit"])) {
    $korime = $_POST['korime'];
    $lozinka = $_POST['lozinka'];

    if (isset($korime) && isset($lozinka)) {
        $veza = new Baza();
        $veza->spojiDB();

        $upit = "SELECT * FROM korisnik WHERE "
                . "korisnicko_ime = '{$korime}' OR email = '{$korime}'";
        $sql = $veza->selectDB($upit);
        if ($sql->num_rows > 0) {
            $red = mysqli_fetch_array($sql);

            //dobavljanje konfiguracije
            $upit_blokiraj = "SELECT `Broj_prijava` FROM `kofiguracija` WHERE 1";
            $sql_blokiraj = $veza->selectDB($upit_blokiraj);
            $red_blokiraj = mysqli_fetch_row($sql_blokiraj);

            if ($red['aktiviran'] == 1 && $red['broj_promasenih_prijava'] < $red_blokiraj[0]) {
                if (password_verify($lozinka, $red['lozinka_hash'])) {
                    $statusMsg .= 'Uspjesno ste se ulogirali!';
                    $tip = $red['uloga_id_uloga'];
                    echo "$korime $tip";
                    Sesija::kreirajKorisnika($korime, $tip);

                    //kolacic
                    if (isset($_POST['zapamtime'])) {
                        setcookie('zadnji_login_autokuca_jpetanjek', $korime, time() + 60 * 60 * 7);
                    }
                } else {
                    $statusMsg .= 'Nije unesena pravilno korisničko ime ili lozinka!';

                    //update broj promasenih +1
                    $broj = $red['broj_promasenih_prijava'] + 1;
                    $upit_update = "UPDATE `korisnik` SET `broj_promasenih_prijava` = '$broj' WHERE `korisnik`.`id_korisnik` = {$red['id_korisnik']}";
                    $sql_update = $veza->selectDB($upit_update);
                }
            } else {
                if ($red['aktiviran'] == 0) {
                    $statusMsg .= 'Morate aktivirati racun! Provjerite mail!';
                }
                if ($red['broj_promasenih_prijava'] >= $red_blokiraj[0]) {
                    $statusMsg .= 'Previse puta ste promasili prijavu! Obratite se Adminu!';
                }
            }
        } else {
            $statusMsg .= 'Nije unesena pravilno korisničko ime ili lozinka!';
        }
    } else {
        $statusMsg .= 'Nije unjeta lozinka ili korisničko ime';
    }
    $veza->zatvoriDB();
}

//dodaj iz cookie u polje
$korisnicko_cookie='';
if(isset($_COOKIE['zadnji_login_autokuca_jpetanjek'])){
    $korisnicko_cookie=$_COOKIE['zadnji_login_autokuca_jpetanjek'];
}
?>

<!DOCTYPE html>
<!--

To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="hr">
    <head>
        <title>Prijava</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width = device-width, initial-scale = 1.0">
        <meta name="naslov" content="Prijava">
        <meta name="author" content="Josip Petanjek">
        <meta name="keywords" content="Prijava, Login, Lozinka">
    </style>
</head>
<body>
    <header id="header">
        <h1 id="pocetak">Prijava</h1>

    </header>
    <nav>
    </nav>

    <?php
    if (isset($_SESSION["korisnik"])) {
        echo "<a href ='../izvorne_datoteke/odjavi.php'><button>Odjava</button></a>";
    } else {
        echo "<a href ='prijava.php'><button>Prijava</button></a>";
    }
    ?> 
    <br>

    <section>
        <form id="prijava" method="post" name="prijava" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

            <div>
                <label for="korime">Korisničko ime: </label>
                <input type="text" id="korime" name="korime" maxlength="20" placeholder="Korisničko ime" required="required" value="<?php echo $korisnicko_cookie ?>">
            </div>

            <div>
                <label for="lozinka">Lozinka: </label>
                <input type="password" id="lozinka" name="lozinka" placeholder="Lozinka" required="required">
            </div>

            <div>
                <input type="checkbox" name="zapamtime" checked='checked' > Zapamti me <br>
            </div>

            <div>
                <input name="submit" type="submit" value="Slanje podataka">
            </div>

        </form>
    </section>
    
    <a href ='zaboravio_lozinku.php'><button>Zaboravio lozinku?</button></a>

    <?php
    if (!empty($statusMsg)) {
        echo $statusMsg . "<br><br>";
    }
    ?>

    <table>
        <tr>
            <th>Uloga</th>
            <th>Korisnicko ime</th>
            <th>Lozinka</th>
        </tr>
        <tr>
            <td>Admin</td>
            <td>jpetanjek</td>
            <td>1234</td>
        </tr>
        <tr>
            <td>Moderator</td>
            <td>mpetanjek</td>
            <td>12345</td>
        </tr>
        <tr>
            <td>Registrirani korisnik</td>
            <td>apetanjek</td>
            <td>123456789</td>
        </tr>
    </table>

    <br>
    <footer id ="kraj" >
        <address><strong>Kontakt: </strong><a href="mailto:jpetanjek@foi.hr">Josip Petanjek</a></address>
        <a href="http://validator.w3.org/check?uri=referer"> <img src="../multimedija/HTML5.png" alt="HTML" width="100"> </a>
        <a href="http://jigsaw.w3.org/css-validator/check?uri=referer"><img src="../multimedija/CSS3.png" alt="CSS" width="100"></a>
        <p>&copy; 2019 J. Petanjek</p> 
    </footer>
</body>
</html>
