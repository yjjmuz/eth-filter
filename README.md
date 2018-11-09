这是一个区块链浏览器的项目，是基于本地的私有链，php端只是获取了数据库内容并分配到前端

## 说明
    // include the class file
    require 'ethereum.php';
    
    // create a new object
    $ethereum = new Ethereum('127.0.0.1', 8545);
    
    // do your thing
    echo $ethereum->net_version();



## Function documentation
For documentation on functionality, see the [Ethereum RPC documentation](http://ethereum.gitbooks.io/frontier-guide/content/rpc.html)

