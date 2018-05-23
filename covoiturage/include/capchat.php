<?php
$min=1;
$max=9;
$na=rand ( $min , $max );
$nb=rand ( $min , $max );
$s=rand ( 0 , 2 );
$symb = array ('x', '+', '-');
if($s==0)$_SESSION['rep']=$na*$nb;
if($s==1)$_SESSION['rep']=$na+$nb;
if($s==2)$_SESSION['rep']=$na-$nb;
?>
<td>
<p id="capchat">
<img src="image/nb/<?php echo $na ?>.jpg" alt="valeur 1" />
<span class="cEnter"><?php echo $symb[$s] ?></span>
<img src="image/nb/<?php echo $nb ?>.jpg" alt="valeur 2" /><span class="cEnter">=</span>
</p>
</td>
<td>
	 <input type="number" alt="capchat" name="captchat">
</td>