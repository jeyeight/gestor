<?php
require_once("PDO.php");
$nome = filter_input(INPUT_GET, "nomeProduto", FILTER_SANITIZE_SPECIAL_CHARS);
$estoque = filter_input(INPUT_GET, "nmrProduto", FILTER_SANITIZE_SPECIAL_CHARS);
$preco = filter_input(INPUT_GET, "precoProduto", FILTER_SANITIZE_SPECIAL_CHARS);
$desc = filter_input(INPUT_GET, "especProduto", FILTER_SANITIZE_SPECIAL_CHARS);
date_default_timezone_set('America/Sao_Paulo');
$data = time();
$data = date('d/m/Y H:i:s', $data);

$conexao = new CONEXAO();
$sql = $conexao->conexao()->prepare("INSERT INTO produtos (nome, estoque, preco,data_registro) VALUES (:nome,:estoque,:preco,:data)");
$sql->bindValue(":nome",$nome);
$sql->bindValue(":estoque",$estoque);
$sql->bindValue(":preco",$preco);
$sql->bindValue(":data",$data);
$sql->execute();
header("location: index.php");
exit();
?>