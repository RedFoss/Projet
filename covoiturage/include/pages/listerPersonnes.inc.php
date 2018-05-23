<?php
	require_once 'include/config.inc.php';
	
	if(!isset($_GET['detail']))include_once 'include/list/personne.list.php';
	else{
		$db=new Mypdo();
		$manadger=new PersonneManager($db);
		$type=$manadger->type_pers($_GET['detail']);
		if($type =='etu'){
			$manadEtu=new EtudiantManager($db);
			$rep=$manadEtu->per_detail_etu($_GET['detail']);
			echo '<h1>Détail sur l\'étudiant '.$rep->getNom().'</h1>';
			echo '<table class="liste"><thead>'."\n".'<tr><th>Prénom</th><th>Mail</th><th>Tel</th><th>Département</th><th>Ville</th></tr></thead>'."\n";
			echo '	<tbody>
					<tr><td>'.$rep->getPrenom().'</td>
					  <td>'.$rep->getMail().'</td>
				      <td>'.$rep->getTel().'</td>
				      <td>'.$rep->getDepartement()->getDepNom().'</td>
				      <td>'.$rep->getDepartement()->getVille()->getVilNom().'</td>'."\n".'</tbody>';
			echo '</table>'."\n";
		}
		if($type =='sal'){
			$manadSal=new SalarieManager($db);
			$rep=$manadSal->per_detail_sal($_GET['detail']);
			echo '<h1>Détail sur le salarié '.$rep->getNom().'</h1>';
			echo '<table class="liste"><thead>'."\n".'<tr><th>Prénom</th><th>Mail</th><th>Tel</th><th>Tel Pro</th><th>Fonction</th></tr></thead>'."\n";
			echo '	<tbody>
					<tr><td>'.$rep->getPrenom().'</td>
				      <td>'.$rep->getMail().'</td>
				      <td>'.$rep->getTel().'</td>
				      <td>'.$rep->getTelProf().'</td>
					  <td>'.$rep->getFonction()->getFonLib().'</td>'."\n".'</tr></tbody>';
			echo '</table>'."\n";
		}
		if($type =='err') echo "<h1>/!\ probleme de  type de personne ou de bdd /!\ </h1>";
		echo '<a href="index.php?page=2">Retour Liste</a>';

	}
?>
