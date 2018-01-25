<?php
include_once 'class/autoload.php';
session_start();
$_SESSION['paypal']='0';
$controleur=null;
$site=null;


if(isset($_SESSION['type']) && isset($_SESSION['id']))
{

}else
{
    $controleur=new controleur();
    $site=new page_base('Livre d\'Or');
    $site->__set('link','gold_book');
    $site->__set('corps',$controleur->gold_book());
}
$site->afficher();

?>

