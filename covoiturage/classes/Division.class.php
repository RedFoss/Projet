<?php
/**
 * La Classe Division.
 *
 * Cette Classe permet de caracteriser l'objet correspondant à la table Division.
 *
 * @author tristan
 */
class Division{
	private $div_num;
	private $div_nom;
	
	public function __construct($valeurs=array( )){
		if(isset($valeurs))$this->affecte($valeurs);
	}
	
	public function affecte($donnees){
		foreach($donnees as $attribut => $valeur){
			switch($attribut){
				case 'div_num':$this->setDivNum($valeur);
				break;
				case 'div_nom':$this->setDivNom($valeur);
				break;
			}
		}
	}
	public function setDivNom($valeur){
		$this->div_nom=$valeur;
	}
	public function setDivNum($valeur){
		$this->div_num=$valeur;
	}
	public function getDivNom(){
		return $this->div_nom;
	}
	public function getDivNum(){
		return $this->div_num;
	}
}