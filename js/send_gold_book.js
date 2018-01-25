$("#send").click(function( e ){

    e.preventDefault();


    var $url="ajax/send_gold_book.php";
    if($("#nom").val().length>=3 && $("#prenom").val().length>=3)
    {


        var formData = {
            "nom" 					: $("#nom").val(),
            "prenom"			        : $("#prenom").val(),
            "comment"                                 : $("#comment").val()

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
                $msg='';



          $(data.result).each(function($index,$value){



              $msg+='<div class="center-block row" style="float:none"  id="gold_book_post">';
              $msg+='<div class="col-md-3 text-center" id="nom_prenom" ><p><b>'+$value[0]+' '+$value[1]+'</b></p></div>';
              $msg+='<div class="col-md-4 text center" id="date_comment"><p>'+$value[2]+'</p></div>';
              $msg+='<div class="col-md-6 text-center" id="commentaire">'+$value[3]+'</div>';
              $msg+='</div>';

              $('#container_gold_book').html($msg);

                });




                $('.cont-contactBtn').slideToggle('slow');
                $('#login-success').html(data.message);
                $('#login-success').slideToggle('slow');


            }
            else
            {
                $('#login-non_success').html(data.message);
                $('#login-non_success').slideToggle('slow');
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
    else
    {
        $('#login-non_success').html('Veuillez préciser votre nom et votre prénom');
        $('#login-non_success').slideToggle('slow');
    }


});
   

			