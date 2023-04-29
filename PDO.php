<?php
//Conexão realizada com a base de dada, estou usando o Workbench como 
class CONEXAO{

    private $dbname = 'teste';
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    public $PDO;
    public function __construct(){
        $this->PDO = new PDO("mysql:dbname={$this->dbname};host={$this->host}","{$this->user}","{$this->password}");
    }
}
?>