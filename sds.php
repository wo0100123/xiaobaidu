<?php
	/*$array=array('1','1');
	foreach($array as $k=>$v){
		$v=2;
	}
	var_dump($array);*/
/*
	$str = '123456789';

	$str = strrev($str);

	$str = chunk_split($str,2,',');

	$str = rtrim($str, ',');

	$str = strrev($str);

	echo $str;*/

/*$arr = array(
	array('id' => 0, 'name' => '123'),
	array('id' => 0, 'name' => '1234'),
	array('id' => 0, 'name' => '1235'),
	array('id' => 0, 'name' => '12356'),
	array('id' => 0, 'name' => '123abc')
);
	echo '<pre>';
	print_r(show($arr));

	function show($arr)
	{
		$nl = [];
		foreach ($arr as $key => $value) {
			$nl[$value['name']] = strlen($value['name']);
		}
		asort($nl);

		$a = 1;
		
		$drr = [];
		foreach ($nl as $k => $v) {
			$brr = [];
			$brr[]= $a++;
			$brr[]= $k;
			$drr[] = $brr;
		}
		return $drr;
	}*/

/*
	$text = "
	Apple,20,red
	Pear,10,yellow
	";
$brr =array('Fruit', 'Number', 'Color');
	echo '<pre>';
	print_r(show($text,$brr));

	function show($text,$crr)
	{
		$ptn = '/\n/';

	$text = trim($text);

	$str = preg_replace($ptn, ';', $text);

	$arr = explode(';', $str);

	// print_r($arr);
	$brr = [];
	foreach ($arr as $key => $value) {

		$brr[] = array_combine($crr, explode(',',$value));
	}

	return $brr;
	}*/

	// $url = 'http://www.baidu.com/sdfas/asdfa/sdfa.php?adf=sdf&fasd=fdsssf';

	// echo getExt($url);

	// function getExt($url)
	// {
	// 	$nl = strrpos($url,'.');
	// 	$nk = strrpos($url, '?');

	// 	$str = substr($url ,$nl, $nk-$nl);
	// 	return $str;
	// }
	
	
	/*$arr = [1,2,3,3,5,3,5,4];

	$n = array_search(3, $arr);

	print_r($n);*/
	/*$str = '<b>abc</b><b>efd</b>';
	$pattern = '/<b>(.*?)<\/b>/';
	$strr = preg_replace($pattern,'hhhh\\1',$str);

	echo $strr;
*/

	/*$A="Hello ";                 
	function print_A()              
	{
		$A = "php!";
		global $A;        
		echo $A;
	}
	echo $A;
	print_A();*/

	$a = 3;
	echo "$a",'$a',"${a}";
