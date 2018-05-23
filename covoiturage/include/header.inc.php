<?php session_start(); require_once 'include/config.inc.php';?>
<!DOCTYPE html>
<html lang="fr">
<head>

  <meta charset="utf-8">

<?php
		$title = "Bienvenue sur le site de covoiturage de l'IUT.";?>
		<title>
		<?php echo $title ?>
		</title>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
		<link rel="stylesheet" type="text/css" href="css/liste.css" />
</head>
	<body>
	<div id="header">
		<div id="entete">
			<div class="colonne">
				<a href="index.php?page=0">
					<img src="image/logo.png" alt="Logo covoiturage IUT" title="Logo covoiturage IUT Limousin" />
				</a>
			</div>
			<div class="colonne">
				Covoiturage de l'IUT,<br />Partagez plus que votre véhicule !!!
			</div>
			</div>
			<div id="connect">
				<?php
		        if(isset($_SESSION['login'])){
		          ?><a href="index.php?page=12">utilisateur : <b><?php echo $_SESSION['login']?></b> déconnexion</a><?php
		        }else{
		        	?><a href="index.php?page=11">connexion</a><?php
		        }
         ?>


				
			</div>
	</div>
