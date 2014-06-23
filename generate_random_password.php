<?php
function genPwd($length=6) {
   $password = '';
   $possible = '23456789bcdfghjkmnpqrstvwxyz';
   $i = 0;
   while ($i < $length) {
 
      $password .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
      $i++;
   }
 
   return $password;
}
echo genPwd(7);
?>
