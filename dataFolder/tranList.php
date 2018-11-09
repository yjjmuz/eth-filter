<?php
require_once 'database.php';
require_once 'ethereum.php';

$ethereum = new Ethereum('127.0.0.1', 8545);
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
$data = $arr;
foreach ($data as $k => $v){
    
    $res = $ethereum ->eth_getTransactionByHash($v['txhash']);
    $res = array
    (
        'txhash'=>$v['txhash'],
        'number'=>hexdec($res->blockNumber),
        'timestamp'=>00,
        'from'=>$res->from,
        'to'=>$res->to,
        'value'=>hexdec($res->value)
    );
    
    $tran_data[$v['tx_id']] = $res;
}


echo json_encode($tran_data);
