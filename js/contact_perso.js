$("#envoyer").on('click',function( e ){

	travail(e);

                    
	});
$("#nom, #email").keypress(function(e) {
    if(e.which==13){
        travail(e);

    }



})


function travail(e) {


    $msg='';
    e.preventDefault();
    $('#reponse').slideToggle(200);

    var $url="ajax/contact.php";
    if($("#nom").val().length>=3)
    {

        $("#nom").css('border','1px solid #4cae4c');


        var formData = {
            "nom" 					: $("#nom").val().toUpperCase(),
            "email"					: $("#email").val(),
            "message"					: $("#message").val()
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

                $("#nom").css('border','1px solid #4cae4c');
                $("#email").css('border','1px solid #4cae4c');
                $("#message").css('border','1px solid #4cae4c');
                setTimeout(affiche(), 8000);



                function affiche() {
                    $msg+='<div class="col-md-11 alert alert-success center-block style_connexion" style="float:none" >';
                    $msg+=data.message;
                    $msg+='</div>';

                    $('#stage').slideToggle('slow');
                    $('#reponse').html($msg);
                    $('#reponse').slideToggle('slow');
                }




            }
            else
            {
                $msg+='<div class="col-md-11 alert alert-danger center-block style_connexion" style="float:none" >';
                $msg+=data.message;
                $msg+='</div>';

                $('#reponse').html($msg);
                if(data.id==='email'){
                    $("#email").css('border','1px solid #ed1616');
                }else{
                    $("#message").css('border','1px solid #ed1616');
                    $("#email").css('border','1px solid #4cae4c');
                }

                $('#reponse').slideToggle('slow');
            }


        });
        filterDataRequest.fail(function(jqXHR, textStatus)
        {

            if (jqXHR.status === 0){alert("Not connect.n Verify Network.");}
            else if (jqXHR.status === 404){alert("Requested page not found. [404]");}
            else if (jqXHR.status === 500){alert("Internal Server Error [500].");}
            else if (textStatus === "parsererror"){alert("Requested JSON parse failed.");}
            else if (textStatus === "timeout"){alert("Time out error.");}
            else if (textStatus === "abort"){alert("Ajax request aborted.");}
            else{alert("Uncaught Error.n" + jqXHR.responseText);}
        });







    }
    else
    {
        $msg+='<div class="col-md-11 alert alert-danger center-block style_connexion" style="float:none" >';
        $msg+='Veuillez préciser votre nom';
        $msg+='</div>';
        $('#reponse').html($msg);
        $("#nom").css('border','1px solid #ed1616');
        $('#reponse').slideToggle('slow');
    }




}
