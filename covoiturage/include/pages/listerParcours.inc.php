<?php
	require_once 'include/config.inc.php';
	$db=new Mypdo();
	$manadger=new ParcoursManager($db);
	$listePar=$manadger->getList();

?>
<h1>Liste des parcours enregistrées</h1>
<br>
<?php 
$nb=count($listePar);
if($nb==1){
	?>
	<P><span class="information">Actuellement 1  parcours est enregistrée</span></P>
	<?php
}else{
	?>
	<P><span class="information">Actuellement <?php echo $nb;?> parcours sont enregistrées</span></P>
	<?php 
}
?>
<table class="liste">
<thead>
	<tr>
		<th>Numéro</th>
		<th>Nom Ville 1</th>
		<th>Nom Ville 2</th>
		<th>Nombre de Km</th>
	</tr>
	</thead>
	<tbody>
	<?php

	foreach ($listePar as $par){
		echo '<tr><td>'.$par->getParNum().'</td>';
		echo '<td>'.$par->getVil1()->getVilNom().'</td>';
		echo '<td>'.$par->getVil2()->getVilNom().'</td>';
		echo '<td>'.$par->getParKm().'</td>'."\n";
		echo '</tr>';
	}
	?>
	</tbody>
</table>
