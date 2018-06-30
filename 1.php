<?php
	 function __autoload($clsName)
	{
		$dir = ['./Model/', './Student/'];

		$fileName = $clsName.'.php';

		foreach ($dir as $key => $value) {
			if (file_exists($value.$fileName)) {
				include($value.$fileName);
				return;
			}
		}
		die('找不到类文件'.$fileName);
	}

	const USER = 'root';
	const UPWD = '';
	const DSN = 'mysql:host=localhost;dbname=lamp199;charset=utf8;port=3306';

	$db = new DB('users');

	$db -> orderBy(" age ");

	$users = $db -> where(" sex = 'w' ")->select();

	echo '<pre>';
	print_r($users);


?>