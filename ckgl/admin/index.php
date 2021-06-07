<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
$template['title']="首页"
?>
<style>
.text_box{
  position: relative;
  overflow: hidden;
  display: flex;

}
.text_box_a{
  box-shadow: 0 2px 10px rgb(0 0 0 / 20%);
  height: 100px;
  display: flex;
  cursor: default;
  background-color: #fff;
  position: relative;
  overflow: hidden;
  margin-bottom: 30px;
  width: 25%;
  margin: 15px;
}
.icon{
  color: #fff;
  font-size: 50px;
  line-height: 80px;
}

.layui-icon-g{
  margin: 11px 0;
}
.text{
  font-size: 20px;
  margin-top: 20px;
}
.text_nums{
  font-weight: normal;
  font-size: 26px;
  color: #555;
}

.image_box{
  width:650px;
  height: auto;
  margin: 80 auto;
}
</style>
<?php include '../inc/header.inc.php'?>
<div class="image_box">
  <img src="../images/welcome.jpg">
</div>
<blockquote class="layui-elem-quote layui-text" style="margin-left: 15px;border-left: 5px solid #f2f2f2">
“欢迎使用本系统，请留意下方提示信息！”
</blockquote>
<div class="text_box";>
  <div class="text_box_a">
      <div class="layui-icon-g">
        <i class="layui-icon layui-icon-close-fill" style="font-size: 80px; color: #8bc24a;"></i>
      </div>
      <div class="content">
          <div class="text">未采购</div>
          <div class="text_nums">15条</div>
      </div>
  </div>  
  <div class="text_box_a">
      <div class="layui-icon-g">
        <i class="layui-icon layui-icon-close-fill" style="font-size: 80px; color: #1E9FFF;"></i>
      </div>
      <div class="content">
          <div class="text">采购未到货</div>
          <div class="text_nums">12条</div>
      </div>
  </div>  
  <div class="text_box_a">
      <div class="layui-icon-g">
        <i class="layui-icon layui-icon-close-fill" style="font-size: 80px; color: #FF5722;"></i>
      </div>
      <div class="content">
          <div class="text">采购延期</div>
          <div class="text_nums">3条</div>
      </div>
  </div>  
  <div class="text_box_a">
      <div class="layui-icon-g">
        <i class="layui-icon layui-icon-close-fill" style="font-size: 80px; color: #FFB800;"></i>
      </div>
      <div class="content">
          <div class="text">低库存物料</div>
          <div class="text_nums">125条</div>
      </div>
  </div>  

</div>


<?php include '../inc/footer.inc.php'?>
