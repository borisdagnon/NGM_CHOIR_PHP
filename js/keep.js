/************************************A partir d'ici on va chercher les réponses des messages s'il y en a on les affichent**********************************************/


var $url = "ajax/charge_recu_envoye.php";
$action = 'envoye';
$sous_action = 'complexe';


var formData = {
    "action": $action,
    "id_message": $id_message,
    "sous_action": $sous_action,

};

var filterDataRequest = $.ajax(
    {

        type: "POST",
        url: $url,
        dataType: "json",
        encode: true,
        data: formData,
    });

filterDataRequest.done(function (data) {


    if (data.success) {

        $(data.result_complexe).each(function ($index, $value) {
            //On place le trait s'il y a des réponses au message de base
            $msg += '<div style="width: 100%; border-bottom-style: solid; margin-top: 10px; margin-bottom: 10px"></div>';
            $msg += $value[0] + ' - ' + $value[1];
            $msg += ' ' + $value[2];
        })





    } else {
        $msg += '';
        $msg += '</div>';
        $msg += '</div>';
    }


    filterDataRequest.fail(function (jqXHR, textStatus) {

        if (jqXHR.status === 0) {
            alert("Not connect.n Verify Network.");
        }
        else if (jqXHR.status == 404) {
            alert("Requested page not found. [404]");
        }
        else if (jqXHR.status == 500) {
            alert("Internal Server Error [500].");
        }
        else if (textStatus === "parsererror") {
            alert("Requested JSON parse failed.");
        }
        else if (textStatus === "timeout") {
            alert("Time out error.");
        }
        else if (textStatus === "abort") {
            alert("Ajax request aborted.");
        }
        else {
            alert("Uncaught Error.n" + jqXHR.responseText);
        }
    });

    $("#charge").html($msg);

})

/********************************************************************************************************************************************************************/
