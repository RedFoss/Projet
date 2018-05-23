
<?php
if(!isset($_POST['type']) && !isset($_POST['valid'])){
include_once'include/form/personne.form.php';
}elseif(isset($_POST['type']) && !isset($_POST['valid'])) {
	$verif=new VerifPattern($_POST);
	if($verif->estValide()){
		$_SESSION['personne']= new Personne($_POST);
		$db=new Mypdo();
		$persmanadge=new PersonneManager($db);
		if(!$persmanadge->existLogin($_SESSION['personne']))$dispLogin=true;
		else $dispLogin=false;
		if(!$persmanadge->existMail($_SESSION['personne']))$dispMail=true;
		else $dispMail=false;
		if($dispLogin && $dispMail){
			$_SESSION['type']=$_POST['type'];
			if($_POST['type']=='Etudiant')include_once 'include/form/Etudiant.form.php';
	  		if($_POST['type']=='Salarie')include_once 'include/form/Salarie.form.php';
		}else{
			if(!$dispLogin && !$dispMail)echo "login indisponible et email deja utilisé !";
			else{
				if(!$dispLogin)echo '<p><span class="information"><img src="image/personne.png" ALT="personne" >   login indisponible !  <img src="image/erreur.png" ALT="erreur" ></span></p>';
				else echo '<p><span class="information"><img src="image/personne.png" ALT="personne" >   email deja utilisé !  <img src="image/erreur.png" ALT="erreur" ></span></p>';
			}
		}
		
	}else echo "<script>alert(\"info de type invalide saisie\")</script>"; 
}else{
	if($_SESSION['type']=='Etudiant'){
		$db=new Mypdo();
		$etumanadge=new EtudiantManager($db);
		$etumanadge->ajouterBd($_SESSION['personne'],$_POST['Departement'],$_POST['Division']);
	}
	if($_SESSION['type']=='Salarie'){
		$db=new Mypdo();
		$salmanadge=new SalarieManager($db);
		$salmanadge->ajouterBd($_SESSION['personne'],$_POST['sal_telprof'],$_POST['Fonction']);
	}
	echo '<p><span class="information"><img src="image/personne.png" ALT="personne" >   la personne a été ajouté !  <img src="image/valid.png" ALT="valid" ></span></p>';
	unset($_SESSION['personne']);
	unset($_SESSION['type']);
}
?>
		<br><br><p><span class="btn"><a class='acc' href="index.php">Acceuil</a> | <a class='lst' href="index.php?page=2">Liste</a></span></p>

