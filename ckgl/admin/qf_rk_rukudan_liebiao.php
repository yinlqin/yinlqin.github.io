<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
include '../inc/header.inc.php';
$link=connect();
$template['title']="入库单管理";

if(!isset($_GET['ru_id']) || !is_numeric($_GET['ru_id'])){
    skip('qf_rk_rukudan.php','id参数错误!');
}
$query="select * from qf_rk_rukudan where ru_id={$_GET['ru_id']}";
$result=execute($link,$query);
if(!mysqli_num_rows($result)){
    skip('qf_rk_rukudan.php','信息不存在!');
}
$data=mysqli_fetch_assoc($result);
?>

 
 


<div id="layerDemo">
      <div class="layui-btn-container">
      <button type="submit" id="rukudan_liebiao_cgrk_add" class="layui-btn">添加明细（采购入库）</button>
      <button type="submit" id="rukudan_liebiao_tlrk_add" class="layui-btn">添加明细（退料入库）</button>

      <button type="submit" id="rukudan_liebiao_print" class="layui-btn">打印</button>
      
      </div>
 </div>

 <table class="layui-G-table">
   <thead>
     <tr>
       <th>入库父单号</th>
       <th>入库子单号</th>
       <th>采购子单号</th>
       <th>物料编码</th>
       <th>物料类别</th>
       <th>物料名称</th>
       <th>品牌</th>
       <th>规格型号</th>
       <th>材质</th>
       <th>颜色</th>
       <th>单位</th>
       <th>数量</th>
       <th>操作</th>
     </tr>
     <?php
     $query="select * from qf_rk_rukudan_liebiao where ru_fu_id={$_GET['ru_id']}";
     $result=execute($link,$query);
     while ($data=mysqli_fetch_assoc($result)){
       $url=urlencode("qf_rk_rukudan_liebiao_del.php?rkd_id={$data['rkd_id']}");//声明了一个变量，后面的是变量的地址，并且获取数据库中的指定目标，地址被加密；
       $return_url=urlencode($_SERVER['REQUEST_URI']);//声明了一个变量，作用是返回原页面，连接到php全局变量$_SERVER中的REQUEST_URL变量中，REQUEST_URL被赋值为当前页面地址
      //  $message="确认删除入库单{$data['rkd_id']}吗？";
      //  $delete_url="confirm.php?url={$url}&return_url={$return_url}&message={$message}";//声明了两个变量，作用是中转$url，给用户提供一个误操作的缓冲，二次确认是否删除！qf_cx_wuliaoxinxichaxun_upd.php?id={$data['id']}<a href="$delete_url" style=color:#f00>
      // $query="select sum(ruku_shuliang) from qf_rk_rukudan_liebiao";
      // // var_dump($_GET['ru_id']);
      // $sum_rksl=num($link,$query);
      // // var_dump($sum_rksl);
      // // exit();
      $link=connect();
      $query_wlxx="select * from qf_wuliaoxinxi where id={$data['wu_liao_bian_ma']}";
        $result_wlxx=execute($link, $query_wlxx);
        while ($data_wlxx=mysqli_fetch_assoc($result_wlxx)){

$html=<<<A
    <tr>
    <td>{$_GET['ru_id']}</td>
    <td>{$data['rkd_id']}</td>
    <td>{$data['cgd_id']}</td>
    <td>{$data['wu_liao_bian_ma']}</td>
    <td>{$data_wlxx['wu_liao_lei_bie']}</td>
    <td>{$data_wlxx['wu_liao_ming_cheng']}</td>
    <td>{$data_wlxx['wu_liao_pin_pai']}</td>
    <td>{$data_wlxx['gui_ge_xing_hao']}</td>
    <td>{$data_wlxx['cai_zhi']}</td>
    <td>{$data_wlxx['color']}</td>
    <td>{$data_wlxx['dan_wei']}</td>
    <td>{$data['ruku_shuliang']}</td>
    <td>
    <a href='qf_rk_rukudan_liebiao_del.php?rkd_id={$data['rkd_id']}'style=color:#f00>删除</td>
    </tr>
A;
        echo $html;
      }}
     ?>
   </thead>
 </table>
<script>
//rukudan_liebiao添加按钮
$('#rukudan_liebiao_cgrk_add').on('click', function(){
layer.open({
    type: 2,//type为2表示为iframe层
    title: '添加入库单明细(采购入库）',//弹出层名称
    area : ['40%' , '80%'],//宽高
    content: '../admin/qf_rk_rukudan_liebiao_cgrk_add.php?ru_id=<?php echo$_GET['ru_id']?>',//弹出层页面地址
    end:function()//弹出层关闭之后的操作
    {
        location.reload();//父页面的重新加载
    }
});
});
$('#rukudan_liebiao_tlrk_add').on('click', function(){
layer.open({
    type: 2,//type为2表示为iframe层
    title: '添加入库单明细（退料入库）',//弹出层名称
    area : ['40%' , '80%'],//宽高
    content: '../admin/qf_rk_rukudan_liebiao_tlrk_add.php?ru_id=<?php echo$_GET['ru_id']?>',//弹出层页面地址
    end:function()//弹出层关闭之后的操作
    {
        location.reload();//父页面的重新加载
    }
});
});

</script>
<?php include '../inc/footer.inc.php'?>

