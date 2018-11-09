<?php 
    require_once 'dataFolder/homeData.php';
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
                <li><a href="./block.php">区块</a></li>
                <li><a href="./default.php">交易</a></li>
                <li style="border-bottom:2px solid rgba(60, 66, 149, 1);
        color:rgba(60, 66, 149, 1)"><a href="./index.php">首页</a></li>
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
     <div class="content">
     <div class="container" style="height: 400px;background: #fff;border-top: 2px solid rgba(0,0,0,0.3);padding-top: 30px;">
     <div class="blook" style="height: 780px;">
              <div class="blook1">
                  <span>区块详情</span>
              </div>
              <div id="zhao">
               <!-- 查询区块详情 --> 
                 <ul>
                     <li>blockHash:</li><span class="lii1"></span><br />
                     <li style="top: 30px;">blockNumber:</li><span style="top: 30px;" class="lii2"></span><br />
                     <li style="top: 60px;">from:</li><span style="top: 60px;" class="lii3"></span><br />
                     <li style="top: 90px;">to:</li><span style="top: 90px;" class="lii4"></span><br />
                     <li style="top: 120px;">gas:</li><span style="top: 120px;" class="lii5"></span><br />
                     <li style="top: 150px;">gasPrice:</li><span style="top: 150px;" class="lii6"></span><br />
                     <li style="top: 180px;">hash:</li><span style="top: 180px;" class="lii7"></span><br />
                     <li style="top: 210px;">nonce:</li><span style="top: 210px;" class="lii8"></span><br />
                     <li style="top: 240px;">r:</li><span style="top: 240px;" class="lii9"></span><br />
                     <li style="top: 270px;">s:</li><span style="top: 270px;" class="lii10"></span><br />
                     <li style="top: 300px;">transactionIndex:</li><span style="top: 300px;" class="lii11"></span><br />
                     <li style="top: 330px;">v:</li><span style="top: 330px;" class="lii12"></span><br />
                     <li style="top: 360px;">value:</li><span style="top: 360px;" class="lii13"></span><br />
                     <li style="top: 390px;">input:</li><input class="lii14" /> 
                 </ul>
              </div>
     </div>        
     </div>
     </div>
    </div>
</body>
    <script type="text/javascript" src='js/jquery-3.1.1.js'></script>
    <script type="text/javascript" src='js/jquery-3.1.1.min.js'></script>
    <script type="text/javascript" src='js/boole.js'></script>
    <script src="./node_modules/web3/dist/web3.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript">
         if (typeof web3 !== 'undefined') {
            web3 = new Web3(web3.currentProvider);
        } else {
            // set the provider you want from Web3.providers
            web3 = new Web3(new Web3.providers.HttpProvider("http://127.0.0.1:8545"));
        }
         for(var i=0;i<5;i++){
          var aa = $('#topright ul').eq(i).find('li span').eq(0).text();
           var bb = web3.eth.getTransaction(aa);
           var ab = bb.from;
           var ac = bb.to;
           var ad = bb.value.c;
           var ae = bb.nonce;
           $('#topright ul').eq(i).find('li span').eq(1).text(ab);
           $('#topright ul').eq(i).find('li span').eq(2).text(ac);
           $('#topright ul').eq(i).find('li span').eq(3).text(ae);     
         }
    </script>
</html>