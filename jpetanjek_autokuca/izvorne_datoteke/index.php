<?php
require '../vanjske_datoteke/baza.class.php';

$veza = new Baza();
$veza->spojiDB();

$upit = "SELECT * FROM autokuca";
$sql = $veza->selectDB($upit);
$polje = array();
while($red = $sql->fetch_assoc()){
    $polje[] = $red;
}

echo json_encode($polje);

