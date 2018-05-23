<?php
/**
 * La Classe ProposeManager.
 *
 * Cette Classe permet la gestion en base de donnÃ©es de l'objet Propose.
 *
 * @author tristan
 */
class ProposeManager{
	public function __construct($db){
		$this->db=$db;
	}
	/**
	 * fonction getVilledepList;
	 *
	 * @return une liste associative, d'attribut vil_num et de valeur vil_nom :la liste des viles correspondant au la villes de depart des proposition contenue en bd.
	 */
	public function getVilledepList(){
		$listreq='	SELECT vil_num, vil_nom FROM parcours p,ville  v, propose po
					WHERE p.par_num=po.par_num and po.pro_sens=1  and p.vil_num2=v.vil_num
					union
					SELECT vil_num, vil_nom FROM parcours p,ville  v, propose po
					WHERE p.par_num=po.par_num and po.pro_sens=0  and p.vil_num1=v.vil_num ';
		$list = $this->db-> query($listreq);
		$ville = array();
		while($par=$list->fetch(PDO::FETCH_OBJ)){
				$ville[$par->vil_num]=$par->vil_nom;
		};
		$list->closeCursor();
		$result = array_unique($ville);
		return $result;

	}
	/**
	 * fonction getVilleArrivePossibleList;
	 *
	 *@param $num le vil_num de la ville de depart;
	 *
	 * @return une liste associative, d'attribut vil_num et de valeur vil_nom :
	 * la liste des viles correspondant au la villes d'arrivée des proposition contenue en bd pour la ville de depart passé en parametre.
	 */
	public function getVilleArrivePossibleList($num){
		$listreq='	SELECT vil_num, vil_nom FROM parcours p,ville  v, propose po
					WHERE p.par_num=po.par_num and po.pro_sens=1  and p.vil_num1=v.vil_num and p.vil_num2= :num
					union
					SELECT vil_num, vil_nom FROM parcours p,ville  v, propose po
					WHERE p.par_num=po.par_num and po.pro_sens=0  and p.vil_num2=v.vil_num and p.vil_num1= :num
				';
		$req=$this->db->prepare($listreq);
		$req->execute(array('num'=>$num));
		$ville = array();
		while($v=$req->fetch(PDO::FETCH_OBJ)){
				$ville[$v->vil_num]=$v->vil_nom;
		};
		$req->closeCursor();
		$result = array_unique($ville);
		return $result;

	}
	/**
	 * fonction getListPropositionOK;
	 *
	 *@param $depart le vil_num de la ville de depart;
	 *
	 *@param $arrive le vil_num de la ville d'arrivée;
	 *
	 *@param $date la date de recherche au format "jj/mm/aaaa";
	 *
	 *@param $precision entier positif representant la precision en nombre de jour;
	 *
	 *@param $heure entier positif compris entre 0 et  23 representant l'heure min de recherche;
	 *
	 * @return une liste de proposition:
	 * la liste des proposition d'ont l'heure et la date n'est pas passé et correspondant aux criteres passés en parametre.
	 */
	public function getListPropositionOK($depart,$arrive,$date,$precision,$heure){
		$propose = array();
		$datetab=explode('/',$date);
		$d=$datetab[2].'-'.$datetab[1].'-'.$datetab[0];
		$dates=date_create($d);
		$listreq="select * from propose po,parcours p where po.par_num=p.par_num and po.pro_sens=1 and p.vil_num1= :arrive and p.vil_num2= :depart
				  union
				  select * from propose po,parcours p where po.par_num=p.par_num and po.pro_sens=0 and p.vil_num2= :arrive and p.vil_num1= :depart
				";
		$liste= $this->db -> prepare($listreq);
		$liste ->execute(array('depart'=>$depart,'arrive'=>$arrive));
		while($pro=$liste->fetch(PDO::FETCH_OBJ)){

			$temps=explode(':', $pro->pro_time);
			$pro_heure=$temps[0];

			$diff=date_diff(date_create($pro->pro_date),$dates)->format('%a');

			$pro_date=explode('-',$pro->pro_date);
			$pro_time=$pro_date[0].$pro_date[1].$pro_date[2].$temps[0].$temps[1].$temps[2];
			$current_time=date('Y').date('m').date('d').date('H').date('i').date('s');

			if($diff<=$precision  &&  $pro_heure>=$heure && $pro_time>=$current_time)$propose[]=new Propose($pro);
		}
		$liste->closeCursor();
		return $propose;
	}
	/**
	 * fonction ajouterBd;
	 *
	 * ajoute la proposition passé en parametre en bd.
	 *
	 * @param $propose l'objet propose à ajouter en bd;
	 */
	public function ajouterBd($propose){
		$reqPro="INSERT into `propose`( `per_num`,`par_num`, `pro_date`, `pro_time`,`pro_place`, `pro_sens`)VALUES ( :per_num, :par_num, :pro_date, :pro_time, :pro_place, :pro_sens)";
		$repPro= $this->db -> prepare($reqPro);
	
		$repPro->bindValue(':per_num', $propose->getPersonne()->getNum());
		$repPro->bindValue(':par_num', $propose->getParcours()->getParNum());
		$repPro->bindValue(':pro_date', $propose->getProDate());
		$repPro->bindValue(':pro_time', $propose->getProTime());
		$repPro->bindValue(':pro_place', $propose->getProPlace());
		$repPro->bindValue(':pro_sens', $propose->getProSens());
	
		$repPro->execute();
	}
}
