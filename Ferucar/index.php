<!DOCTYPE html>
<html lang="fr">
<head>
      <?php  include"include/entete.php";?>
</head>
<body>
   <nav class="navbar navbar-custom navbar-custom">
        <div class="container-fluid">
            <div class="navbar-header" id="menu"><!--Menu-->
                <?php include "include/menu.php";?>
            </div>
        </div>
    </nav>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 col-xs-2 sidenav">
            <!--p><a href="#">Link</a></p>
            <p><a href="#">Link</a></p>
            <p><a href="#">Link</a></p-->
            </div>
            <div class="col-md-8">
                <div id ="navigation">
                    <?php if(isset($_GET['page']))
                              { include "page/".$_GET['page'];}
                           else{
                                include "include/accueil.php"; } ?>
                </div>
                 <div class="col-sm-2 col-xs-2 sidenav" id="footer" style="color:green;">
                     <?php include"include/pied.php" ?>
                </div>
            </div>
      </div>
    </div>

</body>
</html>