
	
        
	$(".login-button").click(function( e ){
        $("#reponse").slideToggle(200)
        e.preventDefault();
        $msg='';
				
		var $url="ajax/connexion.php";
		if($("#nom").val().length>=1)
		{
                    
                  
			/*$categ="famille";		
			if($("input[type=radio][name=rblogin]:checked").attr("value")=="rbf"){$categ="famille";}
			if($("input[type=radio][name=rblogin]:checked").attr("value")=="rba"){$categ="admin";}
			if($("input[type=radio][name=rblogin]:checked").attr("value")=="rbp"){$categ="personnel";}*/
			var formData = {
			"nom" 					: $("#nom").val().toUpperCase(),
   			"mdp"					: $("#mdp").val(),
   			/*"categ"					: $categ	*/											   		
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

                    $msg+='<div class="alert alert-success style_connexion" style="font-size: 30px">';
                    $msg+=data.message;
                    $msg+='</div>'


                         $('#reponse').html($msg);
                    $("#reponse").slideToggle(200);

                         
function openUrl(){

  window.location.href = "index.php";

}
setTimeout(openUrl, 2000);

  
				}
				else
				{
                    $msg+='<div class="alert alert-danger style_connexion" >';
                    $msg+=data.message;
                    $msg+='</div>';

                         $('#reponse').html($msg);
                    $("#reponse").slideToggle(200);

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
                        $msg+='<div class="alert alert-danger style_connexion" >';
                        $msg+='Veuillez préciser vos informations de connexion';
                        $msg+='</div>';

                        $('#reponse').html($msg);
                        $("#reponse").slideToggle(200);
                    }
                    
                    
	});
   

			