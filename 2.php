<?php
	class A
	{
		public $name = '张三';

		public function say()
		{
			echo  '叫我'.$this -> name ,'<br>';
		}
	}

	class B extends A 
	{
		public function  say()
		{
			echo  '我有我的态度'.'<br>';
			parent::say();
		}

		public  function  listen ()
		{
			echo '我爱水哥讲话<br>';
			parent::say();
		}
	}

	(new B) -> say();
	(new B) -> listen();



?>