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
    </head>
    <body>
        <table style="width:100%">
            <tr>
                <th>Korisničko ime</th>
                <th>Prezime</th> 
                <th>Ime</th>
                <th>Email</th>
                <th>Lozinka</th>
            </tr>
            <?php
            require '../vanjske_datoteke/baza.class.php';

            $veza = new Baza();
            $veza->spojiDB();

            $upit = "SELECT * FROM korisnik";
            $sql = $veza->selectDB($upit);
            if ($sql->num_rows > 0) {
                while ($red = mysqli_fetch_array($sql)) {
                    echo" <tr>
                    <td>{$red['korisnicko_ime']}</td>
                    <td>{$red['prezime']}</td> 
                    <td>{$red['ime']}</td>
                    <td>{$red['email']}</td>
                    <td>{$red['lozinka']}</td>
                    </tr>";
                }
            }
            $veza->zatvoriDB();
            ?>
    </body>
</html>
