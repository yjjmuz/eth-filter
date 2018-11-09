<?php
header('content-type:text/html;charset=utf-8');

class ConnectMysqli{
    //私有的属性
    private static $dbcon=false;
    private $host;
    private $port;
    private $user;
    private $pass;
    private $db;
    private $charset;
    private $link;
    //私有的构造方法
    public function __construct(){
        $this->host ='192.168.1.51';
        $this->port = '3306';
        $this->user = 'root';
        $this->pass = 'root';
        $this->db = 'app';
        $this->charset='utf8';
        //连接数据库
        $this->db_connect();
        //设置字符集
        $this->db_charset();
    }
    //连接数据库
    private function db_connect(){
        $this->link=mysqli_connect($this->host,$this->user,$this->pass,$this->db);
        if(!$this->link){
            echo "数据库连接失败<br>";
            echo "错误编码".mysqli_errno($this->link)."<br>";
            echo "错误信息".mysqli_error($this->link)."<br>";
            exit;
        }
    }
    //设置字符集
    private function db_charset(){
        mysqli_set_charset($this->link,$this->charset);
    }
    //私有的克隆
    public static function getIntance(){
        if(self::$dbcon==false){
            self::$dbcon=new self;
        }
        return self::$dbcon;
    }
    //公用的静态方法
    public function p($arr){
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }
    //执行sql语句的方法
    public function v($arr){
        echo "<pre>";
        var_dump($arr);
        echo "</pre>";
    }

    public function query($sql){
        $res=mysqli_query($this->link,$sql);
        if(!$res){
            echo "sql语句执行失败<br>";
            echo "错误编码是".mysqli_errno($this->link)."<br>";
            echo "错误信息是".mysqli_error($this->link)."<br>";
        }
        return $res;
    }
    /**
     * 查询某个字段
     *$query="SELECT * FROM `person` WHERE `age`>20 AND `address`='北京'"
     * getAllData('person',array("`age`>20","`address`='北京'"));
     */
    public function getAllData($list,$conditionArr){
        $tempStr='';
        $a=count($conditionArr);
        if (!$a){
            //当条件值为空时查询整个表
            $tempStr=' 1';

        }
        else {
            foreach ($conditionArr as $str) {
                $a = $a - 1;
                if (!$a) {
                    $tempStr = $tempStr . $str;
                } else {
                    $tempStr = $tempStr . $str . ' AND ';
                }
            }
        }
        $sql="SELECT * FROM `{$list}` WHERE {$tempStr}";
        $query=$this->query($sql);
        return mysqli_fetch_all($query,1);
    }
    /**
     * 增加数据的方法
     *$query=INSERT INTO `person`(`name`, `age`, `address`) VALUES ('','','')
     * insert('person',array('name','age','address'),array('张三',55,'山西'))
     */
    public function insert($list,$keyArr,$valueArr){
        $keyStr='';
        $valueStr='';
        $a=count($keyArr);
        $b=count($valueArr);
        foreach ($keyArr as $str) {
            $a = $a - 1;
            if ($a) {
                $keyStr =$keyStr. "`{$str}`" . ',';
            }
            else{
                $keyStr =$keyStr. "`{$str}`";
            }
        }
        foreach ($valueArr as $str) {
            $b = $b - 1;
            if ($b) {
                $valueStr =$valueStr. "'{$str}'". ',';
            }
            else{
                $valueStr =$valueStr. "'{$str}'";
            }
        }
        $sql="INSERT INTO `{$list}`({$keyStr}) VALUES ($valueStr)";
        $query=$this->query($sql);
    }
    /*
     * 删除一条数据方法
     *$query= DELETE FROM `person` WHERE `name`='吴'
     * deleteAll('person',array("`address`='北京'","`age`>20"))
     */
    public function deleteAll($list,$conditionArr){
        $tempStr='';
        $a=count($conditionArr);
        foreach ($conditionArr as $str){
            $a=$a-1;
            if (!$a){
                $tempStr=$tempStr.$str;

            }else{
                $tempStr=$tempStr.$str.' AND ';
            }
        }
        $sql=" DELETE FROM `{$list}` WHERE {$tempStr}";
       $query=$this->query($sql);
    }
   /*
    * 修改数据的方法
    *
    *$query= "UPDATE `person` SET `age`='34',`address`='天津' WHERE `name`='吴皇'"
    *update('person',array("`age`=20","`address`='福建'"),array("`name`='吴皇'"))
    * */
    public function update($list,$resArr,$conArr){
        $resStr='';
        $conStr='';
        $a=count($resArr);
        $b=count($conArr);
        foreach ($resArr as $str) {
            $a = $a - 1;
            if ($a) {
                $resStr =$resStr.$str.',';
            }
            else{
                $resStr =$resStr.$str;
            }
        }
        foreach ($conArr as $str) {
            $b = $b - 1;
            if ($b) {
                $conStr =$conStr.$str.' AND ';
            }
            else {
                $conStr = $conStr.$str;
            }

        }
        $sql= "UPDATE `{$list}` SET {$resStr} WHERE {$conStr}";
        $query= $this->query($sql);
    }


    private function __clone(){
        die('clone is not allowed');
    }

}

?>
