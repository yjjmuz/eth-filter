<?php 
    require_once 'dataFolder/homeData.php';
    require_once 'dataFolder/blocklist.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>测试1</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <script type="text/javascript" src="js/vue.js"></script>
</head>
<style type="text/css">
    
</style>
<body>
    <div class="head1">
         <div class="images">
            <img src="img/logo.png" alt="" style="width: 210px;" />
         </div>
         <div style="float: right;">
            <input id="inp" type="text" />
            <a id="btn">查询</a>
         </div>
         <div id="about1">
             <ul>
                <li><a id="qukuai">区块</a></li>
                <li><a id="jiaoyi">交易</a></li>
                <li><a id="shouye">首页</a></li>
             </ul>
         </div>
     </div>
    <div>
        <div class="content">
    <div class="container">
        <!-- 头部区块 -->
        <div class="head">
           <img class="icon" src="img/logo.png" alt="傳是区块链"/>
           <div class="icon1">区块高度:<span id="icon1"></span></div>
        </div>
        <div id="footer">
            <div id="topleft">
                <ul>
                <div><span class="inlin1"></span></div>
                <li>哈希值: <br /><span class="block1"></span></li>
                <li>交易数量: <span class="block11"></span></li>
                <li>出块时间: <span class="block111"></span></li>
                </ul></br>
                <ul>
                <div><span class="inlin2"></span></div>
                <li>哈希值: <br /><span class="block2"></span></li>
                <li>交易数量: <span class="block22"></span></li>
                <li>出块时间: <span class="block222"></span></li>
                </ul></br>
                <ul>
                <div><span class="inlin3"></span></div>
                <li>哈希值: <br /><span class="block3"></span></li>
                <li>交易数量: <span class="block33"></span></li>
                <li>出块时间: <span class="block333"></span></li>
                </ul></br>
                <ul>
                <div><span class="inlin4"></span></div>
                <li>哈希值: <br /><span class="block4"></span></li>
                <li>交易数量: <span class="block44"></span></li>
                <li>出块时间: <span class="block444"></span></li>
                </ul></br>
                <ul>
                <div><span class="inlin5"></span></div>
                <li>哈希值: <br /><span class="block5"></span></li>
                <li>交易数量: <span class="block55"></span></li>
                <li>出块时间: <span class="block555"></span></li>
                </ul></br>
            </div>
            <div id="topright">
            	<?php foreach ($data as $k => $v):?>
                <ul>
                <li>tx哈希值: <span><?php echo $v['txhash']?></span></li>
                <li>From: <span></span></li>
                <li>To: <span></span></li>
                <li>金额: <span></span></li>
                </ul></br>
                <?php endforeach;?>
            </div>
        </div>        
    </div>
     </div>
     <div class="content">
         <div class="container" style="background: #fff;padding-top: 20px;">
             <ul class="chuanshi">
                <li>哈希</li>
                <li>所属快</li>
                <li>交易时间</li>
                <li>发送者</li>
                <li>接收者</li>
                <li>交易值</li>  
             </ul>
             <?php foreach($tran_data as $k1 => $v1):?>
             <ul class="chuanshi1">
                <li><?php echo $v1['txhash']?></li>
                <li>所属快</li>
                <li>交易时间</li>
                <li>发送者</li>
                <li>接收者</li>
                <li>交易值</li>  
             </ul>
             <?php endforeach;?>
         </div>
     </div>
     <div class="content">
         <div class="container" style="background: #fff;padding-top: 20px;">
             <ul class="shichuan">
                <li>快高</li>
                <li>生成时间</li>
                <li>交易数量</li>
                <li>出块者</li>
                <li>哈希</li>  
             </ul>
             
             <?php foreach($bdata as $k2 => $v2):?>
             <ul class="shichuan1">
                <li><?php echo $v2['number'];?></li>
                <li><?php
                        $age = time()-$v2['timestamp'];
                        if($age<60){
                            echo $age .'secs ago';
                        }elseif ($age<3600){
                            echo $age/60 . ' mins ago';
                        }elseif ($age<86400){
                            echo $age/3600 . 'hrs' .$age/3600/60 . ' mins ago';
                        }else {
                            echo $age/86400 . 'days'. $age/3600 . 'hrs' ;
                        }
                
                ?></li>
                <li><?php echo count($v2['transactions']);?></li>
                <li><?php echo $v2['miner'];?></li>
                <li><?php echo $v2['hash'];?></li> 
             </ul>
             <?php endforeach;?>
         </div>
     </div>
     <!-- 查询区块详情 -->
     <div class="content">
         <div class="container" style="height: 400px;background: #fff;border-top: 2px solid rgba(0,0,0,0.3);padding-top: 30px;">
             <div class="blook">
              <div class="blook1">
                  <span>区块详情</span>
              </div>
              <div class="blook2">
                  <ul>
                      <li>number：</li><span class="net1"></span><br />
                      <li style="top: 40px;">pkHash：</li><span style="top: 40px;" class="net2"></span><br />
                      <li style="top: 80px;">parentHash：</li><span style="top: 80px;" class="net3"></span><br />
                      <li style="top: 120px;">timestamp：</li><span style="top: 120px;" class="net4"></span><br />
                      <li style="top: 160px;">transactionsRoot：</li><span style="top: 160px;" class="net5"></span><br />
                      <li style="top: 200px;">extraData：</li><span style="top: 200px;" class="net6"></span><br />
                      <li style="top: 240px;">gasUsed：</li><span style="top: 240px;" class="net7"></span>
                  </ul>
              </div>
             </div>
         </div>
     </div>
    </div>
    <div id="zhao">
    <!-- 查询区块详情 -->
    <span id="zhi">x</span>
            <ul>
              <li>blockHash:<span class="lii1"></span><br /></li>
              <li>blockNumber:<span class="lii2"></span><br /></li>
              <li>from:<span class="lii3"></span><br /></li>
              <li>to:<span class="lii4"></span><br /></li>
              <li>gas:<span class="lii5"></span><br /></li>
              <li>gasPrice:<span class="lii6"></span><br /></li>
              <li>hash:<span class="lii7"></span><br /></li>
              <li>nonce:<span class="lii8"></span><br /></li>
              <li>r:<span class="lii9"></span><br /></li>
              <li>s:<span class="lii10"></span><br /></li>
              <li>transactionIndex:<span class="lii11"></span><br /></li>
              <li>v:<span class="lii12"></span><br /></li>
              <li>value:<span class="lii13"></span></li>
              <li>input:<input class="lii14" /><br /></li>
          </ul>
    </div>
</body>
    <script type="text/javascript" src='js/jquery-3.1.1.js'></script>
    <script type="text/javascript" src='js/jquery-3.1.1.min.js'></script>
    <script type="text/javascript" src='js/boole.js'></script>
    <script src="./node_modules/web3/dist/web3.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
</html>