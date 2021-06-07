<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
$query='select * from qf_wuliaoxinxi';
$result=execute($link,$query);
$template['title']="新增入库单"
?>
<?php include '../inc/header.inc.php'?>



<?php include '../inc/footer.inc.php'?>