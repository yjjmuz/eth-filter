$(document).ready(function(){
    if (typeof web3 !== 'undefined') {
            web3 = new Web3(web3.currentProvider);
        } else {
            // set the provider you want from Web3.providers
            web3 = new Web3(new Web3.providers.HttpProvider("http://127.0.0.1:8545"));
        }
         // web3 = new Web3(new Web3.providers.HttpProvider("http://127.0.0.1:8545"));
         console.log(web3)
         
         var sas = web3.sha3("addRoomToStore(string,string,uint256,string,string)");
         console.log(sas);
           var sha3 = sas.substr(0, 10);
           console.log(web3);
        web3.eth.defaultAccount = web3.eth.accounts[0];
        console.log(web3.eth.defaultAccount)
        var ccc = web3.personal;
        var infoContract = web3.eth.contract([
    {
        "constant": true,
        "inputs": [
            {
                "name": "names",
                "type": "string"
            }
        ],
        "name": "vityveiw",
        "outputs": [
            {
                "name": "",
                "type": "bool"
            }
        ],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
    },
    {
        "constant": true,
        "inputs": [],
        "name": "roomIndex",
        "outputs": [
            {
                "name": "",
                "type": "uint256"
            }
        ],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
    },
    {
        "constant": true,
        "inputs": [
            {
                "name": "id",
                "type": "string"
            }
        ],
        "name": "getRoom",
        "outputs": [
            {
                "name": "",
                "type": "string"
            },
            {
                "name": "",
                "type": "string"
            },
            {
                "name": "",
                "type": "uint256"
            },
            {
                "name": "",
                "type": "string"
            },
            {
                "name": "",
                "type": "string"
            }
        ],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
    },
    {
        "constant": false,
        "inputs": [
            {
                "name": "jydh",
                "type": "string"
            },
            {
                "name": "name",
                "type": "string"
            },
            {
                "name": "add",
                "type": "uint256"
            },
            {
                "name": "je",
                "type": "string"
            },
            {
                "name": "jie",
                "type": "string"
            }
        ],
        "name": "addRoomToStore",
        "outputs": [],
        "payable": false,
        "stateMutability": "nonpayable",
        "type": "function"
    },
    {
        "inputs": [],
        "payable": false,
        "stateMutability": "nonpayable",
        "type": "constructor"
    }
]);

         var info = infoContract.at('0xdda950fd71bc04d2f143d9ca116e13175de0c87e');
        console.log(info);

        $('#btn').click(function(){
            var a = $('#inp').val();
            if(a){
            var b = info._eth.getTransaction(a);
            console.log(b);
            $('.content').eq(2).show(200).siblings().hide(200);
            $('.lii1').html(b.blockHash);
            $('.lii2').html(b.blockNumber);
            $('.lii3').html(b.from);
            $('.lii4').html(b.to);
            $('.lii5').html(b.gas);
            $('.lii6').html(b.gasPrice.c);
            $('.lii7').html(b.hash);
            $('.lii8').html(b.nonce);
            $('.lii9').html(b.r);
            $('.lii10').html(b.s);
            $('.lii11').html(b.transactionIndex);
            $('.lii12').html(b.v);
            $('.lii13').html(b.value.c);
            $('.lii14').val(b.input);
            }else{
                alert('内容不能为空！')
            }   
        });
        //区块高度
        var icon = web3.eth.blockNumber;
        $('#icon1').text(icon);

        //返回区块详情
        var main = info._eth.getBlock;

        //返回指定区块数量
        var biu = info._eth.getBlockTransactionCount;

        //将时间戳转换成正常时间
        function timestampToTime(timestamp) {
        var date = new Date(timestamp * 1000);//时间戳为10位需*1000，时间戳为13位的话不需乘1000
        var Y = date.getFullYear() + '-';
        var M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
        var D = date.getDate() + ' ';
        var h = date.getHours() + ':';
        var m = date.getMinutes() + ':';
        var s = date.getSeconds();
        return Y+M+D+h+m+s;
    }
        console.log(timestampToTime(info._eth.getBlock(icon).timestamp))
         //将时间戳转换成正常时间  
         
         //左边区块转换  
         console.log(main(icon).hash);
         $('.block1').text(main(icon).hash);
         $('.block11').text(biu(icon));
         $('.block111').text(timestampToTime(info._eth.getBlock(icon).timestamp));
         $('.block2').text(main(icon-1).hash);
         $('.block22').text(biu(icon-1));
         $('.block222').text(timestampToTime(info._eth.getBlock(icon-1).timestamp));
         $('.block3').text(main(icon-2).hash);
         $('.block33').text(biu(icon-2));
         $('.block333').text(timestampToTime(info._eth.getBlock(icon-2).timestamp));
         $('.block4').text(main(icon-3).hash);
         $('.block44').text(biu(icon-3));
         $('.block444').text(timestampToTime(info._eth.getBlock(icon-3).timestamp));
         $('.block5').text(main(icon-4).hash);
         $('.block55').text(biu(icon-4));
         $('.block555').text(timestampToTime(info._eth.getBlock(icon-4).timestamp));
         //左边区块转换
         $('.inlin1').text(icon);
         $('.inlin2').text(icon-1);
         $('.inlin3').text(icon-2);
         $('.inlin4').text(icon-3);
         $('.inlin5').text(icon-4);
         //查询区块详情
         $('#topleft ul').each(function(i){
            $('#topleft ul').eq(i).click(()=>{
          $('.content').eq(1).show(200).siblings().hide(200); 
          var index = $(this).find('li span').eq(0).text();
          var indexx = main(index);
          console.log(indexx);
          $('.net1').text(indexx.number);
          $('.net2').text(indexx.hash);
          $('.net3').text(indexx.parentHash);
          $('.net4').text(indexx.timestamp);
          $('.net5').text(indexx.transactionsRoot);
          $('.net6').text(indexx.extraData);
          $('.net7').text(indexx.gasUsed);
         });
         });
         //查询交易详情
         $('#topright ul').each(function(j){
            $('#topright ul').eq(j).click(()=>{
          $('.content').eq(2).show(200).siblings().hide(200); 
          var defaul = $(this).find('li span').eq(0).text();
          var b = info._eth.getTransaction(defaul);
            $('.lii1').html(b.blockHash);
            $('.lii2').html(b.blockNumber);
            $('.lii3').html(b.from);
            $('.lii4').html(b.to);
            $('.lii5').html(b.gas);
            $('.lii6').html(b.gasPrice.c);
            $('.lii7').html(b.hash);
            $('.lii8').html(b.nonce);
            $('.lii9').html(b.r);
            $('.lii10').html(b.s);
            $('.lii11').html(b.transactionIndex);
            $('.lii12').html(b.v);
            $('.lii13').html(b.value.c);
            $('.lii14').val(b.input);
         });
         });
         //遍历
         // for(var i=0;i<5;i++){
         //  var aa = $('#topright ul').eq(i).find('li span').eq(0).text();
         //   var bb = info._eth.getTransaction(aa);
         //   var ab = bb.from;
         //   var ac = bb.to;
         //   var ad = bb.value.c;
         //   var ae = bb.nonce;
         //   $('#topright ul').eq(i).find('li span').eq(1).text(ab);
         //   $('#topright ul').eq(i).find('li span').eq(2).text(ac);
         //   $('#topright ul').eq(i).find('li span').eq(3).text(ae);     
         // }
         //交易页面遍历
         var haxi =  $('.chuanshi ul').length;
         console.log($('.chuanshi ul').length);
         for(var i=0;i<haxi;i++){
            var zhi = $('.chuanshi ul').eq(i).find('li').eq(0).text();
          console.log(zhi);
            var qiang = info._eth.getTransaction(zhi);
            console.log(qiang);

           var cb = qiang.blockNumber;
           var cd = qiang.from;
           var ce = qiang.to;
           var cf = qiang.value.c;
           $('.chuanshi ul').eq(i).find('li').eq(1).text(cb);
           $('.chuanshi ul').eq(i).find('li').eq(3).text(cd);
           $('.chuanshi ul').eq(i).find('li').eq(4).text(ce);
           $('.chuanshi ul').eq(i).find('li').eq(5).text(cf);    

           //获取交易时间
           var date = main(qiang.blockHash).timestamp;
           var cc = timestampToTime(date);
           $('.chuanshi ul').eq(i).find('li').eq(2).text(cc);
          }
         //ajax请求
//          function loadXMLDoc(){
//     var xmlhttp;
//     if (window.XMLHttpRequest)
//     {
//         //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
//         xmlhttp=new XMLHttpRequest();
//     }
//     else
//     {
//         // IE6, IE5 浏览器执行代码
//         xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//     }
//     xmlhttp.onreadystatechange=function()
//     {
//         if (xmlhttp.readyState==4 && xmlhttp.status==200)
//         {
//             document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
//         }
//     }
//     xmlhttp.open("POST","ajax_info.txt",true);
//     xmlhttp.send();
// }
}); 
