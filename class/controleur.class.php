<?php
	include_once('mypdo.class.php');
class controleur{
    
    
    protected $vpdo;
	protected $db;
    
	
	public function __construct(){
            
         $this->vpdo = new mypdo();
        $this->db   = $this->vpdo->connexion;
        
	}
	
	public function connexion()
	{
           if(isset($_SESSION['nom'])){
               $_SESSION['nom']=array();
               $_SESSION['prenom']=array();
               $_SESSION['categ']=array();
               session_destroy();
           }
		$form="";
		
		$form.='
			<div class="login">
  <div class="login-header">
    <h1>Login</h1>
  </div>
  <div class="login-form">
    <h3>Nom d\'utilisateur:</h3>
    <input type="text" placeholder="Nom d\'utilisateur" id="nom"/><br>
    <h3>Mot de passe :</h3>
    <input type="password" placeholder="Mot de passe" id="mdp"/>
    <br>
    <input type="button" value="Se connecter" class="login-button"/>
   
  </div>
</div>


<div class="center-block col-md-10 text-center" style="float: none;" id="reponse">

</div>



<script type="text/javascript" src="./js/connexion.js"> </script>
				';
		return $form;
	}

	public function inscription_groupe(){
	    $form='';

        $form.='<div class="row" id="audition_container">

                       <div class="col-md-4" ><p id="audition_text_1">
                       Vous représentez un groupe de Gospel ou vous êtes artiste solo et souhaitez participer au FestivaLoire en septembre à Angers,
                       inscrivez-vous directement via le formulaire d\'inscription en ligne.<br/>
Tél : 07.86.50.71.95 </p>  </div>

                       <div class="col-md-6"> 
                       
                      <form>

    <label for="nom_rep">Nom représentant</label>
    <input type="text" id="nom_rep" name="nom_rep" placeholder="Votre nom..">
    
      <label for="prenom_rep">Prénom représentant</label>
    <input type="text" id="prenom_rep" name="prenom_rep" placeholder="Votre prénom..">

  <label for="nom_groupe">Nom groupe</label>
    <input type="text" id="nom_groupe" name="nom_groupe" placeholder="Nom du groupe..">
    
    <label for="email_groupe">E-mail groupe</label>
    <input type="text" id="email_groupe" name="email_groupe" placeholder="E-mail du groupe..">

   <label for="tel">Téléphone</label>
    <input type="text" id="tel" name="tel" placeholder="N° du groupe..">

     <a class="btn btn-success" role="button" id="envoyer">Envoyer</a>

  </form>
</div>

</div>  


<div class="center-block col-md-10 text-center" style="float: none;" id="reponse">


</div>

<script type="text/javascript" src="./js/inscription_groupe.js"> </script> ';
        return $form;
	    
    }


        public function add_index(){
            $form='';
            $form.='

                 <div class="col-md-6 panel panel-info" style="font-family: Raleway" >
<div class="panel-heading text-center" >Notre histoire</div>
<div class="panel-body text-center">
NGM Choir (New Gospel Movement Choir) est une chorale, une association qui s\'articule prioritairement autour du spectacle musical gospel.
Elle est créée en 2013 pour permettre à tous de pouvoir s\'exprimer à travers cette musique. Ainsi NGM Choir est ouverte aux Edutiants (es) de toute part,...<a href="qui_sommes_nous.php">(suite)</a>
</div>
</div>

                 <div class="col-md-6 panel panel-warning" style="font-family: Raleway">
<div class="panel-heading text-center">GOSPELoire 2017</div>
<div class="panel-body text-center">

<iframe width="400" height="325" class="embed-responsive-item"
src="https://www.youtube.com/embed/JTGdibPXGx8" >
</iframe> 

</div>
</div>

<div class="col-md-6 col-md-offset-5">
<div class="fb-share-button" data-href="http://www.ngmchoir.com" 
data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore fa fa-facebook" 
target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.ngmchoir.com%2F&amp;src=sdkpreparse"></a></div>
</div>



';
            return $form;;
        }




