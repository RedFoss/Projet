<?php
require_once 'include/config.inc.php';
$db=new Mypdo();
$manadger=new VilleManager($db);
$listeVil=$manadger->getList();
?>
<h1>Liste des villes</h1>
<br>
<?php 
$nb=count($listeVil);
if($nb==1){
	?>
	<P><span class="information">Actuellement 1  ville est enregistrée</span></P>
	<?php
}else{
	?>
	<P><span class="information">Actuellement <?php echo $nb;?> villes sont enregistrées</span></P>
	<?php 
}
?>

<table class="liste">
<thead>
	<tr>
		<th>Numéro</th>
		<th>Nom</th>
	</tr>
	</thead>
	<tbody>
	<?php

	foreach ($listeVil as $vil){
		echo '<tr><td>'.$vil->getVilNum().'</td>';
		echo '<td>'.$vil->getVilNom().'</td>'."\n";
		echo '</tr>';
	}
	?>
	</tbody>
</table>
