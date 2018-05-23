<?php
$db=new Mypdo();
$fonction=new FonctionManager($db);
$listfon=$fonction->getList();
?>
<h1>Ajout d'un Salarié</h1>
<br>
<form class="" action="#" method="post">
	<table>
		<tr>
			<th>Téléphone professionnel : </th>
			<th><input type="tel" name="sal_telprof" pattern="[0-9]{10}" title="un numero est composé de 10 chiffres attachés " required></th>
	 	</tr>
	  	<tr>
			<th>Fonction :</th>
			<th>
	        	<SELECT name="Fonction">
	                <?php
	                foreach ($listfon as $fon){
	                	echo '<option value="'.$fon->getFonNum().'">'.$fon->getFonLib().'</option>';
	                }
	                ?>
	          	</SELECT>
	      	</th>
	  	</tr>
	   	<tr>
	   		<th><button type="submit" name="valid">valider</button></th>
	   	</tr>
	</table>
</form>
