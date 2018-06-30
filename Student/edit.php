<?php

    include('./config.php');
    include('./DB.php');
    
    // 获取用户ID
    $uid = $_GET['uid'];
    
    // 获取用户信息
    $user = (new DB('users'))->where(" uid=$uid ")->find();
    
    echo '<pre>';
    print_r($user);
    echo '</pre>';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <form action="./save.php?uid=<?=$uid?>" method="post">
            姓名: <input type="text" name='uname' value="<?=$user->uname?>" /> <br>
            性别: <input type="radio" name="sex" <?=($user->sex=='w')?'checked':'';?> value="w"  />女
                  <input type="radio" name="sex" <?=($user->sex=='m')?'checked':'';?> value="m" />男
                  <input type="radio" name="sex" <?=($user->sex=='x')?'checked':'';?> value="x" />保密  <br>
            年龄:<input type="text" name="age" value="<?=$user->age?>" /><br>
            班级: <select name="classid">
                      <option <?=($user->classid=='lamp196')?'selected':'';?> value="lamp196">lamp196</option>
                      <option <?=($user->classid=='lamp197')?'selected':'';?> value="lamp197">lamp197</option>
                      <option <?=($user->classid=='lamp199')?'selected':'';?> value="lamp199">lamp199</option>
                  </select><br>
            <input type="submit" value="提交" />
        </form>
    </body>
</html>