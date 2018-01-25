<?php
session_start();
include_once('../class/autoload.php');
$data            = array();
$data['success'] = false;
$data['message']=false;
$data['credential']=false;
$_SESSION['nom']="";
$_SESSION['prenom']="";
$_SESSION['categ']="";

$resultat=null;

$mypdo = new mypdo();

$resultat = $mypdo->connexion($_POST['nom'],$_POST['mdp']);

if ($resultat!=null) {
    
if($resultat->rowCount()>0 && $resultat->rowCount()<2){
    
    while ($r=$resultat->fetch()){
        $_SESSION['id']=$r[0];
      $_SESSION['nom']= $r[1];
       $_SESSION['prenom']=$r[2];
       $_SESSION['categ']=$r[3];
    }
    
      $data['success']  = true;
      $data['message'] = 'Connexion réussie! Bienvenue '.$_SESSION['nom'].' '.$_SESSION['prenom'].'';
      
    
}else{
    $data['message'] = 'Identifiant ou mot de passe invalide !';
  
    $data['success']  = false;
}
   
 

} else {
     $data['message'] = 'Requête invalide !';
  
    $data['success']  = false;
    
}

echo json_encode($data);
?>