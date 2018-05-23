<?php if(isset($_SESSION['login'])){ ?>
	<h1>Ajouter une ville</h1>
	<br>
	<?php
	if(!isset($_POST['valid'])){
	include_once '/include/form/ville.form.php';
	}else{
		$verif=new VerifPattern($_POST);
		if($verif->estValide()){
			$db=new Mypdo();
			$vilmanadge=new VilleManager($db);
			if($vilmanadge->exist($_POST['vil_nom']))echo '<p><span class="information"><img src="image/ville.png" ALT="ville" >   La Ville existe deja !  <img src="image/erreur.png" ALT="erreur" ></span></p>';
			else{
				$vilmanadge->ajouterBd($_POST['vil_nom']);
				echo '<p><span class="information"><img src="image/ville.png" ALT="ville" >   La Ville a  été ajouter !   <img src="image/valid.png" ALT="ok" ></span></p>';
			}
			?>
				<br><br><p><span class="btn"><a class='acc' href="index.php">Acceuil</a> | <a class='lst' href="index.php?page=8">Liste</a></span></p>
			<?php
		}
	}
}else header('location:index.php?page=0');
?>