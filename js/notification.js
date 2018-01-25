
$("#notification").click(function( e ){
    $msg='';
    e.preventDefault();
    $('#reponse').slideToggle(200);

    var $url="ajax/notification.php";

        var formData = {

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

$(data.notification).each(function ($index,$r) {
$msg+='<div  style="width: 460px"> <div class="panel success" style="text-align:center; margin-bottom: 10px">';
    $msg+='<div class="heading">';
    $msg+='<span class="title">Évènement: '+$r[0]+'</span>';
    $msg+='</div>';
    $msg+='<div class="content padding10">';
    $msg+='Date: '+$r[1]
    $msg+='</div>';
    $msg+='</div></div>';
});
$("#page").html($msg);
            }
            else
            {
$msg='';
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



});


