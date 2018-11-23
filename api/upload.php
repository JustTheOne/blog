<?php
// 指定允许其他域名访问
header('Access-Control-Allow-Origin:*');
// 响应类型
header('Access-Control-Allow-Methods:*');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with,content-type');

$target_path = './uploadfiles/'.$_FILES ['file'] ['name']; //接收文件目录
if (move_uploaded_file ( $_FILES ['file'] ['tmp_name'], iconv('UTF-8','gb2312',$target_path) )) {
    $array = array ('code' => '1', 'url' => 'https://ddns.zkyml.com:4433/api/uploadfiles/'.$_FILES ['file'] ['name'] );
    echo json_encode ( $array );
} else {
    $array = array ('code' => '0', 'url' => '上传失败,请重试' . $_FILES ['file'] ['error'] );
    echo json_encode ( $array );
}
?>
