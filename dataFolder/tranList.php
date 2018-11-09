<?php
require_once 'database.php';

$page = isset($_GET['page'])? $_GET['page']:1;
$pageSize = isset($_GET['pageSize'])? $_GET['pageSize']:25;
$page = ($page - 1)*$pageSize;

$mysqli = new ConnectMysqli();

//获取表长度
$sql2 = "SELECT count(*) FROM `tx`";
$len['count(*)'] = mysqli_fetch_assoc($mysqli->query($sql2));

$sql = "SELECT * FROM `tx` ORDER BY tx_id DESC LIMIT $page,$pageSize";
$res = $mysqli->query($sql);
$arr = array();
while($row = mysqli_fetch_assoc($res))
{
    $arr[] = $row;
}
$tran_data = $arr;

echo json_encode($tran_data);
