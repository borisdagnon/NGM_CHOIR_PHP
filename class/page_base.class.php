<?php

class page_base {
	protected  $titre;
	protected $menu;
	protected $corps;
        protected $link = array('login_form','social_media');
	protected $script=array('social','contact');
                
	function __construct($t) {
		$this->titre=$t;
	}
	
	function __get($prop){
		return $this->corps;
	}
	function __set($prop,$val){
		switch ($prop){
			case 'titre': {
                            $this->titre=$val;
			break;
                        }
                        
			case 'menu':{
                            $this->menu=$val;
                        break;}
			
			case 'corps':{
                            $this->corps=$val;
                        break;}
                        case 'link' :{
                            $this->link[count($this->link)+1]=$val;
                            
                            break;
                        }
                        case 'script':{
                            $this->script[count($this->script)+1]=$val;
                            break;
		
                }
		
	  }
        
        }
 

        public function menu()
	{
		echo' <img style="width:10%;" src="./img/logo.png"/>


				<div id="mbmcpebul_wrapper" style="max-width: 952px; margin-left: 100px">
  <ul id="mbmcpebul_table" class="mbmcpebul_menulist css_menu">
  <li><div class="buttonbg gradient_button gradient53"><a class="button_1" href="index.php">Page d\'accueil</a></div></li>
  <li><div class="buttonbg gradient_button gradient53" style="width: 204px;"><div class="arrow"><a>NGM Cenis Choir</a></div></div>
    <ul>
    <li class="gradient_menuitem gradient50"><a title="" href="qui_sommes_nous.php">Qui sommes-nous</a></li>
    <li class="gradient_menuitem gradient50"><a title="" href="audition.php">Audition</a></li>
    <li class="gradient_menuitem gradient50 last_item"><a title="" href="prochaines_dates.php">Prochaines dates</a></li>
    </ul></li>
  <li><div class="buttonbg gradient_button gradient53"><div class="arrow"><a>GOSPELoire</a></div></div>
    <ul>
    <li class="gradient_menuitem gradient50"><a title="">Festival GOSPELoire</a></li>
    <li class="gradient_menuitem gradient50"><a class="with_arrow" title="">Éditions</a>
      <ul>
      <li class="gradient_menuitem gradient50"><a title="">2017</a></li>
      <li class="gradient_menuitem gradient50"><a title="">2016</a></li>
      <li class="gradient_menuitem gradient50"><a title="">2015</a></li>
      <li class="gradient_menuitem gradient50 last_item"><a title="">2014</a></li>
      </ul></li>
    <li class="gradient_menuitem gradient50"><a title="">Revue de Presse</a></li>
    <li class="gradient_menuitem gradient50 last_item"><a title="" href="contact.php">Contact</a></li>
   
    </ul></li>
  <li><div class="buttonbg gradient_button gradient53" style="width: 102px;"><div class="arrow"><a>Galerie</a></div></div>
    <ul>
    <li class="gradient_menuitem gradient50"><a title="" href="videos.php">Vidéos</a></li>
    <li class="gradient_menuitem gradient50 last_item"><a title="" href="photos.php">Photos</a></li>
    </ul></li>
  <li><div class="buttonbg gradient_button gradient53" style="width: 98px;"><div class="arrow"><a>Divers</a></div></div>
    <ul>
    <li class="gradient_menuitem gradient50 last_item"><a title="" href="gold_book.php">Livre d\'Or</a></li>
    </ul></li>

  <li><div class="buttonbg gradient_button gradient53" style="width: 133px;"><div class="arrow"><a>Membres</a></div></div>
    <ul>
    ';
       if(isset($_SESSION['nom']) && !empty($_SESSION['nom'])){
           echo '<li class="gradient_menuitem gradient50"><a title="" href="espace_perso.php"> Espace Personnelle</a></li>
<li class="gradient_menuitem gradient50"><a title="" href="espace_perso.php"> Règlement</a></li>
               <li class="gradient_menuitem gradient50 last_item"><a title="" href="connexion.php">Déconnexion</a></li>
';
       }  else{
           echo ' <li class="gradient_menuitem gradient50 last_item"><a title="" href="connexion.php">Connexion</a></li>';
       }       
   
    echo'</ul></li>
  </ul>
</div>
				
				
				';
	}
	
	public function header()
	{
		echo 'NGM CHOIR';
	}
	
