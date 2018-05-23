<?php
if(isset($db) && isset($pers)){
$departement=new DepartementManager($db);
$listdep=$departement->getList();
$division=new DivisionManager($db);
$listdiv=$division->getList();
?>
<tr>
	<th>département : </th>
	<th>
		<SELECT name="dep_num">
			<?php
			foreach ($listdep as $dep){
				if($pers->getDepartement()->getDepNum()==$dep->getDepNum())$selected=' selected="selected" style="color:#1384E6;" ';
				else $selected='';
				echo '<option '.$selected.' value="'.$dep->getDepNum().'">'.$dep->getDepNom().'</option>';
			}
			?>
		</SELECT>
	</th>
	<th>division : </th>
	<th>
		<SELECT name="div_num">
			<?php
			foreach ($listdiv as $div){
				if($pers->getDivision()->getDivNum()==$div->getDivNum())$selected=' selected="selected" style="color:#1384E6;" ';
				else $selected='';
				echo '<option '.$selected.' value="'.$div->getDivNum().'">'.$div->getDivNom().'</option>';
			}
			?>
		</SELECT>
	</th>
</tr>
<?php }?>