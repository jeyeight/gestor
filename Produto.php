<?php
require_once('PDO.php');
class Produto{
    public $id;

    public function listagem(){
        $sql = $PDO ->query("SELECT * FROM teste.produtos WHERE id = {$id}")
    }
}
?>