<?php
/**
 * La Classe Fonction.
 *
 * Cette Classe permet de caracteriser l'objet correspondant à la table Fonction.
 *
 * @author tristan
 */
class Fonction{
	private $fon_num;
	private $fon_libelle;
	public function __construct($valeurs=array( )){
		if(isset($valeurs))$this->affecte($valeurs);
	}

	public function affecte($donnees){
		foreach($donnees as $attribut => $valeur){
			switch($attribut){
				case 'fon_num':$this->setFonNum($valeur);
				break;
				case 'fon_libelle':$this->setFonLib($valeur);
				break;
			}
		}
	}
	public function setFonNum($valeur){
		$this->fon_num=$valeur;
	}
	public function setFonLib($valeur){
		$this->fon_libelle=$valeur;
	}
	public function getFonNum(){
		return $this->fon_num;
	}
	public function getFonLib(){
		return $this->fon_libelle;
	}
}
