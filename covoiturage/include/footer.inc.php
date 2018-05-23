
<div id="footer">
Covoiturage de l'IUT à votre service, depuis novembre 2011
<br />
    © IUT du Limousin  DUT Informatique année 2
    <?php
  if(ENV=='dev'){
     ?>
<br/><br/>
<fieldset>

  <h3>Dev:Information actuel </h3>
  			<p>
  			<?php
			if(isset($_POST)){
  				echo '<h3> $_POST </h3>';
  			foreach ($_POST as $attribut => $valeur){
  				echo $attribut.' : '.$valeur.'  | ';
  			}
			}
			if(isset($_SESSION)){
  			echo '<h3> $_SESSION </h3>';
  			foreach ($_SESSION as $attribut => $valeur){
  				switch ($attribut){
  					case 'personne':echo $attribut.'  | ';break;
  					default :echo $attribut.'  | ';break;
  				}
  			}
			}
  			/*echo '<h2> $_SERVER </h2>';
  			foreach ($_SERVER as $attribut => $valeur){
  				echo $attribut.' : '.$valeur.'  | ';
  			}*/

  			?>
</fieldset>
<?php
}
 ?>
</div>
<!--<script src="js/ajax.js"></script>-->

</body>
</html>
