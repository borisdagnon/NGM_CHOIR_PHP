<?php
include_once 'class/autoload.php';
session_start();
$_SESSION['paypal']='0';
$controleur=null;
$site=null;

if(isset($_SESSION['id']) && isset($_SESSION['nom'])){
    $controleur=new controleur_perso();
    $site=new page_base_perso('Mon Espace');

    $site->__set('link','informations');
    $site->__set('link','repondre');
    $site->__set('corps', $controleur->compte());
}else{
    $controleur=new controleur();
    $site=new page_base('Home');

    $site->__set('corps',$controleur->add_index());
}


$site->afficher();
?>


<?php