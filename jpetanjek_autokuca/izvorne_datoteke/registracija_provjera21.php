<?php
require'../vanjske_datoteke/baza.class.php';
if (isset($_POST["AJAX_korime"])) {
    $veza = new Baza();
    $veza->spojiDB();
    $korime = $_POST["AJAX_korime"];
    $upit = "SELECT * FROM korisnik WHERE korisnicko_ime = '$korime'";
    $sql = $veza->selectDB($upit);
    if (mysqli_num_rows($sql) > 0) {
        echo'<div>Korisničko ime je zauzeto!</div>';
    } else {
        echo'<div>Korisničko ime je slobodno!</div>';
    }
    $veza->zatvoriDB();
}