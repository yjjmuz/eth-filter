<?php
require_once 'database.php';
$mysqli = new ConnectMysqli();
$sql = "SELECT * FROM `tx` ORDER BY tx_id DESC LIMIT 0,5";
$res = $mysqli->query($sql);
$arr = array();
while($row = mysqli_fetch_assoc($res))
{
    $arr[] = $row;
}
$data = $arr;
// var_dump($data);

/******************************/
// $page = isset($_GET['page'])? $_GET['page']:1;
// $pageSize = isset($_GET['pageSize'])? $_GET['pageSize']:25;

// $mysqli = new ConnectMysqli();
// $sql = "SELECT * FROM `tx` LIMIT $page,$pageSize";
// $res = $mysqli->query($sql);
// $arr = array();
// while($row = mysqli_fetch_assoc($res))
// {
//     $arr[] = $row;
// }
// $tran_data = $arr;
// /***********************************/
// $page = isset($_GET['page'])? $_GET['page']:1;
// $pageSize = isset($_GET['pageSize'])? $_GET['pageSize']:25;

// $mysqli = new ConnectMysqli();
// $sql = "SELECT * FROM `blockhash` LIMIT $page,$pageSize";
// $res = $mysqli->query($sql);
// $arr = array();
// while($row = mysqli_fetch_assoc($res))
// {
//     $arr[] = $row;
// }
// $block_data = $arr;
