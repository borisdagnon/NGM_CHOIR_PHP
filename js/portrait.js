$("li").click(function () {
 $id=$(this).attr('id');
$msg='';
    var $url="ajax/portrait.php";

    var formData = {
        "id" 					: $id,

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
        if(data.success){

$nom='';
$biographie='';

            $(data.portrait).each(function ($index,$value) {
                $nom=$value[0];
                $biographie=$value[1];

            })




            $msg+='<div class="col-md-4 center-block" style="float: none">';
            $msg+='<img  src="./img/originals/'+$id+'.jpg"  style="width: 280px;height: 190px; margin: 0 auto">';
            $msg+=' </div>';

            $msg+=' <div class="row">';
            $msg+=' <div class="center-block col-md-4" style="float: none; margin-top: 2%; margin-bottom: 2%" id="card_title"> <b>'+$nom+'</b> </div>';
            $msg+='  <div class="center-block col-md-4" style="float: none; text-align: center;" id="bio_cadre"> <p>'+$biographie+'</p> </div>';
            $msg+=' </div>';



            $('#photo').html($msg)

        }else {

        }

    })

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