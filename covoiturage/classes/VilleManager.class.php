<?php
/**
 * La Classe VilleManager.
 *
 * Cette Classe permet la gestion en base de donnÃ©es de l'objet Ville.
 *
 * @author tristan
 */
class VilleManager{
	public function __construct($db){
		$this->db=$db;
	}
	/**
	 * fonction getList;
	 *
	 * @return la liste complete des villes contenues en bd.
	 */
	public function getList(){
		$ville = array();
		$listreq='SELECT * FROM ville order by vil_nom';
		$list = $this->db-> query($listreq);
		while($Vil=$list->fetch(PDO::FETCH_OBJ)){
			$ville[]=new Ville($Vil);
		};
		$list->closeCursor();
		return $ville;

	}
	/**
	 * fonction ajouterBd;
	 *
	 * ajoute la ville passé en parametre en bd.
	 *
	 * @param $ville l'objet ville à ajouter en bd;
	 */
	public function ajouterBd($ville){
		$reqVil="INSERT into `ville`( `vil_nom`)VALUES ( :vil_nom)";
		$repVil= $this->db -> prepare($reqVil);

		$repVil->bindValue(':vil_nom', $ville);

		$repVil->execute();
	}
	
	/**
	 * fonction exist;
	 *
	 * @param $element l'objet ville dont on veut verifier l'existence;
	 *
	 * @return booleen , true si l'objet passé en parametre existe en bd, false sinon;
	 */
	public function exist($element){
		$reqExist="SELECT * FROM ville where vil_nom= :vil_nom";
		$repExist= $this->db -> prepare($reqExist);
		$repExist->execute(array('vil_nom'=> $element));
		$res=$repExist->fetch(PDO::FETCH_OBJ);
		if($res)return true;
		else return false;
	}
}
