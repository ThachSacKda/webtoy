<?php
class Connect{
    public $sever;
    public $user;
    public $password;
    public $dbname;
    public function __construct()
    {
        $this->server = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->dbName = "asm_copy";
    }

    //Option 1: mysqli
    function connectToMySQL():mysqli{
        $conn_my = new mysqli($this->sever, $this->user,$this->password,
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
            ("mysql:host=$this->sever;
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
?>