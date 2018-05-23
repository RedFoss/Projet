<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="js/dateCalender.jquery.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<?php
if(isset($_POST['ville'])){
	$ville=explode('.',$_POST['ville']);
	$vil_num=$ville[1];
	$vil_nom=$ville[0];
	?>
<form name="info" class="" action="#" method="post">
  <input type="hidden" name="depart" value="<?php echo $_POST['ville'];?>">
  <input type="hidden" name="per_num" value="<?php echo $_SESSION['id'];?>">
<table>
	<tr>
		<th>Ville de départ :</th>
    <th><input name="depNom" type="button" id="villedep"  value="<?php echo $vil_nom ; ?>" disabled></th>
		<th>Ville d'arrivée :</th>
		<th>
		<select name="parcours">
			<?php
			$db=new Mypdo();
			$pro=new ParcoursManager($db);
			$listVille=$pro->getSecondeVillesParcours($vil_num);
			foreach ($listVille as $num =>$ville){
				echo '<option value="'.$num.'">'.$ville.'</option>';
			}
			?>
		</select>
		</th>
	</tr>
	<tr>
		<th>date :</th>
		<th>
      <input name="dateButton"  type="button" id="datepicker"  value="<?php echo date('d/m/Y'); ?>" hidden >
      <input name="pro_date"  type="text" id="dateSend" value="<?php echo date('d/m/Y'); ?>" pattern="[0-3][0-9]/[0-1][0-9]/[0-9]{4}" required>
		<th>horaire :</th>
    <th>
 <input type="time" name="pro_time" id="heure" value="<?php echo date('H:i:s',strtotime("+1 hour",time()));?>" pattern="[0-2][0-9]:[0-5][0-9]:[0-5][0-9]" title="un horaire au format hh:mm:ss" required>
    </th>
	</tr>
  <tr>
  <th></th><th>nombre places :</th>
  <th>
  <input name="pro_place" type="text" pattern="[1-5]" value="1" title="un chiffre entre 1 et 5" required >
 </th>
 <tr></tr>
 <tr>
  <th></th><th>
  	<button id="validation" type="submit"  name="validsuite">valider</button>
  	<button id="validationjs" type="button"  name="validsuite" onClick = "sendvalue()" hidden>valider</button>
  </th></tr>
</table>
<script src="js/rechercheTrajetSuite.form.submit.js"></script>
</form>
<?php 
 }
?>
