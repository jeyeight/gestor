<?php
//Substitua $dbname, $host, $user e $password pelas informações relativas ao seu banco de dados mysql
class CONEXAO{

    private $dbname = 'sys';
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