        public function qui_sommes_nous()
        {
            
            $form='';
            
            $form.='
                <div class="row" >
                <div class="center-block col-md-11" style="float:none" id="qui_sommes_nous_1">
                
 <div class="center-block" style="float:none" id="qui_sommes_nous_2"><p id="qui_sommes_nous_title">Qui-sommes nous ?</p></div>
 <div class="center-block " style="float:none">
<p id="qui_sommes_nous_text">
     NGM Choir (New Gospel Movement Choir) est une chorale, une association qui s\'articule prioritairement autour du spectacle musical gospel. <br>
     Elle est créée en 2013 pour permettre à tous de pouvoir s\'exprimer à travers cette musique. Ainsi NGM Choir est ouverte aux Edutiants (es) de toute part,<br>
     aux professionnels, aux passionnés de tous les âges, aux croyants (es) de toutes dénominations, ainsi qu\'aux non croyants (es).<br>

Nous voulons exister dans la durée et être compté parmi les arteurs culturels de la Loire.

Nous oeuvrons à maintenir omniprésente la culture musicale gospel et surtout à la rendre efficace dans son rôle de réunir, soutenir, redresser, combattre... <br>
la finalité étant de contribuer à un meilleur édifice de l\'être humain tel qu\'il devrait être.

New Gospel Movement produit, crée, diffuse, chante, écrit, danse et monte sur scène pour produire un impact positif sur la société d\'aujourd\'hui.<br>

Le gospel, ce n\'est pas seulement un divertissement mais plus encore ;<br> c\'est un moyen pour soutenir, défendre, donner de l\'espoir à l\'Homme et aussi des Cantiques Spirituels d\'action de grâce à Dieu.<br>

NGM CENIS invite son auditoire à se divertir et à connaître les valeurs propres au gospel. "Chanter au milieu des hommes pour un impact sans cesse vers un meilleur lendemain". De la Soul, du Gospel, du Blues, du Spirituals; des anciens standards revisités .C\'est une équipe engagée dans l\'avenir socio-culturel de nos quartiers, et dans l\'animation de nos villes.
      </p> 
</div>
</div>
               
</div>
                    ';
            return $form;
            
        }
      



