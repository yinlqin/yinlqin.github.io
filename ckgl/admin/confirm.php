<?php
include_once '../inc/config.inc.php';
$template['title']="确认页";
if(!isset($_GET['url']) || !isset($_GET['return_url'])){ //判定语句，如果获取到的url和return_url值不存在，exit（） 不执行任何操作
    exit();
}
?>
<?php
include '../inc/header.inc.php'
?>

    <div class="layui-row layui-col-space15">
            <div class="layui-card">
                <div class="layui-card-header">提示信息</div>
                    <div class="layui-card-body">
                        <span><?php echo $_GET['message']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="color:red;" href="<?php echo $_GET['url']?>">确定</a> &nbsp;|&nbsp; <a style="color:#666;" href="<?php echo $_GET['return_url']?>">取消</a></span>
                    </div>
                </div>
            </div>
    </div> 
