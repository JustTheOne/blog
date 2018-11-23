<?php
include("base.php");
//[{count: 28, atype: "Android开发", },{count: 25,atype: "Linux开发",}]
$admindb = new AdminDB();           //数据库操作类实例化
$sql = "SELECT atype,COUNT(atype) AS count FROM `article` WHERE 1 And openable<1 GROUP BY atype";
$res = $admindb->query_list($sql);
if ($res) {
    echo json_encode($res, JSON_UNESCAPED_UNICODE);
} else {
    echo '查询失败';
}
?>
