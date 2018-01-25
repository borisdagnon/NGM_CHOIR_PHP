/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function(){

    $(".dropdown-menu li a").click(function(){
        $element=$(this);
       

       $annee=$(this).text();
    $('[id^=videos_]').each(function(){
       $id=$(this).attr('id');
     $nom= $(this).attr('name');
     
     if($nom!=$annee){
         if($("#"+$id).is(':visible')){
            
             $("#"+$id).hide();
           
         }else{
           
             $("#"+$id).show();
           
           
         }
         
     }
        
    });
    

   });

});