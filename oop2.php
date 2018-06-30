<?php
	// class Student
	// {

	// 	public $name;
	// 	public $sex;
	// 	public $age;

	// 	function __construct($a, $b, $c)
	// 	{
	// 		$this -> name = $a;
	// 		$this -> sex  = $b;
	// 		$this -> age  = $c;
	// 	}
	// }


	// $a = new Student('黄小龙','男',18);
	// $b = new Student('刘璐璐','男',23);
	// $c = new Student('浪涛','女',16);

	// echo '<pre>';
	// print_r($a);
	class Stu
	{
		public $name;
		
		public function __construct($name = 'zhangsan')
		{
			$this -> name = $name;
		}
		public function getInfo()
		{
			echo "my name is {$this -> name }.";
		}
	}

	$s = new Stu("wangwu");
	$s -> getInfo();
	$s = new Stu();;
	$s -> getInfo();


?>