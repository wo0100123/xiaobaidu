<?php

    include('./config.php');
    include('./DB.php');
    
    // 获取用户ID
    $uid = $_GET['uid'];
    
    // 执行修改
    $row = (new DB('users'))->where(" uid=$uid ")->update($_POST);
    
    // 判断
    if ($row) {
        echo '修改成功';
        header('refresh:2;url=./index.php');
    } else {
        echo '修改失败';
        header('refresh:2;url=./edit.php?uid='.$uid);
    }
    
    die;