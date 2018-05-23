<?php
/**
 * La Classe Personne.
 *
 * Cette Classe permet de caracteriser l'objet correspondant à la table Personne.
 *
 * @author tristan
 */
class Personne{
	private $per_num;
	private	$per_nom;
	private $per_prenom;
	private $per_tel;
	private $per_mail;
	private $per_login;
	protected $per_pwd;

	public function __construct($valeurs=array( )){
		if(isset($valeurs))$this->affecte($valeurs);
	}

	public function affecte($donnees){
		foreach($donnees as $attribut => $valeur){
			switch($attribut){
				case 'per_num':$this->setNum($valeur);
					break;
				case 'per_nom':$this->setNom($valeur);
					break;
				case 'per_prenom':$this->setPrenom($valeur);
					break;
				case 'per_tel':$this->setTel($valeur);
					break;
				case 'per_mail':$this->setMail($valeur);
					break;
				case 'per_login':$this->setLogin($valeur);
					break;
				case 'per_pwd':$this->setPwd($valeur);
					break;
			}
		}
	}
	public function setNum($valeur){
		$this->per_num=$valeur;
	}
	public function setNom($valeur){
		$this->per_nom=$valeur;
	}
	public function setPrenom($valeur){
		$this->per_prenom=$valeur;
	}
	public function setTel($valeur){
		$this->per_tel=$valeur;
	}
	public function setMail($valeur){
		$this->per_mail=$valeur;
	}
	public function setLogin($valeur){
		$this->per_login=$valeur;
	}
	public function setPwd($valeur){
		$this->per_pwd=$this->crypte_pwd($valeur);
	}
	public function getNum(){
		return $this->per_num;
	}
	public function getNom(){
		return $this->per_nom;
	}
	public function getPrenom(){
		return $this->per_prenom;
	}
	public function getTel(){
		return $this->per_tel;
	}
	public function getMail(){
		return $this->per_mail;
	}
	public function getLogin(){
		return $this->per_login;
	}
	public function getPwd(){
		return $this->per_pwd;
	}
	protected function crypte_pwd($valeur){
		$salt="48@!alsd";
		return sha1(sha1($valeur).$salt);

	}
}
