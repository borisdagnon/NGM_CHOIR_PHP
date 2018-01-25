<?php
session_start();
include_once('../class/mypdo.class.php');


$data            = array();
$data['success'] = false;
$data['message']=array();
$data['result']=array();

$mypdo=new mypdo();

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$comment=$_POST["comment"];

if(!empty($comment) ){

    if(strlen($comment)>=20){

$requete=$mypdo->commentaire($nom,$prenom,$comment);

if($requete){



    $data['success']=true;
    $data['message'] = 'Votre commentaire a été prit en compte';

    $requete=$mypdo->select_commentaire();
    if($requete){
        $data['result']=array();

        while($r = $requete->fetch()){

            array_push($data['result'],$r);
        }


    }else{
        $data['message']='Les commentaires n\'ont pas pu être chargés';
    }


}else{
    $data['message'] = 'Votre commentaire n\'a pu être prit en compte';
}


    }
else {
    $data['message'] = 'Votre message doit contenir au moins 20 lettres';
}

} else {


    $data['message'] = 'Veuillez nous écrire quelque chose dans la zone de commentaires';
}


echo json_encode($data);
?>