        public function histoire_gospel(){
            $form='';
            $form.='
                
<div class="row" >
                <div class="center-block col-md-11" style="float:none" id="qui_sommes_nous_1">
                
 <div class="center-block" style="float:none" id="qui_sommes_nous_2"><p id="qui_sommes_nous_title">l\'histoire du Gospel</p></div>
 <div class="center-block " style="float:none">
<p id="qui_sommes_nous_text">

Notons que tout a débuté suite à une évidence aiguë de l\'inégalité, de la servitude, de l\'esclavage et de la maltraitance.

Dès lors un essort d\'espoir va naître pour la communauté noire qui se reconfortait avec des chants religieux car la plupart d\'entre eux étaient des croyants.<br>

Le gospel est une musique militante et populaire à la fois.

Le gospel est un chant d\'inspiration religieuse chrétienne.<br> Il s\'est développé en même temps que le jazz et le blues primitifs. Le gospel se développa d\'abord chez les afro-américains et les blancs du sud, avant de conquérir le reste de l\'Amérique et du monde. Le mot Gospel vient du mot God (Dieu) et spell (parole).<br>
Les Gospel Hymns sont une première étape des Gospel Songs de 1930. Ce sont des hymnes traditionnelles et des mélodies en vogue. C\'est un courant, une mutation des chants rituels des protestants blancs.

Depuis les années 1870, les instruments sont de plus en plus présents aux offices :<br> Orgue, Harmonium, instruments à cordes, claquements des mains et mouvements du corps.

Le début du XXe siècle est alors une véritable effervescence artistique pour les Noirs.<br>

Le Gospel, c\'est avant tout le combat contre l\'Amérique raciste, contre l\'injustice, contre l\'oppression, contre la ségrégation et la discrimination. C\'est un partage des souffrances des noirs émancipés mais toujours sous l\'hégémonie blanche, surtout dans les États du Sud;<br> d\'où une très forte volonté de migration par des réseaux souterrains ou ferrés vers les grandes villes du Nord (Chicago, Detroit, New York).<br>
Ils ne s\'engagent pas politiquement même s\'ils restent fidèles au parti républicain, à Lincoln, leur « libérateur ».

Oh Happy Days, tiré du film Sister Act 2, une belle démonstration de Gospel

         </p> 
</div>

<div class="center-block col-md-11" style="float:none">
<img src="./img/happy_day.jpg" style="width:816px; height:463px; align:middle;" >
</div>

<p id="qui_sommes_nous_text"> Mais il ne faut pas oublier que si le gospel est une musique militante, elle reste une musique populaire dans tous les sens du terme, en phase avec la communauté noire, traversée par des croyances aussi bien politiques que religieuses ou esthétiques.<br>
L\'enracinement de cette musique reste culturel et l\'existence d\'un public en mesure de l\'apprécier est son corollaire.<br>
Chaque époque est tributaire des rapports existants entre la musique et la société . La musique contribue à la détermination sociale entre les peuples et possède le pouvoir de les rassembler.<br>
En effet, au début du siècle dernier, le peuple noir était considéré comme une sous-race n\'étant bonne qu\' aux tâches les plus dévalorisantes, mais petit à petit, ils ont réussi à s\' intégrer dans la société occidentale et un des moyen majeur fut la musique qui a profondément influencé et généré de nombreux genres musicaux,<br>
en Amérique comme en Europe depuis le début du 20 ème siècle à nos jours.
Le but de cette étude est ainsi de montrer comment la musique noire a rythmé le combat des des peuples et nations pour leurs émancipations sur près de deux siècles, des champs de coton du Sud profond aux ghettos du Bronx.</p>


<p style="font-size:50px;  text-decoration: underline;"> <b>RYTHM and BLUES</b> </p>
<p id="qui_sommes_nous_text">

Aux origines, le Rythm and Blues (rythme et mélancolie) désignait la musique issue du Gospel et du Jazz créé par les musiciens noirs américains. Le terme serait en fait apparu pour remplacer celui de race music utilisé auparavant par les commentateurs blancs et jugé trop insultant.<br>

Apparu dans les années 40, le rythm and blues et sa petite soeur la soul gagnent progressivement du terrain, permettant aux sons nés des Eglises noires américaines de trouver un autre terrain d\' expression. Ce n\'est que dans les années 60/70 qu\'apparaît le terme R&B.<br>

Le Rhythm and Blues n\'est rien d\'autre que du Blues auquel on a ajouté le rythme ; il s\'agit de blues « qui balance » , il ne reflète pas de tristesse ou de mélancolie comme son nom le laisserait entendre mais, au contraire, vous fait oublier vos soucis et vous entraîne à danser.<br>
Le Rhythm and Blues évolua au fur et à mesure des années; dans les années 1950, l\' étiquette « Rhythm and Blues » recouvre toute une palette de musiques différentes ; de cette manière les ballades chantées des groupes de Doo-Wop, les morceaux de Jazz Barrel House ou encore le Jump Blues sont autant de styles différents pouvant se regrouper sous l\'expression R\'n\'B. <br>
Débarqués dans les années 1950 à Chicago en provenance des plantations du Mississippi, c\'est à Muddy Waters et Howlin\' Wolf que l\' on doit certains des disques Rhythm and Blues les plus marquants, avec leur sonorité sobre et moderne ainsi que des solos de guitare é lectrique qui préfigurent ceux des Rolling Stones. <br>
Ainsi, le Rhythm and Blues apparaît comme le précurseur du rock ; en effet, des artistes tels que Duke Ellington avec son « Rockin\'in Rhythm » ou encore la chanteuse de blues Trixie Smith avec « Rocks Me With One Steady Roll » font du rock sans le savoir.<br>
Même si le Rythm and Blues n\'a pas influencé directement la société , il a contribué a la création du rock, qui a lui a fortement influencé la société.<br>

   Ray Charles - "Don\'t Set Me Free"
Au-delà du rock, le Rhythm and Blues a été l\'élément déclencheur d\'une multitude d\'autres styles de musiques comme la Soul, Funk, Disco,..

</p>

<div class="center-block col-md-11" style="float:none; ">
<img src="./img/jazz_arbre.jpg" style="width:616px; height:763px; align:middle; margin-bottom:14px;" >
</div>

</div>
  
</div>


';
            
            return $form;
        }

        


