<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
$link=connect();
$query='select * from qf_wuliaoxinxi';
$result=execute($link,$query);
$template['title']="物料查询"
?>
<?php include '../inc/header.inc.php'?>

 
 


<form class="layui-form" action="">
  <div class="layui-form-item">
    <label class="layui-form-label">关键字查询</label>
    <div class="layui-input-block-wlxc">
      <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入内容" class="layui-input">
    </div>
    <div class="layui-inline">
      <label class="layui-form-label">名称查询</label>
      <div class="layui-input-inline-wlxc">
        <input type="tel" name="mingchengchaxun" lay-verify="required|phone" autocomplete="off" placeholder="请输入内容" class="layui-input">
      </div>
      <label class="layui-form-label">规格型号查询</label>
      <div class="layui-input-inline-wlxc">
        <input type="text" name="guigexinghaochaxun" lay-verify="email" autocomplete="off" class="layui-input">
      </div>
        <button type="submit" class="layui-btn">立即提交</button>
        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
  </div>
  
  <div class="layui-form-item">
    </div>
    <div class="layui-inline">
    </div>
  </div>
  

</form> 
 <table class="layui-G-table">
   <thead>
     <tr>
       <th>物料编码</th>
       <th>物料类别</th>
       <th>物料名称</th>
       <th>品牌</th>
       <th>规格型号</th>
       <th>单位</th>
       <th>材质</th>
       <th>颜色</th>
       <th>备注</th>
       <th>库位</th>
       <th>操作</th>
     </tr>
     <?php
     $query='select * from qf_wuliaoxinxi';
     $result=execute($link,$query);
     while ($data=mysqli_fetch_assoc($result)){
       $url=urlencode("qf_cx_wuliaochaxun_del.php?id={$data['id']}");//声明了一个变量，后面的是变量的地址，并且获取数据库中的指定目标，地址被加密；
       $return_url=urlencode($_SERVER['REQUEST_URI']);//声明了一个变量，作用是返回原页面，连接到php全局变量$_SERVER中的REQUEST_URL变量中，REQUEST_URL被赋值为当前页面地址
       $message="确认删除物料{$data['id']} | {$data['wu_liao_ming_cheng']} | {$data['gui_ge_xing_hao']}吗？";
       $delete_url="confirm.php?url={$url}&return_url={$return_url}&message={$message}";//声明了两个变量，作用是中转$url，给用户提供一个误操作的缓冲，二次确认是否删除！
$html=<<<A
    <tr>
    <td>{$data['id']}</td>
    <td>{$data['wu_liao_lei_bie']}</td>
    <td>{$data['wu_liao_ming_cheng']}</td>
    <td>{$data['wu_liao_pin_pai']}</td>
    <td>{$data['gui_ge_xing_hao']}</td>
    <td>{$data['dan_wei']}</td>
    <td>{$data['cai_zhi']}</td>
    <td>{$data['color']}</td>
    <td>{$data['bei_zhu']}</td>
    <td>{$data['ku_wei']}</td>
    <td><a href='qf_cx_wuliaoxinxichaxun_upd.php?id={$data['id']}'>编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="$delete_url" style=color:#f00>删除</a></td>
    </tr>
A;
        echo $html;
        }
     ?>
   </thead>
 </table>
 


<?php include '../inc/footer.inc.php'?>

