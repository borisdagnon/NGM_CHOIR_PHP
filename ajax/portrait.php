<?php
session_start();
include_once('../class/mypdo.class.php');


$data            = array();
$data['success'] = false;
$data['message']=array();
$data['portrait']=array();

$mypdo=new mypdo();



$result=$mypdo->originals($_POST['id']);

if($result) {
    $data['success']=true;
while ($r = $result->fetch()){
    array_push($data['portrait'],[$r[0],$r[1]]);
}
}else{

}


echo json_encode($data);
?>