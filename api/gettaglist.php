<?php 
include("base.php");
 
$admindb=new AdminDB();           //数据库操作类实例化 
if(!empty($_REQUEST['atags']) || isset($_REQUEST['atags'])){
	$sql="select id,atitle,subtitle,author,atype,atags,pubdate,viewcount,clickup from article WHERE openable!=1 and atags like '%".$_REQUEST['atags']."%' ORDER BY id desc";
	$res=$admindb->query_list ($sql);  
	if($res){         
	  echo json_encode($res,JSON_UNESCAPED_UNICODE);
	}
}else{
	echo '请求非法'; 
}
?>