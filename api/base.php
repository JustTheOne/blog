<?php

// 指定允许其他域名访问
header('Access-Control-Allow-Origin:*');
// 响应类型
header('Access-Control-Allow-Methods:*');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with,content-type');

class AdminDB
{
    private $db;

    function __construct()
    {
        $path = "zky.db";
        if (file_exists($path)) {
            $this->db = new PDO('sqlite:zky.db');
        } else {
            $this->db = new PDO('mysql:host=localhost;dbname=zky', "root", "Bngd.1919", array(PDO::ATTR_PERSISTENT => true));
        }
        $this->db->query("SET NAMES 'utf8'");
    }

    function query_list($sql)//查询列表
    {
        $rs = $this->db->query($sql);
        if (!$rs) {
            return '';
        }
        while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
            $arrayData[] = $row;
        }
        if (empty($arrayData)) {
            return [];
        }
        return $arrayData;

    }

    function query_one($sql)//查询单条
    {
        $rs = $this->db->query($sql);
        $obData = $rs->fetch(PDO::FETCH_ASSOC);
        if (empty($obData)) {
            return null;
        }
        return $obData;
    }

    function add_sql($sql)//增
    {
        $stmt = $this->db->prepare($sql);
        $num = $stmt->execute([]);
        $count = $stmt->rowCount();//受影响行数
        if ($count==1) {
            $count = $this->db->lastInsertId();
        }
        return $count;
    }

    function exec_sql($sql)//删改
    {
        $stmt = $this->db->prepare($sql);
        $num = $stmt->execute([]);
        $count = $stmt->rowCount();//受影响行数
        if (strpos($sql, 'INSERT')) {
            $count = $this->db->lastInsertId();
        }
        return $count;
    }
}

?>
