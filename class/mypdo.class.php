<?php
date_default_timezone_set('EUROPE/Paris');
class mypdo extends PDO {

	private $utilisateur='boris';
	private $mdp='GOSPELoire1995';
	private $bdd='gospeloire';
	private $hote='localhost';
	
	private $connexion;

	/**
	 * Permet de créer un nouvel objet PDO
	 * @return string
	 */
	public function __construct(){
		$message="";
		try {
	$this->connexion=new PDO('mysql:host='.$this->hote.';dbname='.$this->bdd.';charset=UTF8',$this->utilisateur,$this->mdp);
	
			
		}
		catch(PDOException $ex){
		 echo 'hote: ' .$this->hote. ' ' . $_SERVER['DOCUMENT_ROOT'] . '<br />';
            echo 'Erreur : ' . $ex->getMessage() . '<br />';
            echo 'N° : ' . $ex->getCode();
            $this->connexion = false;
		}
		return $message;
	}
	
	/**
	 * 
	 * @param string $prop
	 * @return PDO
	 */
	public function __get($prop){
		switch ($prop){
			case 'connexion': 
                return $this->connexion;
			break;
		}
		
	}
        
        public function connexion($id,$mdp){
            
            $requete= 'SELECT a.id,a.nom_artiste,a.prenom_artiste,libelle,mdp FROM comptes c
  INNER JOIN artiste a ON a.id=c.id
  LEFT JOIN type_artiste t ON t.id_artiste=a.id
  LEFT JOIN type_musicien t_m ON t_m.id=t.id_type
WHERE a.nom_artiste=' . $this->connexion->quote($id).' AND c.mdp='. $this->connexion->quote(sha1($mdp)).' ';

            $result= $this->connexion->query($requete);
            
            if($result){
                
                    return $result;
               
            }else{
                return null;
            }
            
        }
	

        
          public function prochaines_dates(){
            
            $requete='SELECT * FROM prochaines_dates';
            $result=$this->connexion->query($requete);
            if($result){
                return $result;
            } else {
            
                return null;
            }
            
        }
        public function annee(){
            $requete='SELECT DISTINCT annee FROM videos ORDER BY annee ASC';
            $result= $this->connexion->query($requete);
            if($result){
                return $result;
            }else{
                return null;
            }
        }
        public function videos(){
            
            $requete='SELECT * FROM videos';
            $result=$this->connexion->query($requete);
            if($result){
                return $result;
                
            } else {
            
                return null;
            }
            
        }
        
        public function audios(){
            
            $requete='SELECT * FROM audios';
            $result= $this->connexion->query($requete);
            if($result){
                
                return $result;
                
            }else
            {
                return null;
            }
            
        }
        
        public function chants(){
            $reset='ALTER TABLE audios AUTO_INCREMENT = 1;';
            $this->connexion->query($reset);
            $requete='SELECT c.id,a.id,o.nom_chanteur, c.nom_audio, tp.libelle, cat.nom_categ FROM chants c INNER JOIN originals o ON o.id=c.id INNER JOIN audios a ON c.id=a.id_chant 
                INNER JOIN categ_audio cat ON cat.id=a.categ_audio INNER JOIN type_musicien tp ON tp.id=a.type_musicien WHERE ordre IS NOT NULL ORDER BY c.id,ordre ASC 
                ';
            
            $result= $this->connexion->query($requete);
            
            if($result){
                return $result;
            }else{
                return null;
            }
        }

        public function nb_chants(){
            $requete='SELECT * FROM chants ';
            $result=$this->connexion->query($requete);

            if($result){
                return $result->rowCount();
            }else
            {
                return null;
            }

        }

        public function parametres($id){
            $requete='SELECT a.id,nom_artiste, prenom_artiste,c.photo FROM artiste a INNER JOIN comptes c ON c.id=a.id WHERE a.id='.$this->connexion->quote($id).' ';

            $result=$this->connexion->query($requete);
            if($result){
                return $result;
            }else{
                return null;
            }

        }

    public function insert_photo($nom){
        $requete='UPDATE comptes c INNER JOIN artiste a ON c.id=a.id SET c.photo='.$this->connexion->quote($nom).' WHERE a.id='.$this->connexion->quote($_SESSION['id']).' ';

        $result=$this->connexion->query($requete);
        if($result){
            return $result;
        }else{
            return null;
        }

    }

    public function maj_info_chanteur($type,$donnee){
        if($type=='nom'){
            $requete='UPDATE artiste SET nom_artiste='.$this->connexion->quote($donnee).' WHERE id='.$this->connexion->quote($_SESSION['id']).' ';
            $result=$this->connexion->query($requete);

            if($result){
                return $result;
            }else{
                return null;
            }
        }else{
            if($type=='prenom'){
                $requete='UPDATE artiste SET prenom_artiste='.$this->connexion->quote($donnee).' WHERE id='.$this->connexion->quote($_SESSION['id']).' ';
                $result=$this->connexion->query($requete);

                if($result){
                    return $result;
                }else{
                    return null;
                }
            }else{

                $requete='UPDATE comptes c INNER JOIN artiste a ON a.id=c.id SET c.mdp='.$this->connexion->quote(sha1($donnee)).' WHERE a.id='.$this->connexion->quote($_SESSION['id']).' ';
                $result=$this->connexion->query($requete);

                if($result){
                    return $result;
                }else{
                    return null;
                }

            }
        }

    }



        public function originals($id){
            $requete='SELECT nom_chanteur, biographie FROM originals WHERE id='.$id.' ';

            $result=$this->connexion->query($requete);
            if($result){
                return $result;
            }else{
                return null;
            }
        }
        
        
        public function albums(){
            $requete='SELECT libelle FROM album';
            $result= $this->connexion->query($requete);
            if($result){
                return $result;
            }else{
                return null;;
            }
        }




        public function photos(){
            $requete='SELECT p.id,nom_photo,contexte,a.libelle FROM photos p INNER JOIN album a ON p.album=a.id';
            $result= $this->connexion->query($requete);
            if($result){
                
                return $result;
                
            }else{
                return null;
            }
        }

        public function commentaire($nom,$prenom,$comment){


           $date= new Datetime('NOW');
          $date= $date->format('d-m-Y H:i:s');


            $requete='INSERT INTO commentaire(nom_commentateur,prenom_commentateur,commentaire,date_commentaire) VALUES('.$this->connexion->quote($nom).','.$this->connexion->quote($prenom).','.$this->connexion->quote($comment).','.$this->connexion->quote($date).')';

$result=$this->connexion->query($requete);
            if($result){
                return $result;
            }else
            {
                return null;
            }
        }

        public function select_commentaire(){
            $requete='SELECT nom_commentateur,prenom_commentateur,date_commentaire,commentaire FROM commentaire ORDER BY date_commentaire DESC';

            $result=$this->connexion->query($requete);
            if($result){
                return $result;
            }else{
                return null;
            }
        }
     
	



}




