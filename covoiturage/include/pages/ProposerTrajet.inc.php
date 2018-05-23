<?php
if(isset($_SESSION['login'])){
	?><h1>Proposer un trajet</h1><?php
	if(!isset($_POST['valid']) && !isset($_POST['pro_date']))include_once 'include/form/departProposition.form.php';
	else if(isset($_POST['valid']))include_once 'include/form/suiteProposition.form.php';
	else{ 
		$verif=new VerifPattern($_POST);
		if($verif->estValide()){
			$propose=new Propose($_POST);
			$parcours=$_POST['parcours'];
			
			$pro_date=explode('/',$_POST['pro_date']);
			$temps=explode(':', $_POST['pro_time']);
			$time=$pro_date[2].$pro_date[1].$pro_date[0].$temps[0].$temps[1].$temps[2];
			$current=date('Y').date('m').date('d').date('H').date('i').date('s');
			if($temps[0]<=23 && $temps[1]<=59 && $temps[2]<=59){
				if($time>$current){
				$parcours=explode('.',$parcours);
				$par_num=$parcours[0];
				$pro_sens=$parcours[1];
				
				//changement format date
				$bdDate=$pro_date[2].'-'.$pro_date[1].'-'.$pro_date[0];
				$propose->setProDate($bdDate);
				
				$propose->setParcours($par_num);
				$propose->setProSens($pro_sens);
				$db=new Mypdo();
				$proM=new ProposeManager($db);
				$proM->ajouterBd($propose);
				?><p><span class="information"><img src="image/trajet.png" ALT="propose" >  proposition ajouté !  <img src="image/valid.png" ALT="valid" ></span></p><?php
				}else{
					?><p><span class="information"><img src="image/trajet.png" ALT="propose" >  date et heure deja passé !  <img src="image/erreur.png" ALT="erreur" ></span></p><?php 
				}
			}else{
				?><p><span class="information"><img src="image/trajet.png" ALT="propose" >   heure invalide !  <img src="image/erreur.png" ALT="erreur" ></span></p><?php
			}
		}
	}
}else header('location:index.php?page=0');
?>
