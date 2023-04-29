<?php
require_once('PDO.php');
$nome = filter_input(INPUT_GET, "nomeProduto", FILTER_SANITIZE_SPECIAL_CHARS);
$estoque = filter_input(INPUT_GET, "nmrProduto", FILTER_SANITIZE_SPECIAL_CHARS);
$preco = filter_input(INPUT_GET, "precoProduto", FILTER_SANITIZE_SPECIAL_CHARS);
$desc = filter_input(INPUT_GET, "especProduto", FILTER_SANITIZE_SPECIAL_CHARS);
$data = DateTime::createFromFormat('d/m/Y', date('d/m/Y'))->format('Y-m-d');


$sql = $PDO -> prepare("INSERT INTO produtos (nome,estoque,preco,data_registro) VALUES (:nome,:estoque,:preco,:data)");
$sql ->bindValue(":nome",$nome);
$sql ->bindValue(":estoque",$estoque);
$sql ->bindValue(":preco",$preco);
$sql ->bindValue(":data",$data);
$sql -> execute();
header("location: index.php");
exit();
?>