        public function audition(){
            $form="";
            
            $form.='
               
                
                  


                <div class="row" id="audition_container">

                       <div class="col-md-4" ><p id="audition_text_1">Inscription tout au long de l\'année par téléphone : 06.51.19.24.31 ou par le formulaire suivant :</p>  </div>
                       <div class="col-md-6"> 
                       
                      <form>

    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom" placeholder="Votre nom..">

    <label for="prenom">Prénom</label>
    <input type="text" id="prenom" name="prenom" placeholder="Votre prénom..">

    <label for="pays">Ville</label>
    <select id="ville" name="ville">
      <option value="Angers">Angers</option>
      <option value="Nantes">Nantes</option>
      <option value="Cholet">Cholet</option>
    </select>

    <label for="subject">Sujet</label>
    <textarea id="sujet" name="sujet" placeholder="Faites nous savoir.." style="height:100px"></textarea>

     <a class="btn btn-success" role="button" id="envoyer">Envoyer</a>

  </form>
</div>

</div>

<div class="center-block col-md-10 text-center" style="float: none;" id="reponse">

</div>
                       <script type="text/javascript" src="./js/audition.js"> </script> 
                    ';
            return $form;
            
        }




        public function prochaines_dates(){
            $result=$this->vpdo->prochaines_dates();
            
            $form='';
            $form.='
<h2 id="title_index"><i>Les prochaines dates de NGM</i></h2>
<div class="row" id="row_prochaines_dates"> 
';
            while($r = $result->fetch()){

                if($r[1]!='Répétition'){
                    $form.='
                       <div class="center-block " style="float:none" id="prochaines_dates_1">'.$r[2].'</div>
                            
                    
                        <div class="center-block" style="float:none" id="prochaines_dates_2">'.$r[1].'</div>';
                }

            }
      

$form.='
</div>

                    ';

return $form;
        }
        



        public function contact(){
            $form='';
            
            $form.='
                
                
<div id="stage" class="stage" >

<form  data-reactid=".0">
<fieldset data-reactid=".0.0">
<legend data-reactid=".0.0.0">Contact</legend>

<div class="control" data-reactid=".0.0.1">
<input id="nom" placeholder="..." required="" data-reactid=".0.0.1.0" type="text">
<label data-reactid=".0.0.1.1">Nom Prénom</label>
</div>

<div class="control" data-reactid=".0.0.2">
<input id="email" placeholder="..." required="" data-reactid=".0.0.2.0" type="email">
<label data-reactid=".0.0.2.1">e-mail</label>
</div>

<div class="control" data-reactid=".0.0.3">
<textarea id="message" placeholder="..." required="" data-reactid=".0.0.3.0" ></textarea>
<label data-reactid=".0.0.3.1">Message</label>
</div>

<a class="btn btn-success" role="button" id="envoyer">Envoyer</a>
</fieldset>

</form>
</div>


<div class="center-block col-md-10 text-center" style="float: none;" id="reponse">


</div>

<script type="text/javascript" src="./js/contact_perso.js"> </script>
';
            
            
            return $form;
        }
        



        public function videos(){
            $form='';
            $i=0;
            $result_1=$this->vpdo->videos();
            $result_2=$this->vpdo->annee();
            $coupe='';
            $res_coupe='';
            
            
            $form.='


<div class="col-md-10 center-block" style="float:none; margin-bottom:10px; ">

 <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Année Vidéos
  <span class="caret"></span></button>
  <ul class="dropdown-menu">

';
            
            while($r=$result_2->fetch()){
                
                $form.='<li><a >'.$r[0].'</a></li>';
            }
            
            $form.='

  </ul>
</div> 

</div>



';
            $r=null;
            while ($r=$result_1->fetch()){
                $coupe= explode('=', $r[2]);
               $rpl=$coupe[1];

            
        
                            $form.='
<div class="center-block col-sm-4 embed-responsive embed-responsive-16by9" id="videos_'.$i.'" name="'.$r[1].'">

<iframe width="400" height="325" class="embed-responsive-item"
src="https://www.youtube.com/embed/'.$rpl.'" >
</iframe> 

</div>

';
                         $i++;   
            }

            $form.='
                
         <script type="text/javascript" src="./js/videos.js"> </script>
';
            return $form;
        }
        



