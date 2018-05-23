<?php 
$db=new Mypdo();
$propose=new ProposeManager($db);
$listVilledep=$propose->getVilledepList();
?>
<br>
<form class="" action="#" method="post">
<table>
<tr>
<th>Ville de départ : </th>
<th>
<SELECT name="ville">
<?php
foreach ($listVilledep as $vil_num => $vil_nom){
	echo '<option value="'.$vil_nom.'.'.$vil_num.'">'.$vil_nom.'</option>';
}
?>
	         	</SELECT>
	     	</th>
	   		<th><button type="submit" name="valid">valider</button></th>
	   	</tr>
	</table>
</form>