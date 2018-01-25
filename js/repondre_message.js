$("#submit").click(function (e) {
    e.preventDefault();
    $url=''//Il s'agit de l'url de la page PHP a contacter
    $msg='';

    $url="ajax/repondre_message.php";


   $val=$("p[class='pre']").attr('id');
    $id_message=$val.split("_")[1];
   $id_sender_old_message=$val.split("_")[0];
   $message=$("#message").val();


    var formData = {

        "id_message" 					: $id_message,
        "id_sender_old_message"                     :$id_sender_old_message,
        "message"                       :$message
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


            $("#message").remove();
            $("#submit").remove();
            $("h3.pre").attr('style','font-size:60px; font-weight:800');
            $("h3.pre").toggleClass('fg-darkCobalt');
            $("p.pre").attr('style','font-size:40px; font-weight:800');
            $("h3.pre").html(data.message+' à');

        }
        else
        {
            $("#form-container").html(data.message);
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


})
