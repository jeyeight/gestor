<?php
require_once('pdo.php');
class Produto extends CONEXAO{
    public $id ;
    public function listagem(){

        $sql = "SELECT * FROM produtos";
        $stmt = $this->conexao()->query($sql);
        $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lista;

    }
    public function info_prod($idProduto){
        $sql = "SELECT * FROM produtos WHERE id = $idProduto";
        $stmt = $this->conexao()->query($sql);
        $info_prod = $stmt->fetch(PDO::FETCH_ASSOC);
        return $info_prod;
    }
    public function delete($idProduto) {
        $sql = "DELETE FROM produtos WHERE id = ?";
        $stmt = $this->conexao()->prepare($sql);
        $stmt->execute([$idProduto]);
    }
    public function nmr_produtos() {
        $sql = "SELECT COUNT(*) FROM produtos";
        $stmt = $this->conexao()->query($sql);
        $nmr = $stmt->fetchColumn();
        return $nmr;
    }

}
?>