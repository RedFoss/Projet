<h1>Rechercher un trajet</h1><?php
	if(!isset($_POST['valid']) && !isset($_POST['date']))include_once 'include/form/rechercheTrajetDepart.form.php';
	else if(isset($_POST['valid']))include_once 'include/form/rechercheTrajetSuite.form.php';
	else{ 
		$verif=new VerifPattern($_POST);
		if($verif->estValide())include_once('/include/list/propositionPossible.list.php');
	}
?>
