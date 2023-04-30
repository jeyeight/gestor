<?php
//Conexão realizada com a base de dada, estou usando o Workbench como 
class CONEXAO{

    private $dbname = 'teste';
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $conex;
    
     public function conexao() {
        $this->conex = null;

        try {
          $this->conex = new PDO("mysql:dbname={$this->dbname};host={$this->host}","{$this->user}","{$this->password}");
          $this->conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
          echo 'Erro de conexão: ' . $e->getMessage();
        }
    
        return $this->conex;
      }
}

?>