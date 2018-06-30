<?php
    /*
      命名空间
      作用: 解决类,函数,常量的名称相同的问题
      
      注意:
      命名空间之前不能有输出, <?php 前不能有空格, 文件格式最好是utf-8无BOM
      
      使用系统类时,或者不带命名空间的类时, 应该  new \类名
      
    */
    // echo '';
namespace aaa;    
    class Student
    {
        public function say()
        {
            echo 'aaa空间下的<br>';
        }
        
    }
namespace aaa\bbb;
    class Student
    {
        public function say()
        {
            echo 'aaa\bbb空间下的<br>';
        }
    }    

namespace xxx;   

use aaa\bbb\Student;   // 使用 aaa\bbb\空间下的 Student 类   之后的代码中  new Student 就是使用 aaa\bbb 空间下的
use aaa\Student as aaaStudent;

    class Student
    {
        public function say()
        {
            echo 'xxx空间下的<br>';
        }
    }
    
    (new aaaStudent)->say();die;
    // (new Student) -> say();      // 默认    xxx 空间下
    // (new \aaa\Student) -> say();  //  命名空间必须  new \空间\类名称
    (new \aaa\bbb\Student) -> say();
  
    
    $dsn = 'mysql:host=localhost;dbname=lamp196;charset=utf8;port=3306';
    new \PDO($dsn, 'root', '');
    
    
    
    