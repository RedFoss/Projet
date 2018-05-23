<?php
/**
 * La Classe Avis.
*
* Cette Classe permet de caracteriser l'objet correspondant à la table Avis.
*
* @author tristan
*/
class Avis{
	private $per_num; //conducteur
	private $per_per_num; //covoitureur
	private $par_num;	//parcours covoituré
	private $avi_comm;	//commentaire
	private $avi_note;
	private	$avi_date;

	public function __construct($valeurs=array( )){
		if(isset($valeurs))$this->affecte($valeurs);
	}

	public function affecte($donnees){
		foreach($donnees as $attribut => $valeur){
			switch($attribut){
				case 'per_num':$this->setPerNum($valeur);
				break;
				case 'per_per_num':$this->setPerPerNum($valeur);
				break;
				case 'par_num':$this->setParNum($valeur);
				break;
				case 'avi_comn':$this->setAviComm($valeur);
				break;
				case 'avi_note':$this->setAvisNote($valeur);
				break;
				case 'avi_date':$this->setAviDate($valeur);
				break;
			}
		}
	}
	public function setPerNum($valeur){
		$this->per_num=$valeur;
	}
	public function setPerPerNum($valeur){
		$this->per_per_num=$valeur;
	}
	public function setParNum($valeur){
		$this->par_num=$valeur;
	}
	public function setAviComm($valeur){
		$this->avi_comn=$valeur;
	}
	public function setAviNote($valeur){
		$this->avi_note=$valeur;
	}
	public function setAviDate($valeur){
		$this->avi_date=$valeur;
	}
	public function getPerNum(){
		return $this->per_num;
	}
	public function getPerPerNum(){
		return $this->per_per_num;
	}
	public function getParNum(){
		return $this->par_num;
	}
	public function getAviComm(){
		return $this->avi_comm;
	}
	public function getAviNote(){
		return $this->avi_note;
	}
	public function getAviDate(){
		return $this->avi_date;
	}
	
}
