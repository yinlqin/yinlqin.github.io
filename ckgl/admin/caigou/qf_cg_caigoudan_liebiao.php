<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
include '../inc/header.inc.php';
$link=connect();
$template['title']="采购单管理";

if(!isset($_GET['cai_id']) || !is_numeric($_GET['cai_id'])){
    skip('qf_cg_caigoudan.php','id参数错误!');
}
$query="select * from qf_cg_caigoudan where cai_id={$_GET['cai_id']}";
$result=execute($link,$query);
if(!mysqli_num_rows($result)){
    skip('qf_cg_caigoudan.php','信息不存在!');
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
      <button type="submit" id="caikudan_liebiao_add" class="layui-btn">添加明细</button>
      
      </div>
 </div>

 <table class="layui-G-table">
   <thead>
     <tr>
       <th>父单号</th>
       <th>子单号</th>
       <th>物料编码</th>
       <th>物料类别</th>
       <th>物料名称</th>
       <th>品牌</th>
       <th>规格型号</th>
       <th>材质</th>
       <th>颜色</th>
       <th>单位</th>
       <th>数量</th>
       <th>请购人</th>
       <th>请购用途</th>
       <th>需求日期</th>
       <th>操作</th>
     </tr>
     <?php
     $query="select * from qf_cg_caigoudan_liebiao where cai_id={$_GET['cai_id']}";
     $result=execute($link,$query);
     while ($data=mysqli_fetch_assoc($result)){
      //  $query="select * from qf_cg_caikudan_liebiao";
       $url=urlencode("qf_cg_caikudan_liebiao_del.php?cgd_id={$data['cgd_id']}");//声明了一个变量，后面的是变量的地址，并且获取数据库中的指定目标，地址被加密；
       $return_url=urlencode($_SERVER['REQUEST_URI']);//声明了一个变量，作用是返回原页面，连接到php全局变量$_SERVER中的REQUEST_URL变量中，REQUEST_URL被赋值为当前页面地址
      //  $message="确认删除采购单{$data['cgd_id']}吗？";
      //  $delete_url="confirm.php?url={$url}&return_url={$return_url}&message={$message}";//声明了两个变量，作用是中转$url，给用户提供一个误操作的缓冲，二次确认是否删除！qf_cx_wuliaoxinxichaxun_upd.php?id={$data['id']}<a href="$delete_url" style=color:#f00>

$html=<<<A
    <tr>
    <td>{$_GET['cai_id']}</td>
    <td>{$data['cgd_id']}</td>
    <td>{$data['wu_liao_bian_ma']}</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>{$data['caigou_shuliang']}</td>

    <td>{$data['qing_gou_ren']}</td>

    <td>{$data['yong_tu']}</td>
    <td>{$data['xu_qiu_ri_qi']}</td>

    <td>
    <a href='qf_cg_caikudan_liebiao_del.php?cgd_id={$data['cgd_id']}'style=color:#f00>删除</td>
    </tr>
A;
        echo $html;
        }
     ?>
   </thead>
 </table>
<script>
//caikudan_liebiao添加按钮
$('#caikudan_liebiao_add').on('click', function(){
layer.open({
    type: 2,//type为2表示为iframe层
    title: '添加采购单明细',//弹出层名称
    area : ['40%' , '80%'],//宽高
    content: 'qf_cg_caigoudan_liebiao_add.php?cai_id=<?php echo$_GET['cai_id']?>',//弹出层页面地址
    end:function()//弹出层关闭之后的操作
    {
        location.reload();//父页面的重新加载
    }
});
});
</script>
<?php include '../inc/footer.inc.php'?>

