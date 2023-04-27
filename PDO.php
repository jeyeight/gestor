<?php
//Conexão realizada com a base de dada, estou usando o Workbench como 
$PDO = new PDO("mysql:dbname=teste;host=localhost","root","");
$sql = $PDO->query("SELECT * FROM teste.pessoas;");
$dados = $sql->fetchAll(PDO::FETCH_ASSOC);
print_r( $dados);
?>