<?php 
if(isset($_SESSION['pastlog']))$defaultlog=$_SESSION['pastlog'];
if(isset($_SESSION['pastpwd']))$defaultpwd=$_SESSION['pastpwd'];
?>
<h1>Pour vous connecter</h1>
<form class="" action="#" method="post">
<table>
<tr>
<td>Login</td>
<td><input type="text" id="login"  name="per_login" value="<?php if(isset($defaultlog))echo $defaultlog?>" placeholder="identifiant" required="required"/></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" id="pwd"  name="per_pwd" value="<?php if(isset($defaultpwd))echo $defaultpwd?>" required="required"/></td>
</tr>
<tr>
<?php include_once 'include/capchat.php';?>
</tr>
</table>
 <input type="submit" name="connection" value="connection">
</form>