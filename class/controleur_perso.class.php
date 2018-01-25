<?php

class controleur_perso extends controleur
{

    protected $vpdo;
    protected $db;


    public function __construct()
    {


        $this->vpdo = new mypdo();
        $this->db = $this->vpdo->connexion;
    }

    public function chants()
    {

        $result = $this->vpdo->nb_chants();
$notification=$this->vpdo->prochaines_dates();
$notification=$notification->rowCount();

        $form = '';


        $form .= '
<div class="tile-container bg-darkBlue" >


 <a href="index.php">
 <div class="tile-square bg-green fg-white" data-role="tile">
        <div class="tile-content iconic">
            <span class="icon mif-home"></span>
            <div class="tile-label" style="text-align: center">NGM CHOIR</div>
        </div>
    </div>
</a>

<div class="tile-wide bg-darkBlue fg-white" data-role="tile" id="chant">
        <div class="tile-content iconic">
            <span class="icon mif-music"></span>
            <span class="tile-badge bg-darkRed" style="margin-right: -10px">' . $result . '</span>
            <span class="tile-label" >Chants </span>
        </div>
    </div>

<div class="tile-wide bg-darkBlue fg-white" data-role="tile" id="notification">
        <div class="tile-content iconic">
            <span class="icon mif-notification"></span>
            <span class="tile-badge bg-darkRed" style="margin-right: -10px">'.$notification.'</span>
            <span class="tile-label" >Notifications </span>
        </div>
    </div>

<a href="compte.php">
 <div class="tile bg-darkRed fg-white" data-role="tile" id="mon_espace">
        <div class="tile-content iconic">
            <span class="icon mif-cogs"></span>
        </div>
    </div></a>
    
           </div>
           
           <div class="row" id="page">
           
          
      
           </div>
    
    <script type="text/javascript" src="./js/chants.js"></script>
    <script type="text/javascript" src="./js/notification.js"></script>
   
';
        return $form;;
    }



    /**
     * Cette fonction permet de d'uploader une image dans l'espace personelle attribué à chaque chanteur
     * De modifier le mot de passe et d'envoyer un message à quelqu'un du groupe, qui sera vue comme un notification
     * @return string
     */
    public function compte()
    {

        $form = '';


//On recharge les informations de la base de données
        $result = $this->vpdo->parametres($_SESSION['id']);


            $nom_dossier_artiste = $result[0];
            $nom_artiste = $result[1];
            $prenom_artiste = $result[2];
            $nom_photo_artiste = $result[3];




//On charge le nom
        $result = $this->vpdo->nb_chants();
        $notification=$this->vpdo->prochaines_dates();
        $notification=$notification->rowCount();


        $form .= '
<div class="tile-container bg-darkBlue" >


 <a href="index.php">
 <div class="tile-square bg-green fg-white" data-role="tile">
        <div class="tile-content iconic">
            <span class="icon mif-home"></span>
            <div class="tile-label" style="text-align: center">NGM CHOIR</div>
        </div>
    </div>
</a>

<div class="tile-wide bg-darkBlue fg-white" data-role="tile" id="chant">
        <div class="tile-content iconic">
            <span class="icon mif-music"></span>
            <span class="tile-badge bg-darkRed" style="margin-right: -10px">' . $result . '</span>
            <span class="tile-label" >Chants </span>
        </div>
    </div>

<div class="tile-wide bg-darkBlue fg-white" data-role="tile" id="notification">
        <div class="tile-content iconic">
            <span class="icon mif-notification"></span>
            <span class="tile-badge bg-darkRed" style="margin-right: -10px">'.$notification.'</span>
            <span class="tile-label" >Notifications </span>
        </div>
    </div>
    
<a href="compte.php">
 <div class="tile bg-darkRed fg-white" data-role="tile" id="mon_espace">
        <div class="tile-content iconic">
            <span class="icon mif-cogs"></span>
        </div>
    </div>
    </a>
    
           </div>
           
          ';


        $form.='
           
           <div class="row" id="page">
        
                <div class="row bg-darkBlue" style="border-style: double; border-bottom-color: white "> <h1  style="text-align:center; font-size:60px;color:#ecf0f1">Mon Espace</h1></div>

    
<div class="row">
  
  
   <div class="tabcontrol2" data-role="tabcontrol">


      <ul class="tabs">
  
  <li class="active">
  <a href="#frame_5_1">Informations</a>
</li>

 


   </ul>
   
   </div>
 



  

   <div id="frame_5_1" class="frame bg-darkBlue" >
   
 <div id="wrapper">
  <form action="" class="form">
  
    <p class="field required half">
           <input class="text-input" id="nom" name="nom"  type="text"  placeholder="'.$nom_artiste.'">
    </p>
    
    <p class="field required half">
      <input class="text-input" id="prenom" name="prenom"  type="text" placeholder="'.$prenom_artiste.'">
    </p>
    
     <p class="field required half">
      <input class="text-input" id="mdp" name="mdp"  type="password" placeholder="changer le mot de passe">
    </p>
   
    <p class="field">
      <input class="button" type="submit" id="maj" value="Mettre à jour">
    </p>
  </form>
</div>

   
</div>


     
    
     
 </div>

 
    

     </div>
  

<div class="row" id="page">

 <div class="row" id="msg"></div>


</div>

                          

                           
         
         
         <script type="text/javascript" src="./js/chants.js"></script>
         <script type="text/javascript" src="./js/upload.js"></script>
         <script type="text/javascript" src="./js/informations.js"></script>
        <script type="text/javascript" src="./js/notification.js"></script>
        ';

        return $form;
    }



}
