<?php
$geturl = $_SERVER["QUERY_STRING"];
echo '原网址：'.$geturl;
echo '<br>短网址：'.shorturl($geturl);

//生成短网址 
function code62($x)
{
	$show='';
	while($x>0)
	{
		$s=$x % 62;
		if ($s>35)
		{
			$s=chr($s+61);
		}
		elseif($s>9&&$s<=35)
		{
			$s=chr($s+55);
		}
		$show.=$s;
		$x=floor($x/62);
	}
	return $show; 
}
function shorturl($url)
{
	$url=crc32($url);
	$result=sprintf("%u",$url);
	return code62($result);
}
?>