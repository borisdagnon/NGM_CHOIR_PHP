$(document).ready(function(){
    
$("#chant").click(function(){
var $url="ajax/audio.php";

var formData = {
			/*"nom" 					: $("#nom").val().toUpperCase(),
   			"email"					: $("#email").val(),
   			"message"					: $("#message").val()	*/										   		
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
                             
                                     $affiche='';
                                     $affiche+='<div class="row bg-darkBlue" style="border-style: double; border-bottom-color: white; color:#ecf0f1"> <h1  style="text-align:center; font-size:60px;">Les Chants</h1></div>';
    $affiche+='<div class="row">';
    $affiche+='<div class="col-md-10" style="width: 761px;">';
        $affiche+=' <div class=" audio-player full bg-darkBlue " data-role="audio">';
$affiche+='<div class="play-list-wrapper" >';



        $i=0;
                                     
                                   $(data.audio).each(function($index,$value){
                                       $i++;
                                       if($i==1){
                                           $affiche+='<h3  style="text-align:center; color:white;">'+$value[2]+'</h3>';
                                            $affiche+='<ul class="play-list">';
                                           
                                       }
                                    if($value[4]=='Original'){
                                        $fichier='1';
                                    }else{
                                        if($value[4]=='Soprano'){
                                            $fichier='2';
                                        }else{
                                            if($value[4]=='Alto'){
                                                $fichier='3';
                                            }else{
                                                if($value[4]=='Ténor'){
                                                    $fichier='4';
                                                }
                                            }
                                        }
                                    }
   
                                        $affiche+="<li class='' data-src='./audio/chants/"+$value[0]+"/"+$fichier+".mp3' data-type='audio/mp3' id='"+$value[0]+"'>";
$affiche+=$value[2]+' - '+$value[3]+' - '+$value[4];
$affiche+='</li>';

if($i==4){
    $i=0;
    $affiche+='</ul>';
}
                                   });
      



    $affiche+="</div> ";
     $affiche+="   </div> ";

         $affiche+="</div>   ";



                    $affiche+="</div>";
                    $affiche+="<div class='row'  id='photo'></div>";
                    $affiche+=" <script type=\"text/javascript\" src=\"./js/portrait.js\"></script>";
    $("#page").html($affiche);

  
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

})