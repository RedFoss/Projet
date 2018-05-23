<?php
/**
 * La Classe Parcours.
 *
 * Cette Classe permet de caracteriser l'objet correspondant à la table Parcours.
 *
 * un parcours correspond a un ensemble de deux villes
 *
 * @author tristan
 */
class Parcours{
	private $par_num;
	private $par_km;
	private $ville1;
	private $ville2;

	public function __construct($valeurs=array( )){
		if(isset($valeurs))$this->affecte($valeurs);
	}

	public function affecte($donnees){
		$this->ville1=new Ville();
		$this->ville2=new Ville();
		foreach($donnees as $attribut => $valeur){
			switch($attribut){
				case 'par_num':$this->setParNum($valeur);
				break;
				case 'par_km':$this->setParKm($valeur);
				break;
				case 'vil_num1':$this->setVilNum1($valeur);
				break;
				case 'vil_num2':$this->setVilNum2($valeur);
				break;
				case 'vil_nom1':$this->setVilNom1($valeur);
				break;
				case 'vil_nom2':$this->setVilNom2($valeur);
				break;
			}
		}
	}
	public function setParKm($valeur){
		$this->par_km=$valeur;
	}
	public function setParNum($valeur){
		$this->par_num=$valeur;
	}
	public function getParKm(){
		return $this->par_km;
	}
	public function getParNum(){
		return $this->par_num;
	}
	public function setVilNum1($valeur){
		$this->ville1->setVilNum($valeur);
	}
	public function setVilNum2($valeur){
		$this->ville2->setVilNum($valeur);
	}
	public function setVilNom1($valeur){
		$this->ville1->setVilNom($valeur);
	}
	public function setVilNom2($valeur){
		$this->ville2->setVilNom($valeur);
	}
	public function getVil1(){
		return $this->ville1;
	}
	public function getVil2(){
		return $this->ville2;
	}
}
