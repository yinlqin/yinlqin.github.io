<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title><?php echo $template['title'] ?></title>
  <link rel="stylesheet" href="../css/layui.css">
</head>
<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';

$template['title']="物料管理";

if(isset($_POST['submit'])){
    $link=connect();
    $query="insert into qf_wuliaoxinxi(wu_liao_lei_bie,wu_liao_ming_cheng,wu_liao_pin_pai,gui_ge_xing_hao,dan_wei,cai_zhi,color,bei_zhu,ku_wei) values('{$_POST['category']}','{$_POST['wuliaomingcheng']}','{$_POST['wuliaopinpai']}','{$_POST['wuliaoxinghao']}','{$_POST['danwei']}','{$_POST['caizhi']}','{$_POST['yanse']}','{$_POST['beizhu']}','{$_POST['kuwei']}')";    
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
        <label class="layui-form-label">物料编码</label>
        <div class="layui-input-block">
            <input type="text" name="wuliaobianma" lay-verify="title" autocomplete="off" placeholder="物料编码为自动生成，无需填写" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">物料类别</label>
        <div class="layui-input-block">
        <input type="radio" name="category" value="配件" title="配件" checked="">
        <input type="radio" name="category" value="辅料" title="辅料">
        <input type="radio" name="category" value="外购成品" title="外购成品">
        </div>
    </div>
    
    <div class="layui-form-item">
        <label class="layui-form-label">物料名称</label>
        <div class="layui-input-block">
        <input type="text" name="wuliaomingcheng" lay-verify="required" lay-reqtext="物料名称是必填项，不能为空？" placeholder="必填项，请输入" autocomplete="off" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">物料品牌</label>
        <div class="layui-input-block">
        <input type="text" name="wuliaopinpai" lay-verify="title" autocomplete="off" placeholder="选填" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">物料型号</label>
        <div class="layui-input-block">
        <input type="text" name="wuliaoxinghao" lay-verify="required" lay-reqtext="物料型号是必填项，岂能为空？" placeholder="必填项，请输入" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
        <label class="layui-form-label">单位</label>
        <div class="layui-input-inline">
            <select name="danwei" lay-search="">
            <option value="PCS">Pcs</option>
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
    <!--<div class="layui-form-item layui-form-text">
        <label class="layui-form-label">备注</label>
        <div class="layui-input-block">
        <textarea placeholder="请输入内容" class="layui-textarea"></textarea>
        </div>
    </div>-->
    <div class="layui-form-item">
        <label class="layui-form-label">备注</label>
        <div class="layui-input-block">
        <input type="text" name="beizhu" lay-verify="title" autocomplete="off" placeholder="选填" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">库位</label>
        <div class="layui-input-block">
        <input type="text" name="kuwei" lay-verify="title" autocomplete="off" placeholder="库位" class="layui-input">
        </div>
    </div>
<!--
    <div class="layui-form-item">
    <label class="layui-form-label">库位</label>
    <div class="layui-input-inline-G">
      <select name="quiz1">
        <option value="">货架号</option>
        <option value="A" >A</option>
        <option value="B">B</option>
        <option value="C">C</option>        
        <option value="D">D</option>
        <option value="E">E</option>
        <option value="F">F</option>
        <option value="G">G</option>
        <option value="H">H</option>
        <option value="I">I</option>
        <option value="J">J</option>
        <option value="K">K</option>
        <option value="L">L</option>
        <option value="M">M</option>
        <option value="N">N</option>
        <option value="O">O</option>
        <option value="P">P</option>
        <option value="Q">Q</option>
        <option value="R">R</option>
        <option value="S">S</option>
        <option value="T">T</option>
        <option value="U">U</option>
        <option value="V">V</option>
        <option value="W">W</option>
        <option value="X">X</option>
        <option value="Y">Y</option>
        <option value="Z">Z</option>



      </select>
    </div>
    <div class="layui-input-inline-G">
      <select name="quiz2">
        <option value="">层号</option>
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">04</option>
        <option value="05">05</option>
        <option value="06">06</option>
      </select>
    </div>
    <div class="layui-input-inline-G">
      <select name="quiz3">
        <option value="">层位号</option>
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">04</option>
      </select>
    </div>
  </div>
  -->
    

    <div class="layui-form-item">
        <div class="layui-input-block">
        <button id="b01" type="submit"  name="submit" class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
        <button type="reset" name="reset" class="layui-btn layui-btn-primary" onclick="findData()">重置</button>
        </div>
    </div>
</form>










<?php include '../inc/footer.inc.php'?>