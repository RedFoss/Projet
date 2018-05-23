<?php
/**
 * La Classe SalarieManager.
 *
 * Cette Classe permet la gestion en base de donnÃ©es de l'objet Salarie liÃ© Ã  l'objet Personne.
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
	 * @param $num le per_num du salarié recherché
	 *
	 * @return le salarié contenue en bd de per_num passé en parametre.
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
	 * ajoute le salarié passé en parametre en bd.
	 *
	 * @param $pers l'objet personne associé au salarié
	 *
	 * @param $sal_telprof le numero de telephone proffesionnel associé au salarié
	 *
	 * @param $fon le fon_num de la fonction associé au salarié;
	 *
	 * associe l'utilisation des tables personne et salarie;
	 *
	 * fait appel à la fonction addPerbd contenue dans PersonneManager
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
