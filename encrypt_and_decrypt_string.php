<?php 
// String EnCrypt + DeCrypt function 
// Author: halojoy, July 2006 
function convert($str,$ky=''){ 
if($ky=='')return $str; 
$ky=str_replace(chr(32),'',$ky); 
if(strlen($ky)<8)exit('key error'); 
$kl=strlen($ky)<32?strlen($ky):32; 
$k=array();for($i=0;$i<$kl;$i++){ 
$k[$i]=ord($ky{$i})&0x1F;} 
$j=0;for($i=0;$i<strlen($str);$i++){ 
$e=ord($str{$i}); 
$str{$i}=$e&0xE0?chr($e^$k[$j]):chr($e); 
$j++;$j=$j==$kl?0:$j;} 
return $str; 
} 
/////////////////////////////////// 

// Secret key to encrypt/decrypt with 
$key='mysecretkey'; // 8-32 characters without spaces 

// String to encrypt 
$string1='Hello This is Rishabh Agrawal'; 

// EnCrypt string 
$string2=convert($string1,$key); 

// DeCrypt back 
$string3=convert($string2,$key);

echo "Encrypt String : ".$string2;
echo "<br>";
echo "Decrypt String : ".$string3;
?>