<?php
	$dsn = 'mysql:host=localhost;dbname=lamp199;charset=utf8;port=3306';
	$pdo = new PDO($dsn, 'root', '');

	$sql = "delete from users where  uid = 10";
	$rows = $pdo -> exec($sql);

	var_dump($rows);

    // $dsn = 'mysql:host=localhost;dbname=lamp199;charset=utf8;port=3306';
    // $pdo = new PDO($dsn, 'root', ''); 
    
    // // 2.准备SQL语句
    // $sql = "delete from users where uid=8";
    
    // // 3.把SQL语句发送给数据库服务器,让它去执行
    // $row = $pdo -> exec($sql);   // 返回受影响行数,用来判断是否成功
    
    // var_dump($row);



?>