<?php
if(isset($_SESSION['login'])){
echo'<h1>Ajout d\'un Parcours :</h1>';
if(!isset($_POST['valid']))include 'include/form/ajouterParcours.form.php';
else{
	$db=new Mypdo();
	$parcours=new ParcoursManager($db);
	if($_POST['vil_num1']==$_POST['vil_num2'])echo'<p><span class="information"><img src="image/parcours.gif" ALT="parcours" >   destination et depart identique !  <img src="image/erreur.png" ALT="erreur" ></span></p>';
	else{
	$par=new Parcours($_POST);
	if(! $parcours->exist($par)){
		$parcours->ajouterBd($par);
		echo '<p><span class="information"><img src="image/parcours.gif" ALT="parcours" >   parcours ajouté !  <img src="image/valid.png" ALT="valid" ></span></p>';
	}else echo '<p><span class="information"><img src="image/parcours.gif" ALT="parcours" >   parcours existant !  <img src="image/erreur.png" ALT="erreur" ></span></p>';
	}
	?>
		<br><br><p><span class="btn"><a class='acc' href="index.php">Acceuil</a> | <a class='lst' href="index.php?page=6">Liste</a></span></p>
	<?php
}
}else header('location:index.php?page=0');
?>
