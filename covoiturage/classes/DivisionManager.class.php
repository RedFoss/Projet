<?php
/**
 * La Classe DivisionManager.
 *
 * Cette Classe permet la gestion en base de données de l'objet Division.
 *
 * @author tristan
 */
class DivisionManager{
	public function __construct($db){
		$this->db=$db;
	}
	/**
	 * fonction getList;
	 * 
	 * @return la liste complete des division contenues en bd.
	 */
	public function getList(){
		$division = array();
		$listreq='select * from division ';
		$list = $this->db-> query($listreq);
		while($div=$list->fetch(PDO::FETCH_OBJ)){
			$division[]=new Division($div);
		};
		$list->closeCursor();
		return $division;

	}
	/**
	 *fonction getBDName;
	 *
	 *@param $num le div_num de la division recherché
	 * 
	 * @return la division contenue en bd de div_num passé en parametre.
	 */
	public function getBDName($num){
		$req="SELECT * FROM division where div_num=?";
		$rep= $this->db -> prepare($req);
		$rep->bindValue(1, $num);
		$rep-> execute();
		$resu=$rep->fetch(PDO::FETCH_OBJ);
		return  new Division($resu) ;
	}
}
