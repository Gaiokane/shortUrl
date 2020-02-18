<?php
$tourl = $_SERVER["QUERY_STRING"];
//echo '<br/>'.$tourl;

$preg = "/^http(s)?:\\/\\/.+/";
if(preg_match($preg,$tourl))
{
	//echo '<br/>Yes';//是http或https开头
	redirect($tourl);
}
else
{
	//echo '<br/>No';//不是http或https开头
	$genurl = 'http://'.$tourl;
	//echo '<br>'.$genurl;
	redirect($genurl);
}

function redirect($url)
{
	header('HTTP/1.1 301 Moved Permanently');
	header("Location:".$url);
	exit();
}
?>