<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../vanjske_datoteke/sesija.class.php';

Sesija::dajKorisnika();
Sesija::obrisiSesiju();

header("Location: ../index.php");
?>