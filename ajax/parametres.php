<?php
session_start();
include_once('../class/mypdo.class.php');


$data            = array();
$data['success'] = false;
$data['message']=array();
$data['parametres']=array();

$mypdo=new mypdo();



$result=$mypdo->parametres($_SESSION['nom']);

if($result) {
    $data['success']=true;
    while ($r = $result->fetch()){
        array_push($data['parametres'],[$r[0],$r[1],$r[2]]);
    }
}else{

}


echo json_encode($data);
?>