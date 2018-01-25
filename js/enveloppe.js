$("div[name^='pan_']").click(function(){
    //Déclaration des variables
    $url='';//Il s'agit de l'url de la page PHP a contacter
    $val='';//Il s'agit de l'identifiant du message
    $span='';
    $reponse='';
    $id_message='';
    $type_transaction='';

    $url='ajax/enveloppe.php';

    $val=$(this).attr('name');//On récupère la valeur name du div sur lequelle il a cliqué
    $val= $val.split("_")[1];//On récupère le premier caractère après le tirait qui correspond à l'id du message
    $span_name=$('span[name="s_'+$val+'"]').attr('name');//On récupère ensuite la valeur du name du span
$span_id=$('span[name="s_'+$val+'"]').attr('id');
    //On change la valeur de class si il click sur le message, l'enveloppe cesse de vibrer,


    if($span_id==0){

        // pour faire comprendre au lecteur qu'il à lu le message
        $('span[name="'+$span_name+'"]').attr('class','mif-envelop');

        $reponse=1;
        $id_message=$val;
        $type_transaction='enveloppe';

        var formData = {
            "type_transaction" 					: $type_transaction,
            "reponse" 					: $reponse,
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





    }




})