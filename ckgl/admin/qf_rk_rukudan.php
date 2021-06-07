<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
$link=connect();
$query='select * from qf_rk_rukudan';
$result=execute($link,$query);
$template['title']="入库管理"
?>
<?php include '../inc/header.inc.php'?>

 
 


<form class="layui-form" action="">
  <div class="layui-form-item">
    <label class="layui-form-label">入库类型选择</label>
    <div class="layui-input-block" style="width: 300px;">
      <input type="radio" name="ruku_leixing" value="采购入库" title="采购入库" checked="">
      <input type="radio" name="ruku_leixing" value="退料入库 " title="退料入库">
    </div>
  </div>  

  <div class="layui-form-item">
    <label class="layui-form-label">查询</label>
    <div class="layui-input-block-wlxc">
      <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入内容" class="layui-input">
    </div>
    <div class="layui-inline">
      <label class="layui-form-label">日期范围</label>
      <div class="layui-input-inline-wlxc">
        <input type="text" class="layui-input" id="test6" placeholder=" - ">
      </div>
    </div>
        <button  type="submit" class="layui-btn">搜索</button>
      <br>
  </div>
  
  
  <div class="layui-form-item">
    </div>
    <div class="layui-inline">
    </div>
  

</form> 

<div id="layerDemo">
      <div class="layui-btn-container">
      <button type="submit" id="rukuguanli_xinjian" class="layui-btn">新建入库单</button>
      </div>
</div>


 <table class="layui-G-table">
   <thead>
     <tr>
       <th>入库单号</th>
       <th>日期</th>
       <th>仓库</th>
       <th>入库类型</th>
       <th>总数量</th>
       <th>备注</th>
       <th>经办人</th>
       <th>操作</th>
     </tr>
     <?php
     $query='select * from qf_rk_rukudan';
     $result=execute($link,$query);
     while ($data=mysqli_fetch_assoc($result)){
       $url=urlencode("qf_rk_rukudan_del.php?id={$data['ru_id']}");//声明了一个变量，后面的是变量的地址，并且获取数据库中的指定目标，地址被加密；
       $return_url=urlencode($_SERVER['REQUEST_URI']);//声明了一个变量，作用是返回原页面，连接到php全局变量$_SERVER中的REQUEST_URL变量中，REQUEST_URL被赋值为当前页面地址
       $message="确认删除入库单{$data['ru_id']}吗？";
       $delete_url="confirm.php?url={$url}&return_url={$return_url}&message={$message}";//声明了两个变量，作用是中转$url，给用户提供一个误操作的缓冲，二次确认是否删除！qf_cx_wuliaoxinxichaxun_upd.php?id={$data['id']}<a href="$delete_url" style=color:#f00>
      $query="select sum(ruku_shuliang) from qf_rk_rukudan_liebiao where ru_fu_id={$data['ru_id']}";
      $sum_rksl=num($link,$query);

$html=<<<A
    <tr>
    <td>{$data['ru_id']}</td>
    <td>{$data['ru_ku_ri_qi']}</td>
    <td>{$data['ru_ku_cang_ku']}</td>
    <td>{$data['ru_ku_lei_xing']}</td>
    <td>{$sum_rksl}</td>
    <td>{$data['ru_ku_bei_zhu']}</td>
    <td>{$data['jing_ban_ren']}</td>
    <td>
    <a href='qf_rk_rukudan_liebiao.php?ru_id={$data['ru_id']}'>编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    <a href='$delete_url'style=color:#f00>删除</td>
    </tr>
A;
        echo $html;
        }
     ?>
   </thead>
 </table>
<script>
 //入库管理界面的添加按钮
$('#rukuguanli_xinjian').on('click', function(){
layer.open({
    type: 2,//type为2表示为iframe层
    title: '新建入库单',//弹出层名称
    area : ['40%' , '80%'],//宽高
    content: 'qf_rk_rukudan_add.php',//弹出层页面地址
    end:function()//弹出层关闭之后的操作
    {
        location.reload();//父页面的重新加载
    }
});
});

</script>
<?php include '../inc/footer.inc.php'?>

