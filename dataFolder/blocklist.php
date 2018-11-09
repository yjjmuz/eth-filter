<?php
require_once 'ethereum.php';

$ethereum = new Ethereum('127.0.0.1', 8545);
$bNum = $ethereum -> eth_blockNumber();
$bNum = hexdec($bNum);

$pageSize = isset($_GET['pageSize'])? $_GET['pageSize']:25;

for($i = 0;$i< $pageSize; $i++){
    $num = $bNum-$i;

    $num = '0x'. dechex($num);

    $res = $ethereum ->eth_getBlockByNumber($num);
    $res = array
    (
        'number'=>hexdec($res->number),
        'timestamp'=>hexdec($res->timestamp),
        'miner'=>$res->miner,
        'hash'=>$res->hash,
        'totalDifficulty'=>$res->totalDifficulty,
        'transactions'=>$res->transactions
    );    
    $bdata[$i] = $res;
}
