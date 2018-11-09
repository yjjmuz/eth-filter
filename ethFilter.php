<?php
require_once 'ethereum.php';
require_once 'dataFolder/database.php';

$ethereum = new Ethereum('localhost', '8545');

$filterId = $ethereum -> eth_newPendingTransactionFilter();

function getPendTranFilter($filterId){
    global $ethereum;

    $res = $ethereum ->eth_getFilterChanges($filterId);

    if(!empty($res)){
        return $res;
    }else{
        return getPendTranFilter($filterId);
    }
}
$result = getPendTranFilter($filterId);


$mysqli = new ConnectMysqli();
$sql = "INSERT INTO hash_list(`tx_id`,`tranHash`) VALUES('default','$result[0]')";
$res = $mysqli->query($sql);
var_dump($res);

