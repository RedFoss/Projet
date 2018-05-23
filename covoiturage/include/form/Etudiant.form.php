<?php
$db=new Mypdo();
$departement=new DepartementManager($db);
$listdep=$departement->getList();
$division=new DivisionManager($db);
$listdiv=$division->getList();
?>
<h1>Ajout d'un Etudiant</h1>
<br>
<form class="" action="#" method="post">
	<table>
		<tr>
			<th>département : </th>
			<th>
				<SELECT name="Departement">
	                <?php
	                foreach ($listdep as $dep){
	                	echo '<option value="'.$dep->getDepNum().'">'.$dep->getDepNom().'</option>';
	                }
	                ?>
	         	</SELECT>
	     	</th>
	 	</tr>
	  	<tr>
			<th>division : </th>
			<th>
	        	<SELECT name="Division">
	                <?php
	                foreach ($listdiv as $div){
	                	echo '<option value="'.$div->getDivNum().'">'.$div->getDivNom().'</option>';
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