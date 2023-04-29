<?php
require_once('PDO.php');
class Produto extends CONEXAO{
    public $id ;

    public function listagem(){
        $sql = "SELECT * FROM produtos";
        $lista = $this->PDO ->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $lista;

    }

    // public function filtro(){
    //     $filtragem = "WHERE nome LIKE".$filtros;
    //     return fil
    // }

}
?>