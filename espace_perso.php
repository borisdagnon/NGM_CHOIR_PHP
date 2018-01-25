<?php
include_once 'class/autoload.php';
session_start();
$_SESSION['paypal']='0';
$controleur=null;
$site=null;


if(isset($_SESSION['nom']) && isset($_SESSION['id']))
{
    $controleur=new controleur_perso();
    $site=new page_base_perso('Espace Personnelle');
    $site->__set('corps',$controleur->chants());
}else 
{
    $controleur=new controleur();
    $site=new page_base('Home');
    $site->__set('corps',$controleur->add_index());
}
$site->afficher();

?>