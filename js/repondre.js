$("button[name='rep']").click(function (e) {
    //Déclaration des variables
    $url=''//Il s'agit de l'url de la page PHP a contacter
    $msg='';
    $id_message='';
    $type_transaction='';


    $url="ajax/enveloppe.php";//On redirige vers ce fichier pour ensuite exécuter une requete,
    // selon la valeur du type de transaction

    $id_message=$(this).attr('id');
    $type_transaction='repondre';


    var formData = {
        "type_transaction" 					: $type_transaction,
        "id_message" 					: $id_message,

    };

    var filterDataRequest = $.ajax(
        {

            type: "POST",
            url: $url,
            dataType: "json",
            encode          : true,
            data: formData,
        });

    filterDataRequest.done(function(data)
    {


        if (data.success)
        {
            $nom_sender='';
            $prenom_sender='';
            $(data.infos_sender).each(function($index,$value){
                $id_sender=$value[0];
                $nom_sender=$value[1];
                $prenom_sender=$value[2];
            });

            $msg+='<div class="form-overlay"></div>';

            $msg+='<div class="icon fa fa-pencil" id="form-container">';
            $msg+='<span class="icon fa fa-close" id="form-close"></span>';
            $msg+='<div id="form-content">';
            $msg+='<div id="form-head">';
            $msg+='<h3 class="pre" >Envoyer un message à:</h3>';
            $msg+=' <p class="pre"  id="'+$id_sender+'_'+$id_message+'">'+$nom_sender+' '+$prenom_sender+'</p>';
            $msg+='</div>';
            $msg+='<form>';

            $msg+='<textarea class="input message" placeholder="Votre message..." id="message"></textarea>';
            $msg+='<input class="input submit" type="submit" id="submit" value="Envoyer Message">';
            $msg+='</form>';
            $msg+='</div>';
            $msg+='</div>';
           /* $msg+='<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>';*/
           /* $msg+='<script src="http://codepen.io/woodwork/pen/XXZaGQ.js"></script>';*/
            $msg+='<script src="js/index.js"></script>';
            $msg+='<script src="js/repondre_message.js"></script>';


            reponse($msg);

        }
        else
        {

        }


    });

    filterDataRequest.fail(function(jqXHR, textStatus)
    {

        if (jqXHR.status === 0){alert("Not connect.n Verify Network.");}
        else if (jqXHR.status == 404){alert("Requested page not found. [404]");}
        else if (jqXHR.status == 500){alert("Internal Server Error [500].");}
        else if (textStatus === "parsererror"){alert("Requested JSON parse failed.");}
        else if (textStatus === "timeout"){alert("Time out error.");}
        else if (textStatus === "abort"){alert("Ajax request aborted.");}
        else{alert("Uncaught Error.n" + jqXHR.responseText);}
    });







    function reponse($msg) {

        $("#repondre").html($msg);
    }




})

$("button[name='rep']").click(function (){

})