<?php

	$dir = './uploads/';

	$hd = opendir($dir);

	$arr_f = [];
	while (($f = readdir($hd)) !== false) {
		if($f == '.' || $f == '..'){
			continue;
		
		}
		$arr_f[] = $f;
		echo $f.'<br>';
	}
	closedir($hd);
	echo '<pre>';
	print_r($arr_f);
	echo  '</pre>';
echo '<hr>'; 
	const DSN = 'mysql:host=localhost;dbname=myshop;charset=utf8;port=3306';
	const USER = 'root';
	const UPWD = '';
	
	include('./DB.php');
	$arr_pic = [];
	$goods = (new DB('shop_goods')) -> select();
	foreach ($goods as $key => $value) {
		echo $value->gpic.'<br>';
		$arr_pic[] = $value->gpic;
		$arr_pic[] = 'sm_'.$value->gpic;
	}
	echo '<pre>';
	print_r($arr_pic);
	echo  '</pre>';
		


?>