<?php
session_start();
include_once('../class/mypdo.class.php');


$data            = array();
$data['success'] = false;
$data['message']=array();
$data['notification']=array();

$mypdo=new mypdo();



$result=$mypdo->prochaines_dates();

if($result) {
    $data['success']=true;
    while ($r = $result->fetch()){

        array_push($data['notification'],[$r[1],$r[2]]);
    }
}


echo json_encode($data);
?>