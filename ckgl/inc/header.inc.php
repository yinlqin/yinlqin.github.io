<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title><?php echo $template['title'] ?></title>
  <link rel="stylesheet" href="../css/layui.css">
  <script src="../jquery-3.6.0.min.js"></script>
  <script src="../layer/layer.js"></script>
  <script src="../layui.all.js" charset="utf-8"></script> 
  <script src="../layui.js" charset="utf-8"></script>
</head>
<body class="layui-layout-body">


<div class="layui-layout layui-layout-admin">
  <!-- 头部水平区域 -->  
    <div class="layui-header">
      <div class="layui-logo"><a href="../admin/index.php">CangKuGuanLi</a></div> 
        <div class="layui-logo-2">
          <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item"><a href="javascript:;"><img src="../images/01.png" class="layui-nav-img">乔峰</a>
              <dl class="layui-nav-child">
                <dd><a href="">基本资料</a></dd>
                <dd><a href="">安全设置</a></dd>
              </dl>
            </li>
            <li class="layui-nav-item"><a href="">退出</a></li>
          </ul>
        </div>
      </div>
    </div>

  
  <!-- 左侧垂直导航区域-->
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
          <li class="layui-nav-item layui-nav-itemed"> 
            <a class="" href="javascript:;">查询</a>
            <dl class="layui-nav-child">
              <dd><a href="../admin/qf_cx_rukudanchaxun.php">入库单查询</a></dd>
              <dd><a href="../admin/qf_cx_chukudanchaxun.php">出库单查询</a></dd>
              <dd><a href="../admin/qf_cx_kucunchaxun.php?keyword=">库存查询</a></dd>
              <dd><a href="../admin/qf_cx_caigoudanchaxun.php">采购单查询</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item"><a href="../admin/qf_rk_rukudan.php">入库单</a></li>
          <li class="layui-nav-item"><a href="../admin/qf_ck_chukudan.php">出库单</a></li>
          <li class="layui-nav-item"><a href="../admin/qf_cg_caigoudan.php">采购单</a></li>
          <li class="layui-nav-item">
            <a  href="javascript:;">基础信息管理</a>
            <dl class="layui-nav-child">
              <dd><a href="../admin/qf_jcxxgl_wuliaoguanli.php">物料管理</a></dd>
              <dd><a href="../admin/qf_jcxxgl_cangkushezhi.php">仓库设置</a></dd>
              <dd><a href="../admin/qf_jcxxgl_pandian.php">仓库盘点</a></dd>
              <dd><a href="../admin/qf_jcxxgl_yonghuguanli.php">用户管理</a></dd>
            </dl>
          </li>
        </ul>
      </div>
    </div>  
  </div>

  <!-- body/main区域 -->
  <div class="layui-body">
    <div id="main-g">  
      <div class="layui-tab" lay-filter="demo" lay-allowclose="true">
        <ul class="layui-tab-title">
          <li class="layui-this"><?php echo $template['title'] ?></li>
        </ul>
      </div>
      <!-- 其他代码开始区域 -->

    