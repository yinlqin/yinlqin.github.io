<?php 
$template['title']="确认页";
// include '../inc/header.inc.php';

?>
<?php
function skip($url,$message){


$html=<<<A

<meta http-equiv="refresh" content="1;URL={$url}"/>

    <div class="layui-row layui-col-space15">
        <div class="layui-card">
            <div class="layui-card-header">提示信息</div>
                <div class="layui-card-body">
                    <span>{$message}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </div>
            </div>
        </div>
    </div> 
A;
echo $html;
exit;}
?>

<?php include '../inc/footer.inc.php'?>
