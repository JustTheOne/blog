<?php 
include("base.php");
 
$admindb=new AdminDB();           //数据库操作类实例化 
if(!empty($_REQUEST['wds']) || isset($_REQUEST['wds'])){
	$sql="select id,atitle,subtitle,author,atype,atags,pubdate,viewcount,clickup from article WHERE openable!=1 and concat(atitle,subtitle,author,atype,atags,pubdate,content) like '%".$_REQUEST['wds']."%' ORDER BY id desc";
	$res=$admindb->query_list ($sql);  
	if($res){         
	  echo json_encode($res,JSON_UNESCAPED_UNICODE);
	}
}else{
	echo '请求非法'; 
}
?>