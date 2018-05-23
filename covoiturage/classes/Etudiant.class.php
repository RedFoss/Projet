<?php
/**
 * La Classe Etudiant.
 *
 *etends la classe Personne 
 *
 * Cette Classe permet de caracteriser l'objet Etudiant correspondant aux table Etudiant et Personne.
 *
 * @author tristan
 */
class Etudiant extends Personne{
	private $division;
	private $departement;
	
	public function __construct($valeurs=array()){
		if(isset($valeurs))$this->affecte($valeurs);
	}
	
	public function affecte($donnees){
		parent::affecte($donnees);
		$this->setDepartement($donnees);
		$this->setDivision($donnees);
	}
	public function setDepartement($value){
		$this->departement=new Departement();
		$this->departement->affecte($value);
		
	}
	public function setDivision($value){
		$this->division=new Division();
		$this->division->affecte($value);
	
	}
	public function getDepartement(){
		return $this->departement;
	}
	public function getDivision(){
		return $this->division;
	}
}