<?php
include_once '../../inc/config.inc.php';
include_once '../../inc/mysql.inc.php';
include_once '../../inc/tool.inc.php';

$template['title']="新增入库单";

if(isset($_POST['submit'])){
    $link=connect();
    $query="insert into qf_rk_rukudan(ru_id,ru_ku_ri_qi,ru_ku_cang_ku,ru_ku_bei_zhu,jing_ban_ren,ru_ku_lei_xing) values('{$_POST['rukudandanhao']}',now(),'{$_POST['cangku']}','{$_POST['beizhu']}','{$_POST['jingbanren']}','{$_POST['category']}')";    
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
        <label class="layui-form-label">入库单单号</label>
        <div class="layui-input-block">
            <input type="text" name="rukudandanhao" lay-verify="title" autocomplete="off" placeholder="自动生成，无需填写" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">入库时间</label>
        <div class="layui-input-block">
        <input type="text" name="rukushijian" lay-verify="title" autocomplete="off" placeholder="" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">入库类型</label>
        <div class="layui-input-block">
        <input type="radio" name="category" value="采购入库" title="采购入库" checked="">
        <input type="radio" name="category" value="零星入库" title="零星入库">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">入库仓库</label>
        <div class="layui-input-block">
        <input type="radio" name="cangku" value="原材料仓库" title="原材料仓库" checked="">
        <input type="radio" name="cangku" value="半成品仓库" title="半成品仓库">
        <input type="radio" name="cangku" value="成品仓库" title="成品仓库">

        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">经办人</label>
                <div class="layui-input-inline">
                    <select name="jingbanren" lay-search="">
                    <option value="仓库">仓库</option>
                    <option value="采购">采购</option>
                    <option value="其他">其他</option>
                    </select>
                </div>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">备注</label>
        <div class="layui-input-block">
        <input type="text" name="beizhu" lay-verify="title" autocomplete="off" placeholder="选填" class="layui-input">
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