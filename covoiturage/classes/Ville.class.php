<?php
/**
 * La Classe Ville.
 *
 * Cette Classe permet de caracteriser l'objet correspondant à la table Ville.
 *
 * @author tristan
 */
class Ville{
	private $vil_num;
	private $vil_nom;

	public function __construct($valeurs=array( )){
		if(isset($valeurs))$this->affecte($valeurs);
	}

	public function affecte($donnees){
		foreach($donnees as $attribut => $valeur){
			switch($attribut){
				case 'vil_num':$this->setvilNum($valeur);
				break;
				case 'vil_nom':$this->setvilNom($valeur);
				break;
			}
		}
	}
	public function setVilNom($valeur){
		$this->vil_nom=$valeur;
	}
	public function setVilNum($valeur){
		$this->vil_num=$valeur;
	}
	public function getVilNom(){
		return $this->vil_nom;
	}
	public function getVilNum(){
		return $this->vil_num;
	}
}
