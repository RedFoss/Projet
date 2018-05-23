<?php
/**
 * La Classe SalarieManager.
 *
 * Cette Classe permet la gestion en base de données de l'objet Salarie lié à l'objet Personne.
 *
 * @author tristan
 */
class SalarieManager{
	public function __construct($db){
		$this->db=$db;
	}
	/**
	 * fonction per_detail_sal;
	 *
	 * @param $num le per_num du salari� recherch�
	 *
	 * @return le salari� contenue en bd de per_num pass� en parametre.
	 *
	 * associe l'utilisation des tables personne et salarie
	 */
	public function per_detail_sal($num){
		$req="SELECT * FROM personne p inner join salarie s on p.per_num=s.per_num inner join fonction f on s.fon_num=f.fon_num where p.per_num=?";
		$rep= $this->db-> prepare($req);
		$rep->bindValue(1, $num);
		$rep-> execute();
		$resu=$rep->fetch(PDO::FETCH_OBJ);
		return new Salarie($resu) ;
	}
	/**
	 * fonction ajouterBd;
	 *
	 * ajoute le salari� pass� en parametre en bd.
	 *
	 * @param $pers l'objet personne associ� au salari�
	 *
	 * @param $sal_telprof le numero de telephone proffesionnel associ� au salari�
	 *
	 * @param $fon le fon_num de la fonction associ� au salari�;
	 *
	 * associe l'utilisation des tables personne et salarie;
	 *
	 * fait appel � la fonction addPerbd contenue dans PersonneManager
	 *
	 */
	public function ajouterBd($pers,$sal_telprof,$fon){

		$personne=new PersonneManager($this->db);
		$num=$personne->addPerBd($pers);

		$reqSal="INSERT into `salarie`( `per_num`, `sal_telprof`, `fon_num`)VALUES (:per_num, :sal_telprof, :fon_num)";
		$repSal= $this->db -> prepare($reqSal);

		$repSal->bindValue(':per_num', $num);
		$repSal->bindValue(':sal_telprof', $sal_telprof);
		$repSal->bindValue(':fon_num', $fon);

		$repSal->execute();
	}
}
