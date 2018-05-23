<!DOCTYPE html>
<html lang="en">
 <head>
    <?php include("include/entete.php"); ?>
 </head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>Appli Niveau Conduite</h1>
  <p></p> 
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
 <?php include("include/menu.php");?>
</nav>

<div class="container" style="margin-top:30px">
  <?php if(isset($_GET['page']))
                              { include "pages/".$_GET['pages'];}
                           else{
                                include "pages/accueil.php"; } ?>
  
</div>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
  <?php include("include/pied.php"); ?> 
</div>

</body>
</html>
