<?php
$template['title']="确认页";
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
include '../inc/header.inc.php';
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){ //判定语句，如果获取到的url和return_url值不存在或者使用php内置函数判定get到的值不是字符串，，则传递错误信息并不执行任何操作
    skip('qf_cx_wuliaochaxun.php','id参数传递失败！！');
}
$link=connect();
$query="delete from qf_wuliaoxinxi where id={$_GET['id']}";
execute($link,$query);
if(mysqli_affected_rows($link)==1){
	skip('qf_cx_wuliaochaxun.php','成功！');
}else{
	skip('qf_cx_wuliaochaxun.php','失败，请重试！');
}

?>