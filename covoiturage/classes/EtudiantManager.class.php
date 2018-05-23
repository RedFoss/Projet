<?php
require_once 'Mypdo.class.php';
require_once 'Etudiant.class.php';
/**
 * La Classe EtudiantManager.
 *
 * Cette Classe permet la gestion en base de données de l'objet Etudiant lié à l'objet Personne.
 *
 * @author tristan
 */
class EtudiantManager{
	public function __construct($db){
		$this->db=$db;
	}
	/**
	 * fonction per_detail_etu;
	 *
	 * @param $num le per_num de l'étudiant recherché
	 * 
	 * @return l'étudiant contenue en bd de per_num passé en parametre.
	 *
	 * associe l'utilisation des tables personne et etudiant
	 */
	public function per_detail_etu($num){
		$req="SELECT * FROM personne p inner join etudiant e on p.per_num=e.per_num inner join departement d on e.dep_num=d.dep_num inner join ville v on d.vil_num=v.vil_num
		where p.per_num=?";
		$rep= $this->db -> prepare($req);
		$rep->bindValue(1, $num);
		$rep-> execute();
		$resu=$rep->fetch(PDO::FETCH_OBJ);
		return new Etudiant($resu) ;
	}
	/**
	 * fonction ajouterBd;
	 * 
	 * ajoute l'étudiant passé en parametre en bd.
	 *
	 * @param $pers l'objet personne associé à  l'étudiant
	 *
	 * @param $dep le dep_num du département associé à  l'étudiant
	 *
	 * @param $div le div_num de la division associé à  l'étudiant
	 *
	 * associe l'utilisation des tables personne et etudiant;
	 * 
	 * fait appel à la fonction addPerbd contenue dans PersonneManager
	 * 
	 */
	public function ajouterBd($pers,$dep,$div){

		$personne=new PersonneManager($this->db);
		$num=$personne->addPerBd($pers);

		$reqEtu="INSERT into `etudiant`( `per_num`, `dep_num`, `div_num`)VALUES (:per_num, :dep_num, :div_num)";
		$repEtu= $this->db -> prepare($reqEtu);

		$repEtu->bindValue(':per_num', $num);
		$repEtu->bindValue(':dep_num', $dep);
		$repEtu->bindValue(':div_num', $div);


		$repEtu->execute();
	}
}
