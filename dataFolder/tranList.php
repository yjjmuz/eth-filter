<?php
require_once 'database.php';

$page = isset($_GET['page'])? $_GET['page']:1;
$pageSize = isset($_GET['pageSize'])? $_GET['pageSize']:25;

$mysqli = new ConnectMysqli();
$page = ($page - 1)*$pageSize;
$sql = "SELECT * FROM `tx` ORDER BY tx_id DESC LIMIT $page,$pageSize";
$res = $mysqli->query($sql);
$arr = array();
while($row = mysqli_fetch_assoc($res))
{
    $arr[] = $row;
}
$tran_data = $arr;
