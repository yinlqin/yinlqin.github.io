<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Layui</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <script src="../layui.js" charset="utf-8"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="../css/layui.css"  media="all">
  <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>




<div class="layui-inline">
      <label class="layui-form-label">按日期筛选</label>
      <div class="layui-input-inline">
        <input type="text" name="date" id="date" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input">
      </div>
</div>
            
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>固定块</legend>
</fieldset>
 
<p>囖，就页面右下角的那个。</p>
 
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
  <legend>倒计时</legend>
</fieldset>
请选择要计算的日期：
<div class="layui-inline">
  <input type="text" class="layui-input" id="test1" value="2099-01-01 00:00:00">
</div>
<blockquote class="layui-elem-quote" style="margin-top: 10px;">
  <div id="test2"></div>
</blockquote>
 
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
  <legend>某个时间在当前时间的多久前</legend>
</fieldset>
 
请选择要计算的日期：
<div class="layui-inline">
  <input type="text" class="layui-input" id="test3">
</div>
<span class="layui-word-aux" id="test4"></span>
 
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
  <legend>转换日期格式</legend>
</fieldset>
请编辑格式：
<div class="layui-inline">
  <input type="text" value="yyyy-MM-dd HH:mm:ss" class="layui-input" id="test5">
</div>
<span class="layui-word-aux" id="test6"></span>
 
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
  <legend>批量处理事件</legend>
</fieldset>
<div class="layui-btn-container">
  <button class="layui-btn" lay-active="e1">事件1</button>
  <button class="layui-btn" lay-active="e2">事件2</button>
  <button class="layui-btn" lay-active="e3">事件3</button>
</div>
 
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
  <legend>XSS 过滤</legend>
</fieldset>
<div class="layui-form layui-inline" style="width: 300px;">
  <textarea class="layui-textarea" id="test7">&lt;script&gt;
  alert(0);
&lt;/script&gt;
  </textarea>
</div>
<div class="layui-btn-container" style="margin-top: 10px;">
  <button class="layui-btn" id="test8">执行过滤</button>
</div>
              
          


</body>
</html>