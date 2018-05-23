<?php 
if(isset($_POST['validPers']) && isset($pers))$remplace=true;
else $remplace=false;
?>
<tr>
<th>Nom* : </th>
<th><input type="text" name="per_nom" pattern="[A-Z,a-z]{1,15}" title="le nom ne peut contenir que des lettres " <?php if($remplace)echo "value='".$pers->getNom()."'"; ?> required></th>
<th>Prenom* : </th>
<th><input type="text" name="per_prenom" pattern="[A-Z,a-z]{1,15}" title="le prenom ne peut contenir que des lettres " <?php if($remplace)echo "value='".$pers->getPrenom()."'"; ?> required></th>
</tr>
<tr>
<th>téléphone* : </th>
<th><input type="tel" name="per_tel" pattern="[0-9]{10}" title="un numero est composé de 10 chiffres attachés " <?php if($remplace)echo "value='".$pers->getTel()."'"; ?> required></th>
<th>Email* : </th>
<th><input type="email" name="per_mail" <?php if($remplace)echo "value='".$pers->getMail()."'"; ?> required></th>
</tr>
<tr>
<th>Identifiant* : </th>
<th><input type="text" name="per_login" pattern="[A-Z,a-z,0-9]{1,15}" title="le login ne peut contenir que des lettres et chiffres attachés" <?php if($remplace)echo "value='".$pers->getLogin()."'"; ?> required></th>
<th>Mot de passe<?php if(!$remplace) echo '*';?> : </th>
<th><input type="password" name="per_pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="min 8 characteres dont 1 chiffre une majuscule, une minuscule " <?php if(!$remplace) echo 'required';?>></th>
</tr>