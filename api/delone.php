<?php
include("base.php");

$admindb = new AdminDB();           //数据库操作类实例化
if (!empty($_REQUEST['id']) || isset($_REQUEST['id'])) {
    $sql = "DELETE FROM article WHERE `id`=" . $_REQUEST['id'];
    $res = $admindb->exec_sql($sql);
    echo json_encode($res, JSON_UNESCAPED_UNICODE);
} else {
    echo '请求非法';
}
?>
