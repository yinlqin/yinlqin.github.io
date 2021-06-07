<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
$template['title']="物料查询"
?>
<?php include '../inc/header.inc.php'?>

<form class="layui-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
    <div class="layui-form-item">
      <label class="layui-form-label">关键字查询</label>
      <div class="layui-input-block-wlxc">
        <input type="text" lay-verify="title" name="keyword" class="layui-input">
      </div>
      <button type="submit" class="layui-btn">搜索</button>
    </div>
    </form>

    <?php 
    $link=connect();//建立数据库连接
    $keyWord = $_GET['keyword'];
    $res = mysqli_query($link, 'select * from qf_wuliaoxinxi where (wu_liao_ming_cheng like "%'.$keyWord.'%" or gui_ge_xing_hao like "%'.$keyWord.'%")');
    echo '共查询到',mysqli_num_rows($res),'记录';
    echo
    '<table class="layui-G-table">
      <thead>
        <tr>
        <th style=width:8px;>序号</th>
        <th style=width:25px;>物料编码</th>
        <th style=width:30px;>物料类别</th>
        <th>物料名称</th>
        <th>品牌</th>
        <th>规格型号</th>
        <th>单位</th>
        <th>材质</th>
        <th>颜色</th>
        <th>备注</th>
        <th>库位</th>
        <th>数量</th>
        <th>操作</th>
        </tr>';
        $i = 1;
    while($row = mysqli_fetch_array($res)){
        echo 
        '<tr>
        <td>'. $i .'</td>
        <td>'.$row['id'],'</td>
        <td>'.$row['wu_liao_lei_bie'],'</td>
        <td>',$row['wu_liao_ming_cheng'],'</td>
        <td>',$row['wu_liao_pin_pai']."</td>
        <td>",$row['gui_ge_xing_hao'],"</td>
        <td>",$row['dan_wei'],"</td>
        <td>",$row['cai_zhi'],"</td>
        <td>",$row['color'],"</td>
        <td>",$row['bei_zhu'],"</td>
        <td>",$row['ku_wei'],"</td>
        <td>",$i++."</td>
        <td>
        <a href='../admin/qf_cx_wuliaoxinxichaxun_upd.php?id={$row['id']}>编辑</a>
        
        </td>

        </tr>";

        $i++;
    }
    echo '</table>';

    ?>
<?php include '../inc/footer.inc.php'?>

