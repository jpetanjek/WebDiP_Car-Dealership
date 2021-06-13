<?php
require '../vanjske_datoteke/baza.class.php';
require '../vanjske_datoteke/sesija.class.php';

$statusMsg = '';

if (isset($_POST["submit"])) {
    $korime = $_POST['korime'];

    if (isset($korime)) {
        $veza = new Baza();
        $veza->spojiDB();

        $upit = "SELECT * FROM korisnik WHERE "
                . "korisnicko_ime = '{$korime}' OR email = '{$korime}'";
        $sql = $veza->selectDB($upit);
        if ($sql->num_rows > 0) {
            $red = mysqli_fetch_array($sql);
            $email = $red['email'];
            //generiraj lozinku
            $token = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890';
            $token = str_shuffle($token);
            $lozinka = substr($token, 0, 10);
            $lozinka_hash = password_hash($lozinka, PASSWORD_BCRYPT);


            
            $upit_update = "UPDATE `korisnik` SET `lozinka` = '$lozinka', `lozinka_hash` = '$lozinka_hash' WHERE `korisnik`.`id_korisnik` = {$red['id_korisnik']}";
            $sql_update = $veza->selectDB($upit_update);

            $statusMsg .= ' Uspjesno izmjenjena lozinka! ';


            $mail_from = "From: jpetanjek@foi.hr";
            $mail_subject = "Autokuce izmjena lozinke!";
            $mail_body = " Vasa nova lozinka je: $lozinka ";

            if (mail($email, $mail_subject, $mail_body, $mail_from)) {
                $statusMsg .= "Uspjesno poslan mail!";
            } else {
                $statusMsg .= "Problem kod slanja maila!";
            }
        } else {
            $statusMsg .= 'Ne postoji taj korisnik ili mail!';
        }
    } else {
        $statusMsg .= 'Nije uneseno korisnicko ime ili mail!';
    }
    $veza->zatvoriDB();
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
                <label for="korime">Korisničko ime ili email: </label>
                <input type="text" id="korime" name="korime" maxlength="20" placeholder="Korisničko ime" required="required">
            </div>

            <div>
                <input name="submit" type="submit" value="Slanje podataka">
            </div>

        </form>
    </section>



    <?php
    if (!empty($statusMsg)) {
        echo $statusMsg . "<br><br>";
    }
    ?>



    <br>
    <footer id ="kraj" >
        <address><strong>Kontakt: </strong><a href="mailto:jpetanjek@foi.hr">Josip Petanjek</a></address>
        <a href="http://validator.w3.org/check?uri=referer"> <img src="../multimedija/HTML5.png" alt="HTML" width="100"> </a>
        <a href="http://jigsaw.w3.org/css-validator/check?uri=referer"><img src="../multimedija/CSS3.png" alt="CSS" width="100"></a>
        <p>&copy; 2019 J. Petanjek</p> 
    </footer>
</body>
</html>
