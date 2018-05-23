<?php
	$departTab=explode('.',$_POST['depart']);
	$departNom=$departTab[0];
	$depart=$departTab[1];
	$arriveTab=explode('.',$_POST['arrive']);
	$arriveNom=$arriveTab[0];
	$arrive=$arriveTab[1];
	$precision=$_POST['precision'];
	$heure=$_POST['heure'];
	$date=$_POST['date'];
	$db=new Mypdo();
	$ProManadge=new ProposeManager($db);
	$listePro=$ProManadge->getListPropositionOK($depart, $arrive, $date, $precision, $heure);
	if($nb=count($listePro)){
		?>
<h1>Liste des propositions correspondantes</h1>
<br>
<?php 
if($nb==1){
	?>
	<P><span class="information">Actuellement 1 proposition  est disponible</span></P>
	<?php
}else{
	?>
	<P><span class="information">Actuellement <?php echo $nb;?> propositions  sont disponibles</span></P>
	<?php 
}
?>
<table class="liste">
	<thead>
	<tr>
		<th>Ville depart</th>
		<th>Ville arrive</th>
		<th>Date depart</th>
		<th>Heure depart</th>
		<th>Nombre de place(s)</th>
		<th>Nom du covoitureur</th>
		<!--  <th>avis</th>-->
	</tr>
	</thead>
	<tbody>
	<?php
	$avisM=new AvisManager($db);
	foreach ($listePro as $pro){
		$num=$pro->getPersonne()->getNum();
		$bulle='Moyenne : '.$avisM->getMoyAvisPers($num).' ,dernier avis :'.$avisM->getLastAvisPers($num);
		echo '<td>'.$departNom.'</td>';
		echo '<td>'.$arriveNom.'</td>';
		echo '<td>'.$pro->getProDate().'</td>';
		echo '<td>'.$pro->getProTime().'</td>';
		echo '<td>'.$pro->getProPlace().'</td>';
		echo '<td><a class="picto-item" aria-label="'.$bulle.'">'.$pro->getPersonne()->getNom().' '.$pro->getPersonne()->getPrenom().'</a></td>'."\n";
		echo '</tr>';
	}
	?>
	</tbody>
</table>
		<?php
		
}else{
	echo '<p><span class="information"><img src="image/trajet.png" ALT="personne" >   aucune propositions correspondantes  <img src="image/erreur.png" ALT="valid" ></span></p>';
}
