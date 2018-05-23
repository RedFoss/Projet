<?php
if(!isset($_SESSION['login'])){
  	if(!isset($_POST['connection'])){
	  	if(isset($_SESSION['err'])){
	  		if($_SESSION['err']==1)$err="login";
	  		if($_SESSION['err']==2)$err="password";
	  		if($_SESSION['err']==3)$err="captchat";
	  		?><script type="text/javascript">alert("<?php echo $err ?> incorrect");</script> <?php
	  		unset ($_SESSION['err']);
	  	}
    include 'include/form/connexion.form.php';
 }else{
 	$_SESSION['pastlog']=$_POST['per_login'];
 	$_SESSION['pastpwd']=$_POST['per_pwd'];
 	if($_POST['captchat']==$_SESSION['rep']){
	   require_once 'include/config.inc.php';
	   $db=new Mypdo();
	   $personne=new Personne($_POST);
	   $manadger=new PersonneManager($db);
	   $connection=$manadger->se_connecter($personne);
	   if($connection==0 || $connection==1){
	   		unset ($_SESSION['pastpwd']);
	   		unset ($_SESSION['pastlog']);
	   		unset ($_SESSION['rep']);
	   }
	   if($connection==2)unset ($_SESSION['pastpwd']);
	   $_SESSION['err']=$connection;
 	}
 	else $_SESSION['err']=3;
 	header("Location:index.php?page=11");
 }
}else{
	unset ($_SESSION['rep']);
	unset ($_SESSION['err']);
  header('location:index.php');
}
  ?>
