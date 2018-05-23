<?php
/**
 * La Classe FonctionManager.
 *
 * Cette Classe permet la gestion en base de données de l'objet Fonction.
 *
 * @author tristan
 */
class FonctionManager{
	public function __construct($db){
		$this->db=$db;
	}
	/**
	 * fonction getList;
	 *
	 * @return la liste complete des fonctions contenues en bd.
	 */
	public function getList(){
		$fonction = array();
		$listreq='select * from fonction ';
		$list = $this->db-> query($listreq);
		while($fon=$list->fetch(PDO::FETCH_OBJ)){
			$fonction[]=new Fonction($fon);
		};
		$list->closeCursor();
		return $fonction;
	}
	/**
	 *fonction getBDName;
	 *
	 *@param $num le fon_num de la fonction recherché
	 *
	 * @return la fonction contenue en bd de fon_num passé en parametre.
	 */
	public function getBDName($num){
		$req="SELECT * FROM fonction where fon_num=?";
		$rep= $this->db -> prepare($req);
		$rep->bindValue(1, $num);
		$rep-> execute();
		$resu=$rep->fetch(PDO::FETCH_OBJ);
		return new Fonction($resu) ;
	}
}
