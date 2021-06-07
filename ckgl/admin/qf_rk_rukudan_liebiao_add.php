<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';

$template['title']="添加入库单明细";
// var_dump($_GET['ru_id']);
if(isset($_POST['submit'])){
    $link=connect();
    $query="insert into qf_rk_rukudan_liebiao (ru_fu_id,rkd_id,ruku_shuliang) values('{$_GET['ru_id']}','{$_POST['rukudanzidanhao']}','{$_POST['rukushuliang']}')";    
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
        <label class="layui-form-label">入库单子单号</label>
        <div class="layui-input-block">
            <input type="text" name="rukudanzidanhao" lay-verify="title" autocomplete="off" placeholder="自动生成，无需填写" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
    <label class="layui-form-label">入库单列表</label>
    <div class="layui-input-block">
      <select name="interest" lay-filter="aihao">
        <option value="">非采购入库无需选择此项</option>
        <option value="0">10000036_1092_外购产品_风机_风贝克_2HBAH-6HA55/0.55KW</option>
        <option value="1" selected="">阅读</option>
        <option value="2">游戏</option>
        <option value="3">音乐</option>
        <option value="4">旅行</option>
      </select>
    </div>
    </div>
     <div class="layui-form-item">
        <label class="layui-form-label">物料编码</label>
        <div style="width: 212px;" class="layui-input-block">
        <input type="text" name="rukushijian" lay-verify="title" autocomplete="off" placeholder="" class="layui-input">
        <button id="b01" type="submit"  name="submit" class="layui-btn" lay-submit="" lay-filter="demo1">获取信息</button>
        </div>
    </div>
    
    <div class="layui-form-item">
        <label class="layui-form-label">物料名称</label>
        <div class="layui-input-block">
        <input type="text" name="wuliaomingcheng" lay-verify="required" lay-reqtext="物料名称是必填项，不能为空？" placeholder="" autocomplete="off" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">物料品牌</label>
        <div class="layui-input-block">
        <input type="text" name="wuliaopinpai" lay-verify="title" autocomplete="off" placeholder="" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">物料型号</label>
        <div class="layui-input-block">
        <input type="text" name="wuliaoxinghao" lay-verify="required" lay-reqtext="物料型号是必填项，岂能为空？" placeholder="" autocomplete="off" class="layui-input">
        </div>
    </div>

    <!--<div class="layui-form-item">
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
    </div> -->
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