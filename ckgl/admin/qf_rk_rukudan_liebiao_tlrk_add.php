<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';

$template['title']="添加入库单明细";
// var_dump($_GET['ru_id']);
if(isset($_POST['submit'])){
    $link=connect();
    $query="insert into qf_rk_rukudan_liebiao (ru_fu_id,wu_liao_bian_ma,ruku_shuliang) values('{$_GET['ru_id']}','{$_POST['wuliaobianma']}','{$_POST['rukushuliang']}')";    
    execute($link,$query);
    // if(mysqli_affected_rows($link)==1){
	// skip('qf_cx_wuliaochaxun.php','添加成功！');
	// }
    // else{
	//  	skip('qf_jcxxgl_wuliaoguanli.php','添加失败！');
	// }'{$_POST['wuliaobianma']}',
}

?>
<form method="post" class="layui-form" action="">

    <div class="layui-form-item">
        <label class="layui-form-label">入库单子单号</label>
        <div class="layui-input-block">
            <input type="text" name="rukudanzidanhao" lay-verify="title" autocomplete="off" placeholder="自动生成，无需填写" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">物料列表</label>
        <div class="layui-input-inline" style="width: 500px;">
            <select name="wuliaobianma" lay-verify="required" lay-search="">
                <?php
                $link=connect();
                $query_wlxx="select * from qf_wuliaoxinxi";
                $result_wlxx=execute($link, $query_wlxx);
                while ($data_wlxx=mysqli_fetch_assoc($result_wlxx)){
                    echo "<option value=''></option>";
                    echo "<option value='{$data_wlxx['id']}'>{$data_wlxx['id']}，{$data_wlxx['wu_liao_ming_cheng']}，{$data_wlxx['gui_ge_xing_hao']}</option>";
                }  
                ?>
            </select>
        </div>
    </div>
    

    <div class="layui-form-item">
        <label class="layui-form-label">数量</label>
        <div class="layui-input-block">
        <input type="text" name="rukushuliang" lay-verify="title" lay-reqtext="请输入数量！" autocomplete="off" placeholder="1" class="layui-input">
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