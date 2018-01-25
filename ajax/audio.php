<?php
session_start();
include_once('../class/autoload.php');
$data            = array();
$data['success'] = false;
$data['message']=false;
$data['audio']=array();



$resultat=null;

$mypdo = new mypdo();

$resultat = $mypdo->chants();


if ($resultat!=null) {
$i=0;
    $data['success']=true;
 while($r=$resultat->fetch()){
  
    
         array_push($data['audio'],[$r[0],$r[1],$r[2],$r[3],$r[4],$r[5]]);
 
 }
}

echo json_encode($data);
?>