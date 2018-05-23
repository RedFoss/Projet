<?php
/**
 * La Classe ParcoursManager.
 *
 * Cette Classe permet la gestion en base de données de l'objet Parcours.
 *
 * @author tristan
 */
class ParcoursManager{
	public function __construct($db){
		$this->db=$db;
	}
	/**
	 * fonction getList;
	 *
	 * @return la liste complete des parcours contenues en bd.
	 */
	public function getList(){
		$parcours = array();
		$listreq='SELECT par_num, v1.vil_num as vil_num1, v2.vil_num as vil_num2, v1.vil_nom as vil_nom1, v2.vil_nom as vil_nom2, par_km FROM parcours p,ville  v1,ville  v2 where v1.vil_num=p.vil_num1 and v2.vil_num=p.vil_num2 order by par_num';
		$list = $this->db-> query($listreq);
		while($par=$list->fetch(PDO::FETCH_OBJ)){
			$parcours[]=new Parcours($par);
		};
		$list->closeCursor();
		return $parcours;
	}
    /**
	 *fonction getParcours;
	 *
	 *@param $num le par_num de la fonction recherché
	 *
	 * @return le parcours contenue en bd de par_num passé en parametre.
	 */
	public function getParcours($num){
		$listreq='SELECT par_num, v1.vil_num as vil_num1, v2.vil_num as vil_num2, v1.vil_nom as vil_nom1, v2.vil_nom as vil_nom2, par_km FROM parcours p,ville  v1,ville  v2 where v1.vil_num=p.vil_num1 and v2.vil_num=p.vil_num2 and par_num= :par_num ';
		$parcours = $this->db-> prepare($listreq);
		$parcours -> execute(array('par_num'=> $num));
		$par=$parcours->fetch(PDO::FETCH_OBJ);
		return new Parcours($par);

	}
	/**
	 * fonction ajouterBd;
	 *
	 * ajoute le parcours passé en parametre en bd.
	 *
	 * @param $parcours l'objet parcours à ajouter en bd;
	 */
	public function ajouterBd($parcours){
		$reqVil="INSERT into `parcours`( `par_km`, `vil_num1`, `vil_num2`)VALUES ( :par_km, :vil_num1, :vil_num2)";
		$repVil= $this->db -> prepare($reqVil);
		$repVil->bindValue(':par_km', $parcours->getParKm());
		$repVil->bindValue(':vil_num1', $parcours->getVil1()->getVilNum());
		$repVil->bindValue(':vil_num2',$parcours->getVil2()->getVilNum());

		$repVil->execute();
	}
	/**
	 * fonction exist;
	 * 
	 * @param $element l'objet parcours dont on veut verifier l'existence;
	 *
	 * @return booleen , true si l'objet passé en parametre existe en bd, false sinon;
	 */
	public function exist($element){
		$requete="select * from parcours where vil_num1= :vil_num1 and vil_num2= :vil_num2" ;
		$res= $this->db -> prepare($requete);
		$res -> execute(array('vil_num1'=> $element->getVil1()->getVilNum(),'vil_num2'=> $element->getVil2()->getVilNum()));
		$res1=$res->fetch(PDO::FETCH_OBJ);
		$res -> execute(array('vil_num1'=> $element->getVil2()->getVilNum(),'vil_num2'=> $element->getVil1()->getVilNum()));
		$res2=$res->fetch(PDO::FETCH_OBJ);
		if($res1 || $res2)return true;
		else return false;
	}
	/**
	 * fonction getParcoursVilles;
	 *
	 * @return un tablau associatif d'attribut vil_num et de valeur vil_nom de toutes les villes correspondant à un parcours;
	 */
	public function getParcoursVilles(){
			$villes=array();
			$listreq='SELECT v.vil_num ,v.vil_nom FROM parcours p,ville  v where v.vil_num=p.vil_num1
								union
			 					SELECT v.vil_num ,v.vil_nom FROM parcours p,ville  v where v.vil_num=p.vil_num2';
			$list = $this->db-> query($listreq);
			while($v=$list->fetch(PDO::FETCH_OBJ)){
		  $villes[$v->vil_num]=$v->vil_nom;
			};
			$list->closeCursor();
			return $villes;
	}
	/**
	 * fonction getSecondeVillesParcours;
	 *
	 **@param $num le vil_num de la ville de depart;
	 *
	 * @return un tablau associatif d'attribut par_num.pro_sens et de valeur vil_nom correspondant au villes d'arrivé et parcours,sens associé possible depuis la ville de depart passé en parametres;
	 */
	public function getSecondeVillesParcours($num){
			$villes=array();
			$listreq='SELECT 1 as pro_sens,p.par_num,v.vil_nom FROM parcours p,ville  v where v.vil_num=p.vil_num1 and p.vil_num2= :num
								union
			 					SELECT 0 as pro_sens ,p.par_num ,v.vil_nom FROM parcours p,ville  v where v.vil_num=p.vil_num2 and p.vil_num1= :num';
			$repVil= $this->db -> prepare($listreq);
			$repVil->execute(array('num'=>$num));
			while($v=$repVil->fetch(PDO::FETCH_OBJ)){
		  $villes[$v->par_num.'.'.$v->pro_sens]=$v->vil_nom;
			};
			$repVil->closeCursor();
			return $villes;
	}

}
