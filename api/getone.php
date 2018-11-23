<?php
include("base.php");

$admindb = new AdminDB();           //数据库操作类实例化
if (!empty($_REQUEST['id']) || isset($_REQUEST['id'])) {
    $sql = "select * from article WHERE `id`= " . $_REQUEST['id'];
    $res = $admindb->query_one($sql);
    if ($res) {
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        $sql = "update article set `viewcount`=viewcount+1 where `id`=" . $_REQUEST['id'];
        $res = $admindb->exec_sql($sql);
    }
} else {
    echo '查询内容不合法';
}
?>
