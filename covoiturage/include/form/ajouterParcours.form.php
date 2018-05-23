<?php 
$db=new Mypdo();
$ville=new VilleManager($db);
$listvil=$ville->getList();
?>
<br>
<form class="" action="#" method="post">
	<table>
		<tr>
			<th>Ville 1 : </th>
			<th>
				<SELECT name="vil_num1">
	                <?php
	                foreach ($listvil as $vil){
	                	echo '<option value="'.$vil->getVilNum().'">'.$vil->getVilNom().'</option>';
	                }
	                ?>
	         	</SELECT>
	     	</th>
			<th>Ville 2 : </th>
			<th>
	        	<SELECT name="vil_num2">
	                <?php
	                foreach ($listvil as $vil){
	                	echo '<option value="'.$vil->getVilNum().'">'.$vil->getVilNom().'</option>';
	                }
	                ?>
	          	</SELECT>
	      	</th>
	      	<th>Nombre de kilomètre(s) : </th>
			<th><input type="text" name="par_km" pattern="[1-9][0-9]{0,3}"  required></th>
	  		<th><button type="submit" name="valid">valider</button></th>
	   	</tr>
	</table>
</form>