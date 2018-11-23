<?php 
include("base.php");
 
$admindb=new AdminDB();           //数据库操作类实例化 
$sql="select id,atitle,subtitle,author,atype,atags,pubdate,viewcount,clickup from article where openable!=1 ORDER BY id desc";
$res=$admindb->query_list ($sql);  
if($res){         
	echo json_encode($res,JSON_UNESCAPED_UNICODE);
}else{
	echo '查询失败';
}
?>