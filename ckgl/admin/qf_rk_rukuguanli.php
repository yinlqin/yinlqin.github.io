<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
$link=connect();
$query='select * from qf_rk_rukudanliebiao';
$result=execute($link,$query);
$template['title']="入库管理"
?>
<?php include '../inc/header.inc.php'?>

 
 


<form class="layui-form" action="">
  <div class="layui-form-item">
    <label class="layui-form-label">入库单查询</label>
    <div class="layui-input-block-wlxc">
      <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入内容" class="layui-input">
    </div>
    <div class="layui-inline">
      <label class="layui-form-label">日期范围</label>
      <div class="layui-input-inline-wlxc">
        <input type="text" class="layui-input" id="test6" placeholder=" - ">
      </div>
    </div>
        <button type="submit" class="layui-btn">搜索</button>
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
        <a href="http://www.layui.com/doc/element/button.html" class="layui-btn-G" target="_blank">跳转的按钮</a>
        <a href="http://www.layui.com/doc/element/button.html" class="layui-btn-G" target="_blank">跳转的按钮</a>
        <a href="http://www.layui.com/doc/element/button.html" class="layui-btn-G" target="_blank">跳转的按钮</a>
        <a href="./qf_rk_rukuguanli_add.php" class="layui-btn-G" target="_blank">跳转的按钮</a>
      </div>
 </div>


 <table class="layui-G-table">
   <thead>
     <tr>
       <th>ID</th>
       <th>入库单号</th>
       <th>日期</th>
       <th>仓库</th>
       <th>总数量</th>
       <th>备注</th>
       <th>经办人</th>
       <th>状态</th>
       <th>操作</th>
     </tr>
     <?php
     $query='select * from qf_rk_rukudanliebiao';
     $result=execute($link,$query);
     while ($data=mysqli_fetch_assoc($result)){
       $url=urlencode("qf_cx_wuliaochaxun_del.php?id={$data['id']}");//声明了一个变量，后面的是变量的地址，并且获取数据库中的指定目标，地址被加密；
       $return_url=urlencode($_SERVER['REQUEST_URI']);//声明了一个变量，作用是返回原页面，连接到php全局变量$_SERVER中的REQUEST_URL变量中，REQUEST_URL被赋值为当前页面地址
       //$message="确认删除物料{$data['id']} | {$data['wu_liao_ming_cheng']} | {$data['gui_ge_xing_hao']}吗？";
       //$delete_url="confirm.php?url={$url}&return_url={$return_url}&message={$message}";//声明了两个变量，作用是中转$url，给用户提供一个误操作的缓冲，二次确认是否删除！qf_cx_wuliaoxinxichaxun_upd.php?id={$data['id']}<a href="$delete_url" style=color:#f00>
$html=<<<A
    <tr>
    <td>{$data['id']}</td>
    <td>{$data['ru_ku_dan_dan_hao']}</td>
    <td>{$data['ru_ku_ri_qi']}</td>
    <td>{$data['ru_ku_cang_ku']}</td>
    <td>{$data['ru_ku_shu_liang']}</td>
    <td>{$data['ru_ku_bei_zhu']}</td>
    <td>{$data['jing_ban_ren']}</td>
    <td>{$data['zhuang_tai']}</td>
    <td><a href=''>编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;删除</a></td>//
    </tr>
A;
        echo $html;
        }
     ?>
   </thead>
 </table>


<?php include '../inc/footer.inc.php'?>

