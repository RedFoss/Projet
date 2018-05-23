

<?php
/**
 * La Classe PersonneManager.
 *
 * Cette Classe permet la gestion en base de donnÃ©es de l'objet Personne.
 *
 * elle assure la gestion de la connexion
 *
 * @author tristan
 */
class PersonneManager{
	public function __construct($db){
		$this->db=$db;
	}

	/**
	 * fonction type_pers;
	 *
	 * @param $num le per_num de la personne dont on cherche le type;
	 * 
	 * @return une chaine, 'etu' pour etudiant, 'sal' pour salarié, 'err' en cas d'absence de correspondance;
	 * 
	 * se base sur les table etudiant et salarie
	 */
	public function type_pers($num){
		$etu='SELECT per_num FROM  etudiant where per_num= :num';
		$preEtu= $this->db -> prepare($etu);
		$preEtu ->execute(array('num'=>$num));
		$etu=$preEtu -> fetch(PDO::FETCH_OBJ);

		$sal='SELECT per_num FROM  salarie where per_num= :num';
		$preSal= $this->db -> prepare($sal);
		$preSal ->execute(array('num'=>$num));
		$sal=$preSal -> fetch(PDO::FETCH_OBJ);

		if(isset($etu->per_num))return 'etu';
		if(isset($sal->per_num))return 'sal';
		return 'err';
	}
	/**
	 * fonction getList;
	 *
	 * @return la liste complete des personnes contenues en bd.
	 */
	public function getList(){
		$listPer = array();
		$listreq ='SELECT per_nom, per_num, per_prenom FROM personne order by per_nom';
		$list = $this->db-> query($listreq);
		while ($per=$list->fetch(PDO::FETCH_OBJ)){
			$listPer[]= new Personne($per);
		}
		$list->closeCursor();
		return $listPer;
	}
	/**
	 * fonction addPerBd;
	 *
	 * ajoute la personne  passé en parametre en bd.
	 *
	 * @param $pers l'objet personne à ajouter en bd;
	 * 
	 * @return l'id per_num de la personne ajouté;
	 * 
	 * cette fonction est uniquement appelée par les fonctions ajouterBd des manadgers de etudiant et salarie;
	 * elle ne doit pas etre instancié autrement (pb d'integrité bdd)!;
	 */
	public function addPerBd($pers){
		$reqPers="INSERT into `personne`(`per_nom`, `per_prenom`,`per_tel`, `per_mail`,`per_login`,`per_pwd`)
				  	VALUES (:per_nom, :per_prenom,:per_tel, :per_mail,:per_login,:per_pwd)";
		$repPers= $this->db -> prepare($reqPers);
		$repPers->bindValue(':per_nom', $pers->getNom());
		$repPers->bindValue(':per_prenom', $pers->getPrenom());
		$repPers->bindValue(':per_tel', $pers->getTel());
		$repPers->bindValue(':per_mail', $pers->getMail());
		$repPers->bindValue(':per_login', $pers->getLogin());
		$repPers->bindValue(':per_pwd', $pers->getPwd());
		$repPers->execute();

		return $this->db->lastInsertId();
	}
	/**
	 * fonction se_connecter;
	 *
	 * connect le client si les information son bonne.
	 *
	 * @param $pers l'objet personne contenant les données à verifier;
	 *
	 * @return un chiffre, 0 si le client à été connecté, 2 si le password est faux, 1 si le login n'existe pas;
	 *
	 */
	public function	se_connecter($pers){
		$reqlog="SELECT * from personne where per_login = :login";
		$prepsql= $this->db -> prepare($reqlog);
		$prepsql -> execute(array('login'=> $pers->getLogin()));
		$logOK=$prepsql  -> fetch(PDO::FETCH_OBJ);
		if($logOK){
			$req="SELECT per_num from personne where per_login = :login and  per_pwd = :password";
			$prepsql2= $this->db -> prepare($req);
			$prepsql2 -> execute(array('login'=> $pers->getLogin(), 'password' => $pers->getPwd()));
			$pwdOK= $prepsql2  -> fetch(PDO::FETCH_OBJ);
			if($pwdOK){
				$_SESSION['login']=$pers->getLogin();
				$_SESSION['id']=$pwdOK->per_num;
				return 0;
			}else return 2;
		}else return 1;
	}
	/**
	 * fonction getPersonne;
	 *
	 * @param $num le per_num de la personne recherché;
	 *
	 * @return la personne (objet) correspondant au numero passé en parametre ;
	 *
	 */
	public function	getPersonne($num){
		$reqlog="SELECT * from personne where per_num = :num";
		$prepsql= $this->db -> prepare($reqlog);
		$prepsql -> execute(array('num'=> $num));
		$pers=$prepsql  -> fetch(PDO::FETCH_OBJ);
		return new Personne($pers);
	}
	/**
	 * fonction existLogin;
	 *
	 * ajoute le parcours passé en parametre en bd.
	 *
	 * @param $element l'objet personne dont on veut verifier l'existence ou non du login;
	 *
	 * @return booleen, faux si le login n'exist pas dans la table personne;
	 */
	public function existLogin($element){
		$reqlog="SELECT * from personne where per_login = :login ";
		$prepsql= $this->db -> prepare($reqlog);
		$prepsql -> execute(array('login'=> $element->getLogin()));
		if($prepsql -> fetch(PDO::FETCH_OBJ))return true;
		else return false;
	}
	/**
	 * fonction existMail;
	 *
	 * ajoute le parcours passé en parametre en bd.
	 *
	 * @param $element l'objet personne dont on veut verifier l'existence ou non du mail;
	 *
	 * @return booleen, faux si le mail n'exist pas dans la table personne;
	 */
	public function existMail($element){
		$reqlog="SELECT * from personne where per_mail = :mail";
		$prepsql= $this->db -> prepare($reqlog);
		$prepsql -> execute(array('mail'=> $element->getMail()));
		if($prepsql -> fetch(PDO::FETCH_OBJ))return true;
		else return false;
	}
	/**
	 * fonction deletePersonne;
	 * 
	 * supprime la personne dont le num est passé en parametre de la bd
	 * 
	 * @param $num le per-num de la personne à suprimer
	 * 
	 * @return true si achever;
	 * 
	 * utilise les tables personne, avis, propose,etudiant,salarie
	 */
	public function deletePersonne($num){
		$reqAvis="DELETE from avis where per_num= :num or per_per_num= :num";
		$prepAvis= $this->db -> prepare($reqAvis);
		$prepAvis -> execute(array('num'=> $num));
		$reqPro="DELETE from propose where per_num= :num";
		$prepPro= $this->db -> prepare($reqPro);
		$prepPro -> execute(array('num'=> $num));
		$reqSal="DELETE from salarie where per_num= :num";
		$prepSal= $this->db -> prepare($reqSal);
		$prepSal -> execute(array('num'=> $num));
		$reqEtu="DELETE from etudiant where per_num= :num";
		$prepEtu= $this->db -> prepare($reqEtu);
		$prepEtu -> execute(array('num'=> $num));
		$reqPers="DELETE from personne where per_num= :num";
		$prepPers= $this->db -> prepare($reqPers);
		$prepPers -> execute(array('num'=> $num));
		return true;
	}
	/**
	 * fonction updatePersonne;
	 *
	 * met à jour la personne  passé en parametre 
	 *
	 * @param $pers l'objet corespondant à la personne a modifier en bd;
	 * $pers peut etre de type Etudiant ou Salarie;
	 *
	 * utilise les tables personne,etudiant,salarie
	 */
	public function updatePersonne($pers){
		if(isset($pers->per_pwd)){
			$reqUpPer="UPDATE personne set per_pwd= :per_pwd,per_nom= :per_nom,per_prenom= :per_prenom,per_tel= :per_tel,per_mail= :per_mail,per_login= :per_login where per_num= :num ";
			$repUpPer= $this->db -> prepare($reqUpPer);
			$repUpPer->bindValue(':per_nom', $pers->getNom());
			$repUpPer->bindValue(':per_prenom', $pers->getPrenom());
			$repUpPer->bindValue(':per_tel', $pers->getTel());
			$repUpPer->bindValue(':per_mail', $pers->getMail());
			$repUpPer->bindValue(':per_login', $pers->getLogin());
			$repUpPer->bindValue(':per_pwd', $pers->getPwd());
			$repUpPer->execute();
		}else{
			$reqUpPer="UPDATE personne set per_nom= :per_nom,per_prenom= :per_prenom,per_tel= :per_tel,per_mail= :per_mail,per_login= :per_login where per_num= :num ";
			$repUpPer= $this->db -> prepare($reqUpPer);
			$repUpPer->bindValue(':num', $pers->getNum());
			$repUpPer->bindValue(':per_nom', $pers->getNom());
			$repUpPer->bindValue(':per_prenom', $pers->getPrenom());
			$repUpPer->bindValue(':per_tel', $pers->getTel());
			$repUpPer->bindValue(':per_mail', $pers->getMail());
			$repUpPer->bindValue(':per_login', $pers->getLogin());
			$repUpPer->execute();
		}
		if(is_a ($pers ,"salarie")){
			$reqUpSal="UPDATE salarie set sal_telprof= :sal_telprof, fon_num= :fon_num where per_num= :num ";
			$repUpSal= $this->db -> prepare($reqUpSal);
			$repUpSal->bindValue(':num', $pers->getNum());
			$repUpSal->bindValue(':fon_num', $pers->getFonction()->getFonNum());
			$repUpSal->bindValue(':sal_telprof', $pers->getTelProf());
			$repUpSal->execute();
		}else{
			$reqUpEtu="UPDATE etudiant set dep_num= :dep_num, div_num= :div_num where per_num= :num ";
			$repUpEtu= $this->db -> prepare($reqUpEtu);
			$repUpEtu->bindValue(':num', $pers->getNum());
			$repUpEtu->bindValue(':dep_num', $pers->getDepartement()->getDepNum());
			$repUpEtu->bindValue(':div_num', $pers->getDivision()->getDivNum());
			$repUpEtu->execute();
		}
	}
}
