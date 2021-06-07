<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
include '../inc/header.inc.php';


$template['title']="物料信息修改";
$link=connect();
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    skip('qf_cx_wuliaochaxun.php','id参数错误!');
}
$query="select * from qf_wuliaoxinxi where id={$_GET['id']}";
$result=execute($link,$query);
if(!mysqli_num_rows($result)){
    skip('qf_cx_wuliaochaxun.php','信息不存在!');
}
$data=mysqli_fetch_assoc($result);


if(isset($_POST['submit'])){
    $link=connect();
    $query="update qf_wuliaoxinxi set wu_liao_lei_bie='{$_POST['category']}',wu_liao_ming_cheng='{$_POST['wuliaomingcheng']}',wu_liao_pin_pai='{$_POST['wuliaopinpai']}',gui_ge_xing_hao='{$_POST['wuliaoxinghao']}',dan_wei='{$_POST['danwei']}',cai_zhi='{$_POST['caizhi']}',color='{$_POST['yanse']}',bei_zhu='{$_POST['beizhu']}',ku_wei='{$_POST['kuwei']}' where id={$_GET['id']}";
    execute($link,$query);
    if(mysqli_affected_rows($link)==1){
	skip('qf_cx_kucunchaxun.php','修改成功！');
	}
    else{
	 	skip(($_SERVER['REQUEST_URI']),'修改失败！');
	}
}

?>


<form method="post" class="layui-form" action="">

    <!--
    <div class="layui-form-item">
        <label class="layui-form-label">输入物料编码</label>
        <div class="layui-input-block-wlxc">
            <input type="text" name="wuliaobianma" value="//<?php echo $data['id']?>" lay-verify="title" autocomplete="off" placeholder="物料编码为自动生成，无需填写" class="layui-input">
        </div>
        <a href="qf_cx_wuliaoxinxichaxun_upd.php?id="['wuliaobianma.text']" class="layui-btn">获取信息</a>
    </div>
    <a href='qf_cx_wuliaoxinxichaxun_upd.php?id={$data['id']}'>编辑</a>
    -->

    <div class="layui-form-item">
        <label class="layui-form-label">物料编码</label>
        <div class="layui-input-block">
            <input type="text" name="wuliaobianma" value="<?php echo $data['id']?>" lay-verify="title" autocomplete="off" placeholder="物料编码为自动生成，无需填写" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">物料类别</label>
        <div class="layui-input-block">
        <input type="radio" name="category" title="配件" value="配件" <?php if($data['wu_liao_lei_bie'] == "配件") echo "checked=checked"?>>
        <input type="radio" name="category" title="辅料"title="辅料" value="辅料" <?php if($data['wu_liao_lei_bie'] == "辅料") echo "checked=checked"?>>
        <input type="radio" name="category" title="外购成品"title="外购成品" value="外购成品" <?php if($data['wu_liao_lei_bie'] == "外购成品") echo "checked=checked"?>>
        </div>
    </div>
    
    <div class="layui-form-item">
        <label class="layui-form-label">物料名称</label>
        <div class="layui-input-block">
        <input type="text" name="wuliaomingcheng" value="<?php echo $data['wu_liao_ming_cheng']?>" lay-verify="required" lay-reqtext="物料名称是必填项，不能为空？" placeholder="必填项，请输入" autocomplete="off" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">物料品牌</label>
        <div class="layui-input-block">
        <input type="text" name="wuliaopinpai" value="<?php echo $data['wu_liao_pin_pai']?>" lay-verify="title" autocomplete="off" placeholder="选填" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">物料型号</label>
        <div class="layui-input-block">
        <input type="text" name="wuliaoxinghao" value="<?php echo $data['gui_ge_xing_hao']?>" lay-verify="required" lay-reqtext="物料型号是必填项，岂能为空？" placeholder="必填项，请输入" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
        <label class="layui-form-label">单位</label>
        <div class="layui-input-inline">
            <select name="danwei" lay-search="">
            <option value="<?php echo $data['dan_wei']?>"><?php echo $data['dan_wei']?></option>
            <option value="pcs">pcs</option>
            <option value="台">台</option>
            <option value="只">只</option>
            <option value="组">组</option>
            <option value="包">包</option>
            <option value="卷">卷</option>
            <option value="米">米</option>
            <option value="盒">盒</option>
            </select>
        </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
        <label class="layui-form-label">材质</label>
        <div class="layui-input-inline">
            <select name="caizhi" lay-search="">
            <option value="<?php echo $data['cai_zhi']?>"><?php echo $data['cai_zhi']?></option>
            <option value="304不锈钢">304不锈钢</option>
            <option value="316L不锈钢">316L不锈钢</option>
            <option value="黄铜">黄铜</option>
            <option value="紫铜">紫铜</option>
            <option value="橡胶">橡胶</option>
            <option value="陶瓷">陶瓷</option>
            <option value="塑料">塑料</option>
            <option value="木头">木头</option>
            </select>
        </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
        <label class="layui-form-label">颜色</label>
        <div class="layui-input-inline">
            <select name="yanse" lay-search="">
            <option value="<?php echo $data['color']?>"><?php echo $data['color']?></option>
            <option value="本色">本色</option>
            <option value="银白色">银白色</option>
            <option value="黑色">黑色</option>
            <option value="红色">红色</option>
            <option value="灰色">灰色</option>
            <option value="白色">白色</option>
            </select>
        </div>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">备注</label>
        <div class="layui-input-block">
        <input type="text" name="beizhu" value="<?php echo $data['bei_zhu']?>" lay-verify="title" autocomplete="off" placeholder="选填" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">库位</label>
        <div class="layui-input-block">
        <input type="text" name="kuwei" value="<?php echo $data['ku_wei']?>" lay-verify="title" autocomplete="off" placeholder="库位" class="layui-input">
        </div>
    </div>
    

    <div class="layui-form-item">
        <div class="layui-input-block">
        <button type="submit" name="submit" class="layui-btn" lay-submit="" lay-filter="demo1">修改信息</button>
        <button type="reset" name="reset" class="layui-btn layui-btn-primary">重置数据</button>
        </div>
    </div>
</form>


<?php include '../inc/footer.inc.php'?>