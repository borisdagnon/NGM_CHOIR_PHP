/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function(){

    $(".dropdown-menu li a").click(function(){
        $element=$(this);
       
       $album=$element.attr('name');
       
       
     if($album!='Toutes'){
         
           $('[id^=photos_]').each(function(){
        
        $id=$(this).attr('id');
     $nom= $(this).attr('name');
     
        $("#"+$id).show();
        
       
     
     if($nom!=$album){
        
         if($("#"+$id).is(':visible')){
            
             $("#"+$id).hide();
           
         }
         
     
     }
        
    });
         
     }else{
          $('[id^=photos_]').each(function(){
              
              $id=$(this).attr('id');
               $("#"+$id).show();
          
          })
         
     }
  
    

   });

});