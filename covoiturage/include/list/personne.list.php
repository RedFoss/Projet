<?php
$db=new Mypdo();
$manadger=new PersonneManager($db);
$listePer=$manadger->getList();
?>
<h1>Liste des personnes enregistrées</h1>
<br>
<?php 
$nb=count($listePer);
if($nb==1){
	?>
	<P><span class="information">Actuellement 1  personne est enregistrée</span></P>
	<?php
}else{
	?>
	<P><span class="information">Actuellement <?php echo $nb;?> personnes sont enregistrées</span></P>
	<?php 
}
?>
<table class="liste">
	<thead>
	<tr>
		<th>Numéro</th>
		<th>Nom</th>
		<th>Prenom</th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($listePer as $per){
		echo '<tr><td><a href="index.php?page=2&detail='.$per->getNum().'">'.$per->getNum().'</a></td>';
		echo '<td>'.$per->getNom().'</td>';
		echo '<td>'.$per->getPrenom().'</td>'."\n";
		echo '</tr>';
	}
	?>
	</tbody>
</table>