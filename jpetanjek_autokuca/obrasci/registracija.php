<?php
require '../vanjske_datoteke/baza.class.php';

$statusMsg = '';

// If the form is submitted 
if (isset($_POST['submit'])) {
    $prihvatio = $_POST['uvjeti'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $korisnicko_ime = $_POST['korime'];
    $email = $_POST['unosemail'];
    $lozinka = $_POST['lozinkap'];
    $lozinkap = $_POST['lozinkap'];

    $potvrda1 = 0;
    $potvrda2 = 0;
    $potvrda3 = 0;
    $potvrda4 = 0;
    $potvrda5 = 0;

    $veza = new Baza();
    $veza->spojiDB();

    //lozinka mora biti jednaka ponovljenoj
    if ($lozinkap == $lozinka) {
        $potvrda1 = 1;
    } else {
        $statusMsg .= ' Lozinka mora biti jednaka ponovljenoj ';
        $potvrda1 = 0;
    }
    //ime pocinje velikim slovom
    if (preg_match('/^([A-Z])\w+$/', $ime)) {
        $potvrda2 = 1;
    } else {
        $potvrda2 = 0;
        $statusMsg .= ' Ime ne pocinje velikim slovom ';
    }
    //prezime pocinje velikim slovom
    if (preg_match('/^([A-Z])\w+$/', $prezime)) {
        $potvrda3 = 1;
    } else {
        $potvrda3 = 0;
        $statusMsg .= ' Prezime ne pocinje velikim slovom ';
    }
    //lozinka nesmije imati posebne znakove
    if (preg_match('/^\w+$/', $lozinka)) {
        $potvrda4 = 1;
    } else {
        $potvrda4 = 0;
        $statusMsg .= ' Lozinka se sastoji od posebnih znakova ';
    }
    //moraju biti prihvaceni uvjeti
    if (isset($prihvatio)) {
        $potvrda5 = 1;
    } else {
        $potvrda5 = 0;
        $statusMsg .= ' Moraju se prihvatiti uvjeti ';
    }


    // Validate form fields 
    if ($potvrda1 && $potvrda2 && $potvrda3 && $potvrda4 && $potvrda5) {

        // Validate reCAPTCHA box 
        if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
            // Google reCAPTCHA API secret key 
            $secretKey = '*';

            // Verify the reCAPTCHA response 
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['g-recaptcha-response']);

            // Decode json data 
            $responseData = json_decode($verifyResponse);

            // If reCAPTCHA response is valid 
            if ($responseData->success) {
                $upit = "SELECT * FROM korisnik WHERE email ='$email'";
                $sql1 = $veza->selectDB($upit);
                $upit2 = "SELECT * FROM korisnik WHERE korisnicko_ime ='$korisnicko_ime'";
                $sql2 = $veza->selectDB($upit2);
                //postoji li korisnik s istim email ili korisnickim imenom
                if ($sql2->num_rows > 0 && $sql1->num_rows > 0) {
                    $statusMsg .= ' Netko s tim email ili korisnickim imenom vec postoji! ';
                } else {
                    //token generator
                    $token = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890';
                    $token = str_shuffle($token);
                    $aktivacijski_kod = substr($token, 0, 10);

                    $lozinka_hash = password_hash($lozinka, PASSWORD_BCRYPT);

                    $datum = date("Y-m-d H:i:s");

                    $upit = "INSERT INTO korisnik (uloga_id_uloga,ime,prezime,korisnicko_ime,lozinka,lozinka_hash,email,datum_vrijeme_uvjet, prihvatio_uvjete,aktivacijski_kod,aktiviran,blokiran,broj_promasenih_prijava) "
                            . "VALUES ('4','$ime','$prezime','$korisnicko_ime','$lozinka','$lozinka_hash','$email','$datum','1','$aktivacijski_kod','0','0','0')";

                    $veza->selectDB($upit);

                    $statusMsg .= ' Uspjesna registracija! Provjerite MAIL! ';


                    $mail_from = "From: jpetanjek@foi.hr";
                    $mail_subject = "Autokuce aktivacijski kod!";
                    $mail_body = " Kliknite na link da bi ste aktivirali racun! <br>"
                            . "<a href='http://barka.foi.hr/WebDiP/2018_projekti/WebDiP2018x112/obrasci/aktivacija.php?email=$email&aktivacijski_kod=$aktivacijski_kod>Klik ovdje!</a>";

                    if (mail($email, $mail_subject, $mail_body, $mail_from)) {
                        $statusMsg .= "Uspjesno poslan mail!";
                    } else {
                        $statusMsg .= "Problem kod slanja maila!";
                    }
                }
            } else {
                $statusMsg .= ' Vi ste robot! ';
            }
        } else {
            $statusMsg .= ' Provjerite reCAPTCHA ';
        }
    } else {
        $statusMsg .= ' Ispunite sva potrebna polja ';
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
        <title>Registracija</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="naslov" content="Registracija">
        <meta name="author" content="Josip Petanjek">
        <meta name="keywords" content="Registracija,Obrasci,Registriraj">
        

        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>      

        <script type="text/javascript" src="../javascript/jpetanjek_jquery.js"></script>


        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        <script>
            $(document).ready(function () {
                $("#korime").keyup (function () {
                    var korimeAJAX = $(this).val();
                    $.ajax({
                        url: "../izvorne_datoteke/registracija_provjera21.php",
                        method: "POST",
                        data: {AJAX_korime: korimeAJAX},
                        dataType: "text",
                        success: function (rezultat)
                        {
                            $("#provjera").html(rezultat);
                        }
                    });
                });
            });
        </script>

    </head>
    <body>
        <header id="header">
            <h1 id="pocetak">Registracija</h1>

        </header>
        <nav>
            <div class="navigacija">
                <a target="a" href="../index.php">Početak</a>
                <a href="../ostalo/multimedija.html">Multimedija</a>
                <a href="../ostalo/popis.html">Popis</a>
                <a href="obrazac.html">Obrazac</a>
                <a href="prijava.html">Prijava</a>
                <a href="registracija.html">Registracija</a>
            </div>
        </nav>


        <section>
            <!-- Status message -->
            <?php
            if (!empty($statusMsg)) {
                echo $statusMsg . "<br><br>";
            }
            ?>

            <form novalidate="" method="post" name="registracija" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

                <div>
                    <label for="ime">Ime: </label>
                    <input type="text" id="ime" name="ime" size="15" maxlength="15" placeholder="Ime" autofocus="autofocus" required="required">
                </div>

                <div>
                    <label for="prezime">Prezime: </label>
                    <input type="text" id="prezime" name="prezime" size="20" maxlength="40" placeholder="Prezime" required="required">
                </div>

                <div>
                    <label for="korime">Korisničko ime: </label>
                    <input type="text" id="korime" name="korime" maxlength="20" placeholder="Korisničko ime" required="required">
                    <div id="provjera"></div>
                </div>

                <div>
                    <label for="unosemail">Email: </label>
                    <input type="email" id="unosemail" name="unosemail" placeholder="Email" required="required">
                </div>

                <div>
                    <label for="lozinka">Lozinka: </label>
                    <input type="password" id="lozinka" name="lozinka" placeholder="Lozinka" required="required">
                </div>

                <div>
                    <label for="lozinkap">Potvrda lozinke: </label>
                    <input type="password" id="lozinkap" name="lozinkap" placeholder="Potvrda lozinke" required="required">
                </div>

                <div>
                    <label for="uvjeti">Prihvaćam uvjete: </label>
                    <input type="checkbox" id="uvjeti" name="uvjeti" value="uvjeti">
                </div>

                <div class="g-recaptcha" data-sitekey="6LfUMKUUAAAAAJhNTu6I4IfJELcg2NSZ27goW2CD"></div>

                <br/>

                <input type="submit" name="submit" value="Slanje podataka">

            </form>

        </section>

        
        
        <br>

        <footer id ="kraj">
            <address><strong>Kontakt: </strong><a href="mailto:jpetanjek@foi.hr">Josip Petanjek</a></address>
            <a href="http://validator.w3.org/check?uri=referer"> <img src="../multimedija/HTML5.png" alt="HTML" height="100"> </a>
            <a href="http://jigsaw.w3.org/css-validator/check?uri=referer"><img src="../multimedija/CSS3.png" alt="CSS" height="100"></a>
            <p>&copy; 2019 J. Petanjek</p> 
        </footer>
    </body>
</html>
