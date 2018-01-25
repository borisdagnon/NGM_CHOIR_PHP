<?php
session_start();
include_once('../class/mypdo.class.php');


$data            = array();
$data['success'] = false;
$data['message']=array();
$data['result']=array();

$mypdo=new mypdo();
$result=$mypdo->repondre_message($_POST['id_message'],$_POST['id_sender_old_message'],$_SESSION['id'],$_POST['message']);

if($result){
$data['success']=true;
    $data['message']='Le message a été envoyé';


}else{

    $data['message']='Erreur lors de l\'envoie du message';
}




echo json_encode($data);
?>