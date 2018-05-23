
<?php if(isset($_SESSION['login'])){
	?><h1>Modification d'une personne .</h1><?php
	if(!isset($_POST['validPers']) && !isset($_POST['valmodif']))include('include/form/personne.select.php');
	 if(isset($_POST['validPers']) && !isset($_POST['valmodif']) )include('include/form/ModifierPersonne.form.php');
	if(isset($_POST['valmodif'])){
		$verif=new VerifPattern($_POST);
		if($verif->estValide()){
			$db=new Mypdo();
			$perM=new PersonneManager($db);
			if(isset($_POST['sal_telprof'])) $pers= new Salarie($_POST);	
			else $pers= new Etudiant($_POST);
			$persAfter=$perM->getPersonne($pers->getNum());
			$dispMail=true;
			$dispLogin=true;
			if($pers->getMail()!=$persAfter->getMail())$dispMail= !($perM->existMail($pers));
			if($pers->getLogin()!=$persAfter->getLogin())$dispLogin=!($perM->existLogin($pers));
			if($dispMail && $dispLogin ){
				$perM->updatePersonne($pers);
				if($pers->getNum()==$_SESSION['id'])$_SESSION['login']=$pers->getLogin();
				echo '<p><span class="information"><img src="image/personne.png" ALT="personne" >   la personne a été modifié !  <img src="image/valid.png" ALT="valid" ></span></p>';
			}else{
				if(!$dispLogin && !$dispMail)echo "login indisponible et email deja utilisé !";
				else{
					if(!$dispLogin)echo '<p><span class="information"><img src="image/personne.png" ALT="personne" >   login indisponible !  <img src="image/erreur.png" ALT="erreur" ></span></p>';
					else echo '<p><span class="information"><img src="image/personne.png" ALT="personne" >   email deja utilisé !  <img src="image/erreur.png" ALT="erreur" ></span></p>';
				}
			}
			
		}else echo "<script>alert(\"info de type invalide saisie\")</script>"; 
		
	}
	
}else header('location:index.php?page=0'); ?>
