<?php

class page_base_perso extends page_base{
    
    protected $menu;
	protected $corps;
        protected $link = array( 'metro','metro-colors','metro-icons','metro-responsive','metro-rtl','metro-schemes','prettify','style_base_perso','upload');
	
        
    function __construct($t) {
        parent::__construct($t);
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
			
		}
		
	}
    
        
        
         public function link() {
             
                         foreach ($this->link as $l) {

            if($l=='style_base_perso' || $l=='upload' || $l=='informations' ||$l=='repondre'){
                echo "<link rel='stylesheet'  href='css/" . $l . ".css' />\n";

            }else{
                echo "<link rel='stylesheet'  href='css/Metro-UI-CSS/build/css/" . $l . ".css' />\n";
                echo '<link href=\'https://fonts.googleapis.com/css?family=Roboto:400,700\' rel=\'stylesheet\' type=\'text/css\'>';
                echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">';
                echo'<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">';


if($l=='prettify'){
    echo "<link rel='stylesheet'  href='css/Metro-UI-CSS/docs/js/prettify/" . $l . ".css' />\n";
}

            }
        }
         }
         
         public function script()
	{
             echo '
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                      
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  
	
        <script type="text/javascript" src="./css/Metro-UI-CSS/build/js/metro.js"></script>
   <script type="text/javascript" src="./css/Metro-UI-CSS/docs/js/ga.js"></script>
     <script type="text/javascript" src="./css/Metro-UI-CSS/docs/js/prettify/run_prettify.js"></script>
 <script type="text/javascript" src="./css/Metro-UI-CSS/docs/js/prettify/run_prettify.js"></script>
  <script type="text/javascript" src="./js/informations.js"></script>


				';
             
         }
         
         public function footer()
	{
             
         }
        
    public function menu()
	{
        
    }
    
    public function header() {
        parent::header();
    }
    
    
    public function accueil(){
        echo '';
    }
    
    public function afficher()
	{
        
         ?>
		<!doctype html>
		<html lang="fr" >
		<head>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $this->titre;?></title>
		<?php echo $this->script();?>
		<?php echo $this->link();?>
		
		</head>
		
		
		
		<body>
        <div class="container">
                     <?php $mes="AMBOUNDAleslie4587";?>



<?php echo $this->corps;?>
        </div>

		</body>
		
                
		   
		
		</html>
		<?php 
		
        
    }
}

