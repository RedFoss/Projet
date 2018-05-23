<?php
/**
 * La Classe AvisManager.
*
* Cette Classe permet la gestion en base de données de l'objet Avis.
*
* @author tristan
*/
class AvisManager{
	public function __construct($db){
		$this->db=$db;
	}
	public function getListMoyAvisPers(){
		$req="select AVG(avi_note) as moy from avis group by per_num";
		$repsql=$this->db->query($req);
		$list=array();
		while($rep=$repsql->fetch(PDO::FETCH_OBJ)){
			$list[$rep->per_num]=$rep->moy;
		};
		$repsql->closeCursor();
		return $list;
	}
	
	public function getMoyAvisPers($per_num){
		$req="select AVG(avi_note) as moy from avis where per_num= :num group by per_num";
		$prepsql= $this->db -> prepare($req);
		$prepsql->execute(array('num'=>$per_num));
		$rep=$prepsql->fetch(PDO::FETCH_OBJ);
		if($rep)return $rep->moy;
		else return "aucune";
	}
	
	public function getLastAvisPers($per_num){
		$req="select avi_comm from avis where per_num= :num and avi_date=(select MAX(avi_date)
              FROM avis where per_num= :num)";
		$prepsql= $this->db -> prepare($req);
		$prepsql->execute(array('num'=>$per_num));
		$rep=$prepsql->fetch(PDO::FETCH_OBJ);
		if($rep)return $rep->avi_comm;
		else return "aucun avis";
	}
}
