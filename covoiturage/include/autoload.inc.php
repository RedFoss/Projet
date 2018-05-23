<?php
function __autoload($classe){
	include_once'classes/'.$classe.'.class.php';
}
?>
