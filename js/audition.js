
	
        
	$("#envoyer").click(function( e ){
		$msg='';
        e.preventDefault();
        $('#reponse').slideToggle(200);
				
		var $url="ajax/mail.php";
		if($("#nom").val().length>=3 && $("#prenom").val().length>=3)
		{
                    
                  
			var formData = {
			"nom" 					: $("#nom").val(),
   			"prenom"			    : $("#prenom").val(),
			"sujet"                 : $("#sujet").val(),
   			"ville"					: $("#ville").val()					   		
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

                $msg+='<div class="alert alert-success style_connexion" >';
                $msg+=data.message;

                    $msg+='</div>';



                        $("#reponse").html($msg);
                         $('#reponse').slideToggle('slow');

  
				}
				else
				{

                    $msg+='<div class="alert alert-danger style_connexion" >';
                    $msg+=data.message;

                    $msg+='</div>';



                    $("#reponse").html($msg);
                    $('#reponse').slideToggle('slow');
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
                        $msg+='Veuillez préciser votre nom et votre prénom';

                        $msg+='</div>';
                        $("#reponse").html($msg);
                        $('#reponse').slideToggle('slow');


                    }
                    
                    
	});
   

			