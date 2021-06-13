<?php
require '../vanjske_datoteke/baza.class.php';

$statusMsg = '';

$veza = new Baza();
$veza->spojiDB();

if (!isset($_GET['autokuca'])) {
    header("Location: ../index.php");
} else {
    $autokuca = $_GET['autokuca'];

    $upit_autokuca = "SELECT * FROM autokuca WHERE id_autokuca ='$autokuca'";
    $sql_autokuca = $veza->selectDB($upit_autokuca);

    if ($sql_autokuca->num_rows > 0) {
        $red_autokuca = mysqli_fetch_array($sql_autokuca);
    } else {
        header("Location: ../index.php");
    }

    $upit_lokacije = "SELECT * FROM lokacija WHERE autokuca_id_autokuca ='{$red_autokuca['id_autokuca']}'";
    $sql_lokacije = $veza->selectDB($upit_lokacije);
    
}
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
    </head>
    <body>
        <?php
        echo "<div>
                        <img src='../multimedija/logotipovi/{$red_autokuca['logo']}.png' height='100' alt='{$red_autokuca['naziv']}'>
                        <br>
                        {$red_autokuca['naziv']}
                        <br>
                        {$red_autokuca['informacije']}
                    </div>";

        while ($red_lokacije = mysqli_fetch_array($sql_lokacije)) {
                echo"
                    <a href='http://barka.foi.hr/WebDiP/2018_projekti/WebDiP2018x112/neregistrirani/lokacija.php?lokacija={$red_lokacije['id_lokacija']}'>
                    <div>
                        <br>
                        {$red_lokacije['naziv']}
                        <br>
                        {$red_lokacije['adresa']}
                    </div> 
                    </a>";
            }
        ?>
    </body>
</html>