        public function audios(){
            $form='';
            
            $form.='
                <div class="row" id="audios_1">

';
            
            $result=$this->vpdo->audios();
            while($nom_audio=$result->fetch()){
                
                $form.='
                
                     <div class="center-block col-md-4 col-sm-4" style="float:none" id="audios_2"> 
                    <audio controls> <source src="./audio/'.$nom_audio[1].'.mp3" type="audio/ogg"> </audio>
                    </div>
                    

';
                
            }
            
            
            $form.='
                </div>
';
            return $form;
        }




        public function photos(){
            $album=null;
            $form='';
            
            $result_1= $this->vpdo->photos();
            
            $result_2=$this->vpdo->albums();
                        $form.='


<div class="col-md-10 center-block" style="float:none; margin-bottom:10px; ">

 <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Albums Photos
  <span class="caret"></span></button>
  <ul class="dropdown-menu">

';
            
            while($r=$result_2->fetch()){
                if($r[0]=='album_1'){
                    $album='album 1';
                }else{
                    if($r[0]=='album_2'){
                        $album='album 2';
                    }else{
                        if($r[0]=='album_3'){
                            $album='album 3';
                        }else{
                            if($r[0]=='album_4'){
                                $album='album 4';
                            } else {
                                if($r[0]=='album_5'){
                                    $album='album 5';
                                }
 else {
     
     $album='Toutes';
 }
                                
                            }
                        }
                    } 
                }
                
                $form.='<li><a name="'.$r[0].'">'.$album.'</a></li>';
            }
            
            $form.='

  </ul>
</div> 

</div>
';
            
            
            
            $form.='<div class="row">

';
                
            $r=null;
            while ($r = $result_1->fetch()){
                $form.='
 <div class="col-md-4" id="photos_'.$r[0].'" name="'.$r[3].'">
    <div class="thumbnail">
      <a href="./img/albums/'.$r[1].'.jpg">
        <img src="./img/albums/'.$r[1].'.jpg" alt="Lights" style="width:100%">
        <div class="caption" style="text-align:center">
          <p>'.$r[2].'</p>
        </div>
      </a>
    </div>
  </div>
  ';
            }



$form.='
</div>

 <script type="text/javascript" src="./js/photos.js"> </script>

';

return $form;;
        }




        public function gold_book(){
            $result=$this->vpdo->select_commentaire();
            $form='';
            $form.='

<div class="center-block col-md-6" style="float:none" id="block_message">

<div class="cont-contactBtn">
					<div class="cont-flip">
					
						<div class="front">
						<div class="center-block col-md-4" style="float: none">	<a href="#" class="btn btn-white flip">Votre avis ?</a></div>
						</div>
						
						<div class="back">
							<a href="#" class="flip close"></a>
							<form class="contact-form" >
								<input class="gutter" type="text" id="nom" placeholder="Name">
								<input type="text" id="prenom" placeholder="Prénom">
								<textarea name="" id="comment" placeholder="Votre avis sur notre chorale ?"></textarea>
								<input type="submit" value="Send" id="send">
							</form>
						</div>
					</div>

  </div>
  
  <div class="col-md-11 alert alert-success center-block" style="float: none" id="login-success">

</div>

<div class="col-md-11 alert alert-danger center-block" style="float: none" id="login-non_success">

</div>


  
  </div>
  
<div class="col-md-12"  id="container_gold_book">

';

            while($r = $result->fetch()){
                $form.='<div class="center-block row" style="float:none"  id="gold_book_post">
                <div class="col-md-3 text-center" id="nom_prenom" ><p><b>'.$r[0].' '.$r[1].'</b></p></div>
                <div class="col-md-4 text center" id="date_comment"><p>'.$r[2].'</p></div>
                <div class="col-md-6 text-center" id="commentaire">'.$r[3].'</div>
                </div>';

            }


            $form.='


</div>


  
   <script type="text/javascript" src="./js/gold_book.js"> </script>
   <script type="text/javascript" src="./js/send_gold_book.js"> </script>
  ';

            return $form;
        }


	
	
}
























