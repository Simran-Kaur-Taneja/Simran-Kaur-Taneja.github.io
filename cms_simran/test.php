<?php

$a=password_hash('simran', PASSWORD_DEFAULT, array('cost'=>30));
echo $a;
$b=strlen($a);
echo "---------".$b;
?>