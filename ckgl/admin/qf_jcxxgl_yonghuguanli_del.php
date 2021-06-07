<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
$link=connect();
$query='select * from qf_rk_rukudan_liebiao';
$result=execute($link,$query);
$template['title']="删除用户"
?>
<?php include '../inc/header.inc.php'?>

 
 


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
        <button id="parentIframe" type="submit" class="layui-btn">搜索</button>
      <br>
  </div>
  
  
  <div class="layui-form-item">
    </div>
    <div class="layui-inline">
    </div>
  </div>
  

</form> 
<div id="layerDemo">
      <div class="layui-btn-container">
      <button type="submit" id="rukuguanli_xinjianw" class="layui-btn">添加明细</button>
      </div>
 </div>


 <table class="layui-G-table">
   <thead>
     <tr>
       <th>采购单单号</th>
       <th>物料编码</th>
       <th>物料类别</th>
       <th>物料名称</th>
       <th>品牌</th>
       <th>规格型号</th>
       <th>材质</th>
       <th>颜色</th>
       <th>单位</th>
       <th>备注</th>
       <th>数量</th>
       <th>操作</th>
     </tr>
     <?php
     $query='select * from qf_rk_rukudan_liebiao';
     $result=execute($link,$query);
     while ($data=mysqli_fetch_assoc($result)){
       $url=urlencode("qf_rk_rukudan_liebiao_del.php?id={$data['rkd_id']}");//声明了一个变量，后面的是变量的地址，并且获取数据库中的指定目标，地址被加密；
$html=<<<A
    <tr>
    <td>{$data['rkd_id']}</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>{$data['ruku_shuliang']}</td>
    <td>
    <a href='$url'style=color:#f00>删除</td>
    </tr>
A;
        echo $html;
        }
     ?>
   </thead>
 </table>


<?php include '../inc/footer.inc.php'?>

