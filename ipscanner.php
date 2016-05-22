<?php
$ip = $_POST["ip"];
$b1 = $_POST["b1"];
$b2 = $_POST["b2"];
$from = $_POST["from"];
$to = $_POST["to"];
function checkOnline($ip) {
   $curlInit = curl_init($ip);
   curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,3);
   curl_setopt($curlInit,CURLOPT_HEADER,true);
   curl_setopt($curlInit,CURLOPT_NOBODY,true);
   curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);
   //get answer
   $response = curl_exec($curlInit);
   curl_close($curlInit);
   if ($response) return true;
   return false;
}
$iph = $ip;
$on = '<span style="color: green;">online</span>';
$off = '<span style="color: red;">offline</span>';
for($i=$b1;$i<=$b2;i++)
{
for($j=$from;$j<=$to;$j++)
{
   $ip = $iph;
   	
   if(checkOnline($ip = $ip. "." . $i . "." . $j)) 
	{ 
		echo nl2br("\n");
		echo "<a href='http://".$ip."' target='_blank' >" .$ip . "\n </a>" . $on; 
		echo nl2br("\n");
    }else{
    	echo nl2br("\n");
    	echo $ip . "\n" . $off; 
    	echo nl2br("\n");
    }
} 
}
?>