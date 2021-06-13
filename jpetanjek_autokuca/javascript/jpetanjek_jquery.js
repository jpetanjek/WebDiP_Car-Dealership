/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function mojafunkcija() {
    $('#mojatablica').DataTable();
}

$(document).ready(function () {

    $uvjet1_uvjet = 0;
    $uvjet2_korime = 0;
    $uvjet3_email = 0;
    $uvjet4_lozinka = 0;
    $uvjet5_lozinkap = 0;

    //slanje disabled
    $('#registracijaposalji').prop('disabled', true);

    //mora prihvatiti uvijete
    $("#uvjeti").change(function () {
        if ($("#uvjeti").prop('checked', true)) {
            $uvjet1_uvjet = 1;
            provjeri();
        } else {
            $uvjet1_uvjet = 0;
            provjeri();
        }
    });

    //mora imati minimalno 4 znaka u korisnickom imenu
    $("#korime").keyup(function () {
        var VAL = $('#korime').val();
        var email = /^\w{4,}$/g;
        if (!email.test(VAL)) {
            $("#korime").addClass("krivo");
            $uvjet2_korime = 0;
            provjeri();
        } else {
            $("#korime").removeClass("krivo");
            $uvjet2_korime = 1;
            provjeri();
        }
    });

    //ispravan email jpetanjek@foi.hr
    $("#unosemail").keyup(function () {
        var VAL = $('#unosemail').val();
        var email = /^(\w+\.?)+@(\w*\.{1}\w{2,})+$/g;
        if (!email.test(VAL)) {
            $("#unosemail").addClass("krivo");
            $uvjet3_email = 0;
            provjeri();
        } else {
            $("#unosemail").removeClass("krivo");
            $uvjet3_email = 1;
            provjeri();
        }
    });

    //minimalno 4 znaka u lozinci
    $("#lozinka").keyup(function () {
        var VAL = $('#lozinka').val();
        var email = /^\w{4,}$/g;
        if (!email.test(VAL)) {
            $("#lozinka").addClass("krivo");
            $uvjet4_lozinka = 0;
            provjeri();
        } else {
            $("#lozinka").removeClass("krivo");
            $uvjet4_lozinka = 1;
            provjeri();
        }
    });
    //lozinka ista kao i lozinkap
    $("#lozinkap").keyup(function () {
        if ($("#lozinkap").val() !== $("#lozinka").val()) {
            $("#lozinkap").addClass("krivo");
            $uvjet5_lozinkap = 0;
            provjeri();
        } else {
            $("#lozinkap").removeClass("krivo");
            $uvjet5_lozinkap = 1;
            provjeri();
        }
    });
    
    // funkcija za provjeru
    function provjeri() {
        if ($uvjet1_uvjet && $uvjet2_korime && $uvjet3_email && $uvjet4_lozinka && $uvjet5_lozinkap) {
            $('#submit').prop('disabled', false);
        }
    }

});