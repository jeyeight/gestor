<?php
require_once("pdo.php");
$conexao = new CONEXAO();

$id = filter_input(INPUT_POST,"id",FILTER_SANITIZE_SPECIAL_CHARS);
$nome = filter_input(INPUT_POST, "nomeProduto", FILTER_SANITIZE_SPECIAL_CHARS);
$estoque = filter_input(INPUT_POST, "nmrProduto", FILTER_SANITIZE_SPECIAL_CHARS);
$preco = filter_input(INPUT_POST, "precoProduto", FILTER_SANITIZE_SPECIAL_CHARS);
$desc = filter_input(INPUT_POST, "especProduto", FILTER_SANITIZE_SPECIAL_CHARS);
date_default_timezone_set('America/Sao_Paulo');
$data = time();
$data = date('d/m/Y H:i:s', $data);

if($id):
    $qry = "UPDATE produtos SET nome = :nome, estoque=:estoque, preco = :preco, descricao = :descricao  WHERE id = :id";
    $sql = $conexao->conexao()->prepare($qry);
    $sql->bindValue(":id",$id);
else:
    $qry = "INSERT INTO produtos (nome, estoque, preco,descricao,data_registro) VALUES (:nome,:estoque,:preco,:descricao,:data)";
    $sql = $conexao->conexao()->prepare($qry);
    $sql->bindValue(":data",$data);
endif;

$sql->bindValue(":nome",$nome);
$sql->bindValue(":estoque",$estoque);
$sql->bindValue(":preco",$preco);
$sql->bindValue(":descricao",$desc);
$sql->execute();

header("location: index.php");
exit();
?>