<?php
	$x=1; 
	++$x;
	$y = $x++;
	echo $y;


	$a= "hello"; 
		$b= &$a;
		unset($b);
		$b= "world";
		echo $a;


	$x="";
	$result=is_null($x);
	echo "$result";
	var_dump($result);

	interface Hero
	{
		public function q();
		public function w();
		public function e();
		public function r();
	}

	class XXOO implements Hero 
	{
		public function q()
		{
			echo '沉默';
		}
	}


	class Player
	{
		public $role;
		public function __construct(Hero $obj)
		{
			$this -> role = $obj;
		}

		public function __call($name, $params)
		{
			$this -> role -> $name(...$params);
		}
	}
?>