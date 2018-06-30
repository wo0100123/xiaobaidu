<?php
	class Student
	{
		public $name;
		public $sex;
		public $age;

		function Say()
		{
			echo $this->name.'是一个'.$this->sex.'的, '.'年龄是:'.$this->age.' 这是Student 中的成员方法!','<br>';
		}
	}

	$stu1 = new Student;
	$stu1 -> name = '浪涛';
	$stu1 -> sex = '女';
	$stu1 -> age = 20;
	$stu1 -> say();
    
    $stu2 = new student;
    $stu2 -> name = '李璐';
    $stu2 -> sex = '男';
    $stu2 -> age = 21;
    $stu2 -> say();


?>