<?php
function checkOnline($domain) {
   $curlInit = curl_init($domain);
   curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
   curl_setopt($curlInit,CURLOPT_HEADER,true);
   curl_setopt($curlInit,CURLOPT_NOBODY,true);
   curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);
   //get answer
   $response = curl_exec($curlInit);
   curl_close($curlInit);
   if ($response) return true;
   return false;
}
for($i=0;$i<=3;$i++)
{
	
if(checkOnline('http://google.com')) { echo "yes\n"; }
} 
?>