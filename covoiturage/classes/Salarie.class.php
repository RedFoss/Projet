<?php
/**
* La Classe Division.
* 
* etends la classe Personne
*
* Cette Classe permet de caracteriser l'objet Salarie correspondant aux table Etudiant et Personne.
*
* @author tristan
*/
class Salarie extends Personne{
	private	$sal_telprof;
	private $fonction;

	public function __construct($valeurs=array( )){
		if(isset($valeurs))$this->affecte($valeurs);
	}

	public function affecte($donnees){
		parent::affecte($donnees);
		$this->setFonction($donnees);
		foreach($donnees as $attribut => $valeur){
			switch($attribut){
				case 'sal_telprof':$this->setTelProf($valeur);
				break;
			}	
		}
	}
	public function setFonction($value){
		$this->fonction=new Fonction();
		$this->fonction->affecte($value);
	}
	public function setTelProf($valeur){
		$this->sal_telprof=$valeur;
	}
	public function getTelProf(){
		return $this->sal_telprof;
	}/*
	public function getDep(){
		return $this->sal_telprof;
	}*/
	public function getFonction(){
		return $this->fonction;
	}

}