$("#envoyer").on('click',function( e ){

    travail(e);


});

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}


function valider_numero($numero) {


    var chiffres = new String($numero);

// Enlever tous les charactères sauf les chiffres
    chiffres = chiffres.replace(/[^0-9]/g, '');

// Le champs est vide
    if ( $numero == "" )
    {
        return false;
    }

// Nombre de chiffres
    compteur = chiffres.length;

    if (compteur!=10)
    {
        return false;
    }

    else
    {
       return true;
    }

}

function travail(e) {


    $msg='';
    e.preventDefault();
    $('#reponse').slideToggle(200);

    var $url="ajax/inscription_groupe.php";
    if($("#nom_rep").val().length>=3) {

        reponse('success','nom_rep','');

        if ($("#prenom_rep").val().length >= 3) {

            reponse('success', 'prenom_rep', '');

            if ($("#nom_groupe").val().length >= 3) {

                reponse('success', 'nom_groupe', '');

                if (validateEmail($("#email_groupe").val())) {

                    reponse('success', 'email_groupe', '');

                    if (valider_numero($("#tel").val())) {
                        reponse('success', 'tel', '');



                    var formData = {
                        "nom_rep": $("#nom_rep").val().toUpperCase(),
                        "prenom_rep": $("#prenom_rep").val(),
                        "nom_groupe": $("#nom_groupe").val(),
                        "email_groupe": $("#email_groupe").val(),
                        "tel": $("#tel").val()
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

                            reponse('success_final', '', data.message);
                        }
                        else {
                            reponse('erreur', '', data.message);
                        }


                    });
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
                }else {
                        reponse('erreur','tel','Le numéro saisi n\'est pas correcte');
                    }
            }else{
                    reponse('erreur','email_groupe','L\'email n\'est pas valide');
                }
        }else{
                reponse('erreur','nom_groupe','Veuillez préciser le nom de votre groupe');
            }

        }else{
            reponse('erreur','prenom_rep','Veuillez préciser le prénom du représentant');
        }

    }else{
        reponse('erreur','nom_rep','Veuillez préciser le nom du représentant');
    }

    function reponse($type_message,$id_input,$valeur){
        $msg='';
        if($type_message=='erreur'){

            $msg+='<div class="col-md-11 alert alert-danger center-block style_connexion" style="float:none" >';
            $msg+=$valeur;
            $msg+='</div>';
            $('#reponse').html($msg);
            $("#"+$id_input+"").css('border','1px solid #ed1616');
            $('#reponse').slideToggle('slow');


        }else{
            if($type_message=='success'){

                $("#"+$id_input+"").css('border','1px solid #4cae4c');

            }else{
                if($type_message=='success_final'){
                    $msg+='<div class="col-md-11 alert alert-success center-block style_connexion" style="float:none" >';
                    $msg+=$valeur;
                    $msg+='</div>';
                    $('#reponse').html($msg);
                    $('#audition_container').slideToggle('slow');
                    $('#reponse').slideToggle('slow');
                }else {
                    $msg+='<div class="col-md-11 alert alert-danger center-block style_connexion" style="float:none" >';
                    $msg+=$valeur;
                    $msg+='</div>';
                    $('#reponse').html($msg);
                    $('#reponse').slideToggle('slow');
                }
            }
        }

    }



}



