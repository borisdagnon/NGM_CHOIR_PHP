<?php
session_start();
include_once('../class/mypdo.class.php');


$data            = array();
$data['success'] = false;
$data['message']=array();
$donnee=null;
$mypdo=new mypdo();

//Vérification de l'existence des données postées
if(isset($_POST['nom'])){
    $type=$_POST['type'];
    $donnee=$_POST['nom'];
}else{
    if(isset($_POST['prenom'])){
        $type=$_POST['type'];
        $donnee=$_POST['prenom'];
    }else{

            $type=$_POST['type'];
            $donnee=$_POST['mdp'];

    }
}



$result=$mypdo->maj_info_chanteur($type,$donnee);

if($result) {
$data['success']=true;
    $data['message']='Vos données ont été mise à jour';

}else{
    $data['message']='Erreur ! Vos données n\'ont pas été mise à jour';

}


echo json_encode($data);
?>