        public function accueil(){
            
            echo '
           
		<h2 id="title_index"><i></i></h2>
				
	 <div id="myCarousel" class="carousel slide " data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
      
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="img/01.jpg" alt="gospeloire" class="img-responsive">
      </div>

      <div class="item">
        <img src="img/02.jpg" alt="gospeloire" class="img-responsive">
      </div>
    
      <div class="item">
        <img src="img/03.jpg" alt="gospeloire" class="img-responsive">
      </div>
   
    
<div class="item">
        <img src="img/04.jpg" alt="gospeloire" class="img-responsive">
      </div>
    
    
<div class="item">
        <img src="img/05.jpg" alt="gospeloire" class="img-responsive">
      </div>
   
    
<div class="item">
        <img src="img/06.jpg" alt="gospeloire" class="img-responsive">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>



</div>
       
                    ';
            
        }
        
      

                public function link() {
                    
                    foreach ($this->link as $s) {
            echo "<link rel='stylesheet'  href='css/" . $s . ".css' />\n";
        }
		echo '
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
				<link rel="stylesheet" href="./css/style.css">
                                 <link rel="stylesheet prefetch" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
                                 <link href="https://fonts.googleapis.com/css?family=Ubuntu:500" rel="stylesheet" type="text/css">
                                
                                <link rel="stylesheet" href="./class/menu_files/mbcsmbmcp.css" type="text/css" />
                                <link rel="stylesheet" href="./class/logo_files/logo.css" type="text/css" />
                                  <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
                                   <link rel="stylesheet" href="./bootstrap-social-gh-pages/bootstrap-social.css">
                                    <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
                                    <link rel="icon" type="image/png" href="./img/logo.png" />
                                    
';

		/*<link rel="stylesheet" href="./css/Metro-UI-CSS/build/css/metro.css">		*/
	}
	
	public function script()
	{
                      foreach ($this->script as $s) {
            echo "<script type='text/javascript'  src='./js/" . $s . ".js'></script>\n";
        }
            
		echo '
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  ';
           if($_SESSION['paypal']=='1'){
               echo'<script src="https://www.paypalobjects.com/api/checkout.js"></script>';
           }


  echo'
  
	<script type="text/javascript" src="./js/countdown.js"></script>

				';
               
	}
	public function footer()
	{
		echo 'Projet NGM CHOIR';
	}
	
	public function afficher()
	{
		
	  ?>
		<!doctype html>
		<html lang="fr" >
		<head>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
                <meta property="og:url"           content="https://www.ngmchoir.com/index.php" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="NGM CHOIR" />
  <meta property="og:description"   content="New Gospel Mouvement" />
  <meta property="og:image"         content="http://www.ngmchoir.com/img/logo.png" />

		<title><?php echo $this->titre;?></title>
		<?php echo $this->script();?>
		<?php echo $this->link();?>
		
		</head>
		
		
		
		<body id="bdcolor">
                     <?php $mes="AMBOUNDAleslie4587";
                     var_dump(sha1($mes));
$steph='CHATRASStéphanie1996';

                     ?>
		
                    <div class="container">
             <div class="row">
		      <div class="center-block" style="float:none"><?php echo $this->menu();?></div>
             </div>
                    
                    <div class="row" >
                        
                        <div class="center-block" style="float:none" id="carousel">
                        <?php echo $this->accueil();?>
                    </div>
                        
                    </div>




		<div class="row" id="space">
		
		  <div class="center-block" style="float:none">
              <div class="center-block col-md-10" style="float:none"id="trait_audition"></div>
		<?php echo $this->corps;?>   
		</div>
		</div>



		
                        <div class="center-block col-md-12" style="float:none" id="footer_1">
                            <div class="center-block" style="float:none" id="footer_2">
                                    <?php echo $this->footer();?>
                                
                                
                                <div class="row" style="float:none" id="footer_3">
                                   
                                    <div class="center-block col-md-4" style="float:none" id="footer_4"><a href="qui_sommes_nous.php" ><b>QUI SOMMES NOUS ?</b></a></div>
                                    <div class="center-block col-md-4" style="float:none" id="footer_4"><a href="histoire_gospel.php" ><b>HISTOIRE DU GOSPEL </b></a></div>
                                    <div class="center-block col-md-4" style="float:none" id="footer_4"><a href="https://fr-fr.facebook.com/NGM.CHOIR/" target="_blank"><b>FACEBOOK</b> </a></div>
                               
                                </div>
                                
                                
                                
                            </div>
                            <div class="row"> <div class="center-block" id="footer_5"><p>© 2017 www.ngmchoir.com</p></div></div>
                            
                        </div>
                                             
                        </div>
		</body>
		
                
		   
		
		</html>
		<?php 
		
	}
	
}
?>