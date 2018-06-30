<?php
	// $str = '-7a123b72c9527';

	// $ptn = '/-?\d/';

	// preg_match_all($ptn , $str , $arr);

	// echo '<pre>';
	// print_r($arr);

	$html = " <img src = 'zh_CN/htmledition/images/transparent.png'
	lazysrc = 'image/a.jpg'/> <img src = 'zh_CN/htmledition/images/transparent.png'
	lazysrc = 'image/a.jpg'/> <img src = 'zh_CN/htmledition/images/transparent.png'
	lazysrc = 'image/a.jpg'/> <img src = 'zh_CN/htmledition/images/transparent.png'
	lazysrc = 'image/a.jpg'/> <img src = 'zh_CN/htmledition/images/transparent.png'
	lazysrc = 'image/a.jpg'/> ";
	

	$ptn = "/images\/(.*?)'.*?image\/(.*?)'\/>/s";

	preg_match_all($ptn, $html, $brr);

	echo '<pre>';
	print_r($brr);



?>