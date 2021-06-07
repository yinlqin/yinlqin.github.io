<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
include '../inc/header.inc.php';
$link=connect();
$template['title']="出库单管理";

if(!isset($_GET['chu_id']) || !is_numeric($_GET['chu_id'])){
    skip('qf_ck_chukudan.php','id参数错误!');
}
$query="select * from qf_ck_chukudan where chu_id={$_GET['chu_id']}";
$result=execute($link,$query);
if(!mysqli_num_rows($result)){
    skip('qf_ck_chukudan.php','信息不存在!');
}
$data=mysqli_fetch_assoc($result);
?>

 
 


<form class="layui-form" action="">
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
      <button type="submit" id="chukudan_liebiao_add" class="layui-btn">添加明细（生产领料）</button>
      <button type="submit" id="chukudan_liebiao_shdd_add" class="layui-btn">添加明细（售后订单）</button>
      <button type="submit" id="chukudan_liebiao_print" class="layui-btn">打印</button>
      
      </div>
 </div>

 <table class="layui-G-table">
   <thead>
     <tr>
       <th>父单号</th>
       <th>子单号</th>
       <th>物料编码</th>
       <th>物料名称</th>
       <th>规格型号</th>
       <th>单位</th>
       <th>备注</th>
       <th>领用人</th>
       <th>数量</th>
       <th>用途</th>
       <th>操作</th>
     </tr>
     <?php
     $query="select * from qf_ck_chukudan_liebiao where chu_id={$_GET['chu_id']}";
     $result=execute($link,$query);
     while ($data=mysqli_fetch_assoc($result)){
      //  $query="select * from qf_ck_chukudan_liebiao";
       $url=urlencode("qf_ck_chukudan_liebiao_del.php?rkd_id={$data['ckd_id']}");//声明了一个变量，后面的是变量的地址，并且获取数据库中的指定目标，地址被加密；
       $return_url=urlencode($_SERVER['REQUEST_URI']);//声明了一个变量，作用是返回原页面，连接到php全局变量$_SERVER中的REQUEST_URL变量中，REQUEST_URL被赋值为当前页面地址
      //  $message="确认删除出库单{$data['rkd_id']}吗？";
      //  $delete_url="confirm.php?url={$url}&return_url={$return_url}&message={$message}";//声明了两个变量，作用是中转$url，给用户提供一个误操作的缓冲，二次确认是否删除！qf_cx_wuliaoxinxichaxun_upd.php?id={$data['id']}<a href="$delete_url" style=color:#f00>
      // $query="select sum(chuku_shuliang) from qf_ck_chukudan_liebiao";
      // // var_dump($_GET['chu_id']);
      // $sum_rksl=num($link,$query);
      // // var_dump($sum_rksl);
      // // exit();
      $link=connect();
      $query_wlxx="select * from qf_wuliaoxinxi where id={$data['wu_liao_bian_ma']}";
        $result_wlxx=execute($link, $query_wlxx);
        while ($data_wlxx=mysqli_fetch_assoc($result_wlxx)){

$html=<<<A
    <tr>
    <td>{$_GET['chu_id']}</td>
    <td>{$data['ckd_id']}</td>
    <td>{$data['wu_liao_bian_ma']}</td>
    <td>{$data_wlxx['wu_liao_ming_cheng']}</td>
    <td>{$data_wlxx['gui_ge_xing_hao']}</td>
    <td>{$data_wlxx['dan_wei']}</td>
    <td>{$data_wlxx['bei_zhu']}</td>
    <td>{$data['ling_yong_ren']}</td>
    <td>{$data['chuku_shuliang']}</td>
    <td>{$data['yong_tu']}</td>
    <td>
    <a href='qf_ck_chukudan_liebiao_del.php?ckd_id={$data['ckd_id']}'style=color:#f00>删除</td>
    </tr>
A;
        echo $html;
        }}
     ?>
   </thead>
 </table>
<script>
//chukudan_liebiao添加按钮
$('#chukudan_liebiao_add').on('click', function(){
layer.open({
    type: 2,//type为2表示为iframe层
    title: '添加出库单明细',//弹出层名称
    area : ['40%' , '80%'],//宽高
    content: '../admin/qf_ck_chukudan_liebiao_add.php?chu_id=<?php echo$_GET['chu_id']?>',//弹出层页面地址
    end:function()//弹出层关闭之后的操作
    {
        location.reload();//父页面的重新加载
    }
});
});
</script>
<?php include '../inc/footer.inc.php'?>

