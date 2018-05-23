<?php
/**
 * La Classe Departement.
 *
 * Cette Classe permet de caracteriser l'objet correspondant à la table Departement.
 *
 * @author tristan
 */
class Departement{
	private $dep_num;
	private	$dep_nom;
	private $ville;

	public function __construct($valeurs=array( )){
		if(isset($valeurs))$this->affecte($valeurs);
	}

	public function affecte($donnees){
		$this->setVille($donnees);
		foreach($donnees as $attribut => $valeur){
			switch($attribut){
				case 'dep_num':$this->setDepNum($valeur);
				break;
				case 'dep_nom':$this->setDepNom($valeur);
				break;
			}
		}
	}
	public function setDepNum($valeur){
		$this->dep_num=$valeur;
	}
	public function setDepNom($valeur){
		$this->dep_nom=$valeur;
	}
	public function setVille($valeur){
		$this->ville=new Ville();
		$this->ville->affecte($valeur);
	}
	public function getDepNum(){
		return $this->dep_num;
	}
	public function getDepNom(){
		return $this->dep_nom;
	}
	public function getVille(){
		return $this->ville;
	}
}
