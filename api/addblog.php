<?php
include("base.php");

$admindb = new AdminDB();           //数据库操作类实例化
if ((!empty($_REQUEST['key']) && !empty($_REQUEST['varar']))) {
    $sql = "INSERT INTO article" . $_REQUEST['varar'];
    $res = $admindb->add_sql($sql);
    echo json_encode($res, JSON_UNESCAPED_UNICODE);
} else {
    echo '请求非法';
}
?>
