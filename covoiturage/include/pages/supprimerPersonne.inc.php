<?php
if(isset($_SESSION['login'])){
	?><h1>Suppression d'une personne .</h1><?php
	if(!isset($_POST['validPers']))include('include/form/personne.select.php');
	else{
		$PersM =new PersonneManager(new Mypdo());
		if($PersM->deletePersonne($_POST['persSelect'])){
			if($_POST['persSelect']==$_SESSION['id']){
				session_destroy();
				echo '<p><span class="information"><img src="image/personne.png" ALT="personne" >   votre compte a été supprimé ! vous êtes déconnecté ! <img src="image/valid.png" ALT="valid" ></span></p>';
			}else{
				echo '<p><span class="information"><img src="image/personne.png" ALT="personne" >   la personne a été supprimé !  <img src="image/valid.png" ALT="valid" ></span></p>';
			}
		}else echo '<p><span class="information"><img src="image/personne.png" ALT="personne" >  erreur bdd !  <img src="image/erreur.png" ALT="erreur" ></span></p>';	
	}
}else header('location:index.php?page=0');
