<?php

	$dir = './Student/';

	mydir($dir);

	function mydir($dir)
	{
		$dir = rtrim($dir, '/').'/';
		$hd = opendir($dir);
		while ($rd = readdir($hd)) {
			if ($rd == "." || $rd == "..") {
				continue;
			}
			if (is_dir($dir.$rd)) {
				mydir($dir.$rd);
			}
			echo $rd.'<br>';
		}
		closedir($hd);
	}

	$str = substr_replace('ABC', 'DEF', 3,1);
	echo $str;


?>