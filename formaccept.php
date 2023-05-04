<?php
require_once("Conexao.php");
$conexao = new CONEXAO();

$id = filter_input(INPUT_POST,"id",FILTER_SANITIZE_SPECIAL_CHARS);
$nome = filter_input(INPUT_POST, "nomeProduto", FILTER_SANITIZE_SPECIAL_CHARS);
$estoque = filter_input(INPUT_POST, "nmrProduto", FILTER_SANITIZE_SPECIAL_CHARS);
$estoque_minimo = filter_input(INPUT_POST, "minimoProduto", FILTER_SANITIZE_SPECIAL_CHARS);
$preco = filter_input(INPUT_POST, "precoProduto", FILTER_SANITIZE_SPECIAL_CHARS);
$desc = filter_input(INPUT_POST, "especProduto", FILTER_SANITIZE_SPECIAL_CHARS);
date_default_timezone_set('America/Sao_Paulo');
$data = date('Y-m-d H:i:s', time());;

if($id):
    $qry = "UPDATE produtos SET nome = :nome, estoque=:estoque,estoque_minimo=:estoque_minimo, preco = :preco, descricao = :descricao, data_alteracao = :data  WHERE id = :id";
    $sql = $conexao->conexao()->prepare($qry);
    $sql->bindValue(":id",$id);
    $sql->bindValue(":data",$data);
else:
    $qry = "INSERT INTO produtos (nome, estoque,estoque_minimo, preco,descricao,data_registro) VALUES (:nome,:estoque,:estoque_minimo,:preco,:descricao,:data)";
    $sql = $conexao->conexao()->prepare($qry);
    $sql->bindValue(":data",$data);
endif;

$sql->bindValue(":nome",$nome);
$sql->bindValue(":estoque",$estoque);
$sql->bindValue(":estoque_minimo",$estoque_minimo);
$sql->bindValue(":preco",$preco);
$sql->bindValue(":descricao",$desc);
$sql->execute();
    
header("location: index.php");
exit();
?>