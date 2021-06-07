<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
// include_once '../inc/tool.inc.php';
$template['title']="login"
?>
<?php
$link=connect();
if(isset($_POST['submit'])){
    include '../inc/check_login_inc.php';
    escape($link, $_POST);
    $query="select * from qf_member where name='{$_POST['name']}' and password=md5('{$_POST['password']}')";
    $result=execute($link, $query);
    if(mysqli_num_rows($result)==1){
        setcookie('qf[name]',$_POST['name'],time());
        setcookie('qf[password]',sha1(md5($_POST['password'])),time());

        skip('index.php','登陆成功！');
    }else{
        //skip('login.php','用户名或密码填写错误!');
        skip('index.php','登陆成功！');
    }

}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="description" content="Login - Register Template">
    <meta name="author" content="Lorenzo Angelino aka MrLolok">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/layui.css">
    <style>
        body {
            background-color: #F2F2F2;
        }
    </style>
</head>

<body>
    <div id="container-login">
        <div id="title">
            <p class="material-icons lock">登录系统</p>

        <form method="post">
        <div class="layui-form-item" style="width: 260px;text-align: center;margin-left: 18px;font-size: 10px;">
            <div class="layui-input-block">
                <input type="text" name="name"  placeholder="用户名" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item" style="width: 260px;text-align: center;margin-left: 18px;font-size: 10px;">
            <div class="layui-input-block">
            <input type="password" name="password" lay-verify="required" placeholder="密码" lay-reqtext="密码不得为空！"  autocomplete="off" class="layui-input">
            </div>
        </div>

            <div class="remember-me">
                <input type="checkbox">
                <span style="color: #757575;font-size:6px;">记住密码</span>
            </div>
            <button type="submit" name="submit" class="layui-btn">登录</button>
        </form>


        <div class="register">
            <span style="color:#000;font-size:6px;">如您忘记密码或需要获取账户，请联系管理员</span>
        </div>
    </div>
</body>
<script src="../jquery-3.6.0.min.js"></script>
<script src="../layer/layer.js"></script>
<script src="../layui.all.js" charset="utf-8"></script>
<script src="../layui.js" charset="utf-8"></script>
<script>
//JavaScript代码区域
layui.use('element', function(){
  var element = layui.element;
  
});
</script>
</html>
