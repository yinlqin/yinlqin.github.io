<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';

$template['title']="新增出库单";

if(isset($_POST['submit'])){
    $link=connect();
    $query="insert into qf_ck_chukudan(chu_id,chu_ku_ri_qi,bei_zhu,jing_ban_ren,chu_ku_lei_xing) values('{$_POST['chukudandanhao']}',now(),'{$_POST['beizhu']}','{$_POST['jingbanren']}','{$_POST['category']}')";    
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
        <label class="layui-form-label">出库单单号</label>
        <div class="layui-input-block">
            <input type="text" name="chukudandanhao" lay-verify="title" autocomplete="off" placeholder="自动生成，无需填写" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">出库时间</label>
        <div class="layui-input-block">
        <input type="text" name="chukushijian" lay-verify="title" autocomplete="off" placeholder="" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">出库类型</label>
        <div class="layui-input-block">
        <input type="radio" name="category" value="生产领用出库" title="生产领用出库" checked="">
        <input type="radio" name="category" value="售后订单出库" title="售后订单出库">
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