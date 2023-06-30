<?php
class Connect{
    public $server;
    public $user;
    public $password;
    public $dbName;
    public function __construct()
    {
        $this->server = "u6354r3es4optspf.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->user = "kn2uic7cs9wlz2pu";
        $this->password = "fs36y9agr7eilo8b";
        $this->dbName = "zu81253m89siyepi";
    }

    //Option 1: mysqli
    function connectToMySQL():mysqli{
        $conn_my = new mysqli($this->server, $this->user,$this->password,
        $this->dbName);
        if($conn_my->connect_error){
            die("Failed".
            $conn_my->connect_error);
        }else{
           // echo "Connect from mysqli";
        }
        return $conn_my;
    }
    //Option 2: PDO
    function connecToPDO(): PDO{
        try{
            $conn_pdo = new PDO
            ("mysql:host=$this->server;
            dbname=$this->dbName", $this->user,
            $this->password);
           // echo "Connect from PDO";
        }catch(PDOException $e) {
            die("Failed $e");
        }
        return $conn_pdo;
    }

}
$c = new Connect();
//$c->connecToPDO();
//$c->connectToMySQL();
