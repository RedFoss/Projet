<?php 
$db=new Mypdo();
$permanadger=new PersonneManager($db);
if($permanadger->type_pers($_POST['persSelect'])=='etu'){
	$manadger=new EtudiantManager($db);
	$pers=$manadger->per_detail_etu($_POST['persSelect']);
	$type='etudiant';
}
else{
	$manadger=new SalarieManager($db);
	$pers=$manadger->per_detail_sal($_POST['persSelect']);
	$type='salarié';
}
?>
<form class="" action="#" method="post">
<input type="hidden" name="per_num" value="<?php echo $_POST['persSelect'];?>" required>
<table>
<?php include('include/form/Personne.base.form.php')?>
<tr><td><br></td></tr>
<tr>
<th>   </th>
<th>Catégorie : </th>
<th><?php echo $type; ?></th>
</tr>
<tr><td><br></td></tr>
<?php 
if($type=='etudiant')include('include/form/modifierEtudiant.inc.form.php');
else include('include/form/modifierSalarie.inc.form.php');
?>
<tr>
<th>  </th><th>  </th>
<th><input type="submit" name="valmodif" value="valider"></th>
</tr>
</table>
<p><i>les champs precedés d'une etoile(*) sont obligatoires</i></p>
<p><i>le mots de passe ne seras pas  changé si non renseigné</i></p>
</form>
