<?php
session_start();
include_once('../class/mypdo.class.php');


$data            = array();
$data['success'] = false;
$data['message']=array();
$data['infos_sender']=array();

$mypdo=new mypdo();

if(isset($_POST['type_transaction'])){

    if($_POST['type_transaction']=='enveloppe'){
        $result=$mypdo->maj_enveloppe($_POST['reponse'],$_POST['id_message']);
    }else{
        $data['success']=true;
        $result=$mypdo->repondre($_POST['id_message']);
        while($r=$result->fetch()){
            array_push($data['infos_sender'],[$r[0],$r[1],$r[2]]);
        }

    }


}




echo json_encode($data);
?>