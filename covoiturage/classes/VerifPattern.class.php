<?php
/**
 * La Classe VerifPattern.
 *
 * Cette Classe permet de verifier la validité des informations reçu par le serveur.
 *
 * @author tristan
 */
class VerifPattern{
	private $valid=true;

	public function __construct($valeurs=array( )){
		if(isset($valeurs))$this->affecte($valeurs);
	}

	public function affecte($donnees){
		foreach($donnees as $attribut => $valeur){
			switch($attribut){
				case 'per_nom':$this->verifNomPrenom($valeur,'nom');
				break;
				case 'per_prenom':$this->verifNomPrenom($valeur,'prenom');
				break;
				case 'per_tel':$this->verifTel($valeur);
				break;
				case 'per_mail':$this->verifEmail($valeur);
				break;
				case 'per_login':$this->verifLogin($valeur);
				break;
				case 'per_pwd':$this->verifPwd($valeur);
				break;
				case 'sal_telprof':$this->verifTel($valeur);
				break;
				case 'vil_nom':$this->verifVilNom($valeur);
				break;
				case 'date':$this->verifDate($valeur);
				break;
			}
		}
	}
	private function verifNomPrenom($valeur, $name){
		if (! preg_match (  "/[a-zA-Z]{1,15}$/ " , $valeur ) ){
			echo $name+" faux";
			$this->valid=false;
		}
	}
	private function verifEmail($valeur){
		if (! filter_var($valeur, FILTER_VALIDATE_EMAIL) ){
			$this->valid=false;
			echo "mail faux";
		}
	}
	private function verifLogin($valeur){
		if (! preg_match ( "~^[\w]+$~" , $valeur ) ){
			$this->valid=false;
			echo "login faux";
		}
	}
	private function verifPwd($valeur){
		/*if (! preg_match ( '/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/' , $valeur ) ){
			echo "pwd faux";
			$this->valid=false;
		}*/
	}
	private function verifTel($valeur){
		if (! preg_match ("/[0-9]{10}$/" , $valeur ) ){
			echo "tel faux";
			$this->valid=false;
		}
	}
	private function verifVilNom($valeur){
		if (! preg_match (  "/^[A-Z][a-z]{1,15}$/ " , $valeur ) ){
			echo "ville faux";
			$this->valid=false;
		}
	}
	private function verifDate($valeur){
		$date=explode('/', $valeur);
		$result = checkdate($date[1],$date[0],$date[2]);
		if(!$result)$this->valid=false;
		else if($date[2]<date('Y'))$this->valid=false;
		else if($date[2]=date('Y') && $date[1]<date('m'))$this->valid=false;
		else if($date[2]=date('Y') && $date[1]=date('m') && $date[0]<date('j'))$this->valid=false;
	}
	public function estValide(){
		return $this->valid;
	}

}
