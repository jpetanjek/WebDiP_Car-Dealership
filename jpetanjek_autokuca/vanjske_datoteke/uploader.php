
<?php

require'../vanjske_datoteke/baza.class.php';

$veza = new Baza();
$veza->spojiDB();

$userfile = $_FILES['userfile']['tmp_name'];
$userfile_name = $_FILES['userfile']['name'];
$userfile_size = $_FILES['userfile']['size'];
$userfile_type = $_FILES['userfile']['type'];
$userfile_error = $_FILES['userfile']['error'];
if ($userfile_error > 0) {
    echo 'Problem: ';
    switch ($userfile_error) {
        case 1: echo 'Veličina veća od ' . ini_get('upload_max_filesize');
            break;
        case 2: echo 'Veličina veća od ' . $_POST["MAX_FILE_SIZE"] . 'B';
            break;
        case 3: echo 'Datoteka djelomično prenesena';
            break;
        case 4: echo 'Datoteka nije prenesena';
            break;
    }
    exit;
}

$izvor = $_POST["izvor"];

switch ($izvor) {
    case "lokacija":
        if ($userfile_type == 'image/jpg' || $userfile_type == 'image/png') {
            $upfile = '../multimedija/zahtjev_servis/' . $userfile_name;
        }

        break;
}
$upfile = '../multimedija/zahtjev_servis/' . $userfile_name;

/*
  if(!preg_match('/^\w{1,20}\.\w{3}$/', $userfile_name)){
  echo 'Preveliko ime';
  exit;
  }
  else{
  echo 'Ime je dobro: '. $userfile_name . '<br>';
  }


  if(($userfile_type == 'image/jpg' || $userfile_type == 'image/png')&& $userfile_size <= 250000){
  $upfile = '../multimedija/slika/' . $userfile_name;
  }

  elseif($userfile_type == 'audio/mp3' && $userfile_size <= 500000){
  $upfile = '../multimedija/audio/' . $userfile_name;
  }

  elseif($userfile_type == 'video/mp4' && $userfile_size <= 500000){
  $upfile = '../multimedija/video/' . $userfile_name;
  }


  else{
  echo 'Problem: datoteka nije slika ili audio ili video ' . $userfile;
  exit;
  }

 */
if (is_uploaded_file($userfile)) {
    if (!move_uploaded_file($userfile, $upfile)) {
        echo 'Problem: nije moguće prenijeti datoteku na odredište';
        exit;
    }
} else {
    echo 'Problem: mogući napad prijenosom. Datoteka: ' . $userfile_name;
    exit;
}

$korisnik=$_POST['korisnik'];
$upit_korisnik = "SELECT id_korisnik FROM `korisnik` WHERE korisnicko_ime = '$korisnik'";
$sql = $veza->selectDB($upit_korisnik);
$red = mysqli_fetch_row($sql);
$korisnik_id=$red[0];


$naziv = $_POST["Naziv"];
$Opis = $_POST["Opis"];
$termin = $_POST["termin"];
$lokacija = $_POST["lokacija"];

//$upit = "INSERT INTO zahtjev_servis (korisnik_id_korisnik, termin_lokacija_id_lokacija, termin_id_termin1, opis, naziv, slika) VALUES ( $korisnik_id, $lokacija, $termin, $Opis, $naziv, $userfile_name )";
$upit = "INSERT INTO zahtjev_servis (korisnik_id_korisnik, termin_lokacija_id_lokacija, termin_id_termin1, opis, naziv, slika) VALUES ( $korisnik_id, $lokacija, $termin, $Opis, '$naziv', '$userfile_name' )";

$veza->selectDB($upit);
$veza->zatvoriDB();

echo "$korisnik_id $naziv $Opis $termin $lokacija $userfile_name";

