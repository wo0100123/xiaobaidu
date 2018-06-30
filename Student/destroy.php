<?php

    include('./config.php');
    include('./DB.php');
    
    // 获取用户ID
    $uid = $_GET['uid'];
    
    // 执行删除
    $row = (new DB('users'))->where(" uid=$uid ")->delete();
    
    // 判断
    if ($row) {
        echo '删除成功';
    } else {
        echo '删除失败';
    }
    header('refresh:2;url=./index.php');
    die;
    