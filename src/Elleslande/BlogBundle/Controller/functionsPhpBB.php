<?php

function BBcodeToHtml($str)
{
	$str=preg_replace('#\[b:[^\]]*\]#','<span class="bold">',$str);
	$str=preg_replace('#\[/b:[^\]]*\]#','</span>',$str);
	$str=preg_replace('#\[i:[^\]]*\]#','<span class="italic">',$str);
	$str=preg_replace('#\[/i:[^\]]*\]#','</span>',$str);
	$str=preg_replace('#\[u:[^\]]*\]#','<span class="underline">',$str);
	$str=preg_replace('#\[/u:[^\]]*\]#','</span>',$str);
	$str=preg_replace('#\[color=([^:]*):[^\]]*\]#',"<span style=\"color:$1;\">",$str);
	$str=preg_replace('#\[/color:[^\]]*\]#','</span>',$str);
	$str=preg_replace('#\[size=([0-9]*):[^\]]*\]#',"<span class=\"taille$1\">",$str);
	$str=preg_replace('#\[/size:[^\]]*\]#','</span>',$str);
	$str=preg_replace('#\[url=([^:]*):[^\]]*\]#',"<a href=\"$1\">",$str);
	$str=preg_replace('#\[/url:[^\]]*\]#','</a>',$str);
	$str=preg_replace('#\[list[^\]]*\]#',"<ul>",$str);
	$str=preg_replace('#\[/list[^\]]*\]#','</ul>',$str);
	$str=preg_replace('#\[\*:[^\]]*\]#',"<li>",$str);
	$str=preg_replace('#\[/\*:[^\]]*\]#','</li>',$str);
	$str=preg_replace('#\[img:[^\]]*\]([^\[]*)\[/img[^\]]*\]#',"<img src=\"$1\" />",$str);
	return $str;
}

?>
