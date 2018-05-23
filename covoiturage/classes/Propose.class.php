<?php
/**
 * La Classe Propose.
 *
 * Cette Classe permet de caracteriser l'objet correspondant à la table Propose.
 *
 * @author tristan
 */
class Propose{
	private $parcours;
	private $personne;
	private $pro_date;
	private $pro_time;
	private $pro_sens;
	private $pro_place;

	public function __construct($valeurs=array()){
		if(isset($valeurs))$this->affecte($valeurs);
	}

	public function affecte($donnees){
		$this->parcours=new Parcours();
		$this->personne=new Personne();
		foreach($donnees as $attribut => $valeur){
			switch($attribut){
				case 'par_num':$this->setParcours($valeur);
				break;
				case 'per_num':$this->setPersonne($valeur);
				break;
				case 'pro_date':$this->setProDate($valeur);
				break;
				case 'pro_time':$this->setProTime($valeur);
				break;
				case 'pro_sens':$this->setProSens($valeur);
				break;
				case 'pro_place':$this->setProPlace($valeur);
				break;
			}
		}
	}
	public function setParcours($valeur){
		$parcoursManadge=new ParcoursManager(new Mypdo());
		$this->parcours=$parcoursManadge->getParcours($valeur);
	}
	public function setPersonne($valeur){
		$personneManadge=new PersonneManager(new Mypdo());
		$this->personne=$personneManadge->getPersonne($valeur);
	}
	public function setProDate($valeur){
		$this->pro_date=$valeur;
	}
	public function setProTime($valeur){
		$this->pro_time=$valeur;
	}
	public function setProPlace($valeur){
		$this->pro_place=$valeur;
	}
	public function setProSens($valeur){
		$this->pro_sens=$valeur;
	}
	public function getParcours(){
		return $this->parcours;
	}
	public function getPersonne(){
		return $this->personne;
	}
	public function getProDate(){
		return $this->pro_date;
	}
	public function getProTime(){
		return $this->pro_time;
	}
	public function getProPlace(){
		return $this->pro_place;
	}
	public function getProSens(){
		return $this->pro_sens;
	}
}
