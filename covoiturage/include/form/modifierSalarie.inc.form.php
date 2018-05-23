<?php
if(isset($db) && isset($pers)){
$fonction=new FonctionManager($db);
$listfon=$fonction->getList();
?>
<tr>
	<th>Téléphone professionnel : </th>
	<th><input type="tel" name="sal_telprof" pattern="[0-9]{10}" title="un numero est composé de 10 chiffres attachés " value="<?php echo $pers->getTelProf();?>" required></th>
	<th>Fonction : </th>
	<th>
	   <SELECT name="fon_num">
	         <?php
	            foreach ($listfon as $fon){
	            	if($pers->getFonction()->getFonNum()==$fon->getFonNum())$selected=' selected="selected" style="color:#1384E6;" ';
	            	else $selected='';
	                echo '<option '.$selected.' value="'.$fon->getFonNum().'">'.$fon->getFonLib().'</option>';
	            }
	         ?>
	   </SELECT>
	</th>
</tr>
<?php } ?>