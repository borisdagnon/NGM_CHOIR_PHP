
$(".notify-closer").on('click',function () {
    $("#notify").remove();
})

$("#maj").click(function( e ){
e.preventDefault();



    if($("#nom").val().length>=2 || $("#prenom").val().length>=2 || $("#mdp").val().length>=6)
    {

if($("#nom").val().length>=2){
    $type='nom';//Le type correspond au type de la donnée récupérée(nom,prénom,mdp)
    $donnee=$("#nom").val().toUpperCase();//La donnée correspond à l'information récupérée

    suite($type,$donnee);
}else{
    if($("#prenom").val().length>=2){

$type='prenom';//Le type correspond au type de la donnée récupérée(nom,prénom,mdp)
$donnee=$("#prenom").val().charAt(0).toUpperCase() + $("#prenom").val().substring(1).toLowerCase();
        suite($type,$donnee);//La donnée correspond à l'information récupérée
    }
    else {
        if($("#mdp").val().length>=6){
            $type='mdp';//Le type correspond au type de la donnée récupérée(nom,prénom,mdp)
            $donnee=$("#mdp").val();//La donnée correspond à l'information récupérée
            suite($type,$donnee);
        }
    }
}

    }else{
        rail('info','non','');
    }


    function suite($type,$donnee) {
        var formData=null;

        if($type=='nom'){

            formData = {
                "type"                  :$type,
                "nom" 					: $donnee,

            };

        }else{
            if($type=='prenom'){

                formData = {

                    "type"                  :$type,
                    "prenom" 					: $donnee,

                };

            }else
            {
                if($type=='mdp'){

                    formData = {

                        "type"                  :$type,
                        "mdp" 					: $donnee,

                    };
                }
            }
        }

        var $url="ajax/maj_info_chanteur.php";



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
$cas='maj';
$reponse='success';

rail($cas,$reponse,data.message);

            }
            else
            {
                $cas='maj';
                $reponse='erreur';
                rail($cas,$reponse,data.message);

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





     function rail($cas,$reponse,$message){
        $msg='';

if($cas=='info' && $reponse=='non'){
    $msg+='<div class="notify alert" id="notify">';
    $msg+='<span class="notify-title">Ouuppss</span>';
    $msg+='<span class="notify-text">Précisez votre nouveau nom, prénom ou mot de passe</span>';
    $msg+='<span class="notify-closer" ></span>';
    $msg+='</div>  <script type="text/javascript" src="./js/informations.js"></script>';

    $("#msg").html($msg)
}else{
    if($cas=='maj' && $reponse=='erreur'){
        $msg+='<div class="notify alert" id="notify">';
        $msg+='<span class="notify-title">Ouuppss</span>';
        $msg+='<span class="notify-text">'+$message+'</span>';
        $msg+='<span class="notify-closer" ></span>';
        $msg+='</div>  <script type="text/javascript" src="./js/informations.js"></script>';
        $("#msg").html($msg)
    }else{
        $msg+='<div class="notify success" id="notify">';
        $msg+='<span class="notify-title">OK</span>';
        $msg+='<span class="notify-text">'+$message+'</span>';
        $msg+='<span class="notify-closer" ></span>';
        $msg+='</div>  <script type="text/javascript" src="./js/informations.js"></script>';
        $("#msg").html($msg)
    }
}


    }

})