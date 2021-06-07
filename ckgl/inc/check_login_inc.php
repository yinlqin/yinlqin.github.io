<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title><?php echo $template['title'] ?></title>
  <link rel="stylesheet" href="../css/layui.css">
</head>

<?php

if(empty($_POST['name'])){
    skip('login.php','用户名不得为空!');
}
if(empty($_POST['password'])){
    skip('login.php','密码不得为空!');
}
?>
<?php
function skip($url,$message){


$html=<<<A

<meta http-equiv="refresh" content="0.5;URL={$url}"/>

    <div class="layui-row layui-col-space15">
        <div class="layui-card">
            <div class="layui-card-header">提示信息</div>
                <div class="layui-card-body">
                    <span>{$message}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </div>
            </div>
        </div>
    </div> 
A;
echo $html;
exit;}
?>
</html>