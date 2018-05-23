<h1>Ajouter une personne</h1>
<form class="" action="#" method="post">
<table>
<?php include('include/form/Personne.base.form.php')?>
<tr><td><br></td></tr>
<tr>
<th>   </th>
<th>Catégorie* : </th>
<th>
<input type="radio" name="type" value="Etudiant" required>Etudiant
<input type="radio" name="type" value="Salarie" required>Salarie
</th>
</tr>
<tr><td><br></td></tr>
<tr>
<th>  </th><th>  </th>
<th><input type="submit" name="val" value="valider"></th>
</tr>
</table>
<p><i>les champs precedés d'une etoile(*) sont obligatoires</i></p>
</form>
