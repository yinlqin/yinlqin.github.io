<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
$template['title']="用户管理"
?>
<?php include '../inc/header.inc.php'?>

 
 


<form class="layui-form" action="">
  <div class="layui-form-item">
    <label class="layui-form-label">查询</label>
      <div class="layui-input-block-wlxc">
        <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入内容" class="layui-input">
      </div>
        <button  type="submit" class="layui-btn">搜索</button>
      <br>
  </div>
  
  
  <div class="layui-form-item"></div>
  <div class="layui-inline"></div>
  

</form> 


<div id="layerDemo">
      <div class="layui-btn-container">
      <button type="submit" id="yonghuguanli_add" class="layui-btn">添加用户</button>
      </div>
 
</div>


<table class="layui-G-table">
   <thead>
     <tr>
       <th>用户ID</th>
       <th>姓名</th>
       <th>性别</th>
       <th>部门</th>
       <th>工作号码</th>
       <th>个人号码</th>
       <th>密码</th>
       <th>操作</th>
     </tr>
     <?php
     $query='select * from qf_member';
     $link=connect();
     $result=execute($link,$query);
     while ($data=mysqli_fetch_assoc($result)){
       $url=urlencode("qf_jcxxgl_yonghuguanli_del.php?id={$data['id']}");//声明了一个变量，后面的是变量的地址，并且获取数据库中的指定目标，地址被加密；
$html=<<<A
    <tr>
    <td>{$data['id']}</td>
    <td>{$data['name']}</td>
    <td>{$data['sex']}</td>
    <td>{$data['bu_men']}</td>
    <td>{$data['work_phone']}</td>
    <td>{$data['phone']}</td>
    <td>{$data['password']}</td>
    <td>
    <a href='$url'>编辑
    <a href='$url'style=color:#f00>删除</td>
    </tr>
A;
        echo $html;
        }
     ?>
   </thead>
</table>
<?php include '../inc/footer.inc.php'?>

<script>
//rukudan_liebiao添加按钮
$('#yonghuguanli_add').on('click', function(){
layer.open({
    type: 2,//type为2表示为iframe层
    title: '新建',//弹出层名称
    area : ['40%' , '80%'],//宽高
    content: '../admin/qf_jcxxgl_yonghuguanli_add.php',//弹出层页面地址
    end:function()//弹出层关闭之后的操作
    {
        location.reload();//父页面的重新加载
    }
});
});
</script>
