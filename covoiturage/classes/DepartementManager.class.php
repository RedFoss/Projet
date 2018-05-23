<?php
/**
 * La Classe DepartementManager.
 *
 * Cette Classe permet la gestion en base de données de l'objet Departement.
 *
 * @author tristan
 */
class DepartementManager{
	public function __construct($db){
		$this->db=$db;
	}
	/**
	 * fonction getList;
	 * 
	 * @return la liste complete des departements contenues en bd.
	 */
	public function getList(){
		$departement = array();
		$listreq='select * from departement ';
		$list = $this->db-> query($listreq);
		while($dep=$list->fetch(PDO::FETCH_OBJ)){
			$departement[]=new Departement($dep);
		};
		$list->closeCursor();
		return $departement;

	}
}
