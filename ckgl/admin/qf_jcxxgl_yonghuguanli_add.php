<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title><?php echo $template['title'] ?></title>
  <link rel="stylesheet" href="../css/layui.css">
</head>


<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';

$template['title']="新增用户";

if(isset($_POST['submit'])){
  $link=connect();
  $query="insert into qf_member(id,name,sex,bu_men,work_phone,phone,password) values('{$_POST['id']}','{$_POST['name']}','{$_POST['sex']}','{$_POST['bu_men']}',{$_POST['work_phone']},{$_POST['phone']},md5('{$_POST['password']}'))";    
  execute($link,$query);
  // if(mysqli_affected_rows($link)==1){
// skip('qf_cx_wuliaochaxun.php','添加成功！');
// }
  // else{
//  	skip('qf_jcxxgl_wuliaoguanli.php','添加失败！');
// }
}


?>
<form method="post" class="layui-form" action="">

    <div class="layui-form-item">
        <label class="layui-form-label">用户ID</label>
        <div class="layui-input-block">
            <input type="text" name="id" lay-verify="title" autocomplete="off" placeholder="自动生成，无需填写" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">姓名</label>
        <div class="layui-input-block">
        <input type="text" name="name" lay-verify="required" lay-reqtext="请输入姓名！" placeholder="必填项，请输入" autocomplete="off" class="layui-input">
        </div>
    </div>
    
    <div class="layui-form-item">
        <label class="layui-form-label">性别</label>
        <div class="layui-input-block">
        <input type="radio" name="sex" value="男" title="男" checked="">
        <input type="radio" name="sex" value="女" title="女">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
        <label class="layui-form-label">部门</label>
        <div class="layui-input-inline">
            <select name="bu_men" lay-search="">
            <option value="仓储部">仓储部</option>
            <option value="采购部">采购部</option>
            <option value="生产部">生产部</option>
            <option value="市场部">市场部</option>
            <option value="人事行政部">人事行政部</option>
            <option value="技术研发部">技术研发部</option>
            </select>
        </div>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">工作手机号码</label>
        <div class="layui-input-block">
        <input type="text" name="work_phone" lay-verify="required" lay-reqtext="请输入手机号码！" placeholder="必填项" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">手机号码</label>
        <div class="layui-input-block">
        <input type="text" name="phone" lay-verify="required" lay-reqtext="请输入手机号码！" placeholder="必填项" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">登录密码</label>
        <div class="layui-input-block">
        <input type="password" name="password" lay-verify="title" autocomplete="off" placeholder="" class="layui-input">
        </div>
    </div>

<div class="layui-form-item">
        <div class="layui-input-block">
        <button id="b01" type="submit"  name="submit" class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
        <button type="reset" name="reset" class="layui-btn layui-btn-primary" onclick="findData()">重置</button>
        </div>
    </div>
</form>



<?php include '../inc/footer.inc.php'?>