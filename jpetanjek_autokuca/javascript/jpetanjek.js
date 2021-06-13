/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
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