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
<table>
	<tr>
		<th>Ville de départ :</th>
    <th><input name="depNom" type="button" id="villedep"  value="<?php echo $vil_nom ; ?>" disabled></th>
		<th>Ville d'arrivée :</th>
		<th>
		<select name="arrive">
			<?php
			$db=new Mypdo();
			$pro=new ProposeManager($db);
			$listVille=$pro->getVilleArrivePossibleList($vil_num);
			foreach ($listVille as $num =>$ville){
				echo '<option value="'.$ville.'.'.$num.'">'.$ville.'</option>';
			}
			?>
		</select>
		</th>
	</tr>
	<tr>
		<th>date de départ :</th>
		<th>
      <input name="dateButton"  type="button" id="datepicker"  value="<?php echo date('d/m/Y'); ?>" hidden >
      <input name="date"  type="text" id="dateSend" value="<?php echo date('d/m/Y'); ?>" pattern="[0-3][0-9]/[0-1][0-9]/[0-9]{4}" required>
		<th>Precision :</th>
    <th>
      <select class="" name="precision" >
        <option value="0">Ce jour</option>
        <option value="1">+/- 1 jours</option>
        <option value="2">+/- 2 jours</option>
        <option value="3">+/- 3 jours</option>
      </select>
    </th>
	</tr>
	<tr>
		<th>A partir de :</th>
    <th>
<?php $currentH=0; ?>
 <select class="" name="heure" id="heure">
   <?php
    for($i= $currentH;$i<=23;$i++){
      echo '<option value="'.$i.'">'.$i.' h</option>';
    }
    ?>
 </select>
    </th>
	</tr>
  <tr><th></th><th>
  	<button id="validation" type="submit"  name="validsuite">valider</button>
  	<button id="validationjs" type="button"  name="validsuite" onClick = "sendvalue()" hidden>valider</button>
  </th></tr>
</table>
<script src="js/rechercheTrajetSuite.form.submit.js"></script>
</form>
<?php 
 }
?>
