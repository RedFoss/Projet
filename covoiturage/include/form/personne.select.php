<?php
$db= new Mypdo();
$manadgepers=new PersonneManager($db);
$personnes=$manadgepers->getList();
?>
<form class="" action="#" method="post">
<h2>Selectionner une personne :</h2>
<SELECT name="persSelect">
	<?php
	foreach ($personnes as $per){
		echo '<option value="'.$per->getNum().'">'.$per->getNom().' '.$per->getPrenom().'</option>';
	}
	?>
</SELECT>
<input type="submit" name="validPers" value="selectionner">
</form>
