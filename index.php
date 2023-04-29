<?php 
include_once("cabecalho.php"); 
include_once("Produto.php"); 
$classe = new Produto();
$listagem = $classe->listagem();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gerenciador de Estoque</title>
</head>
<body>
<?php
foreach($listagem as $lista):
    if(!is_null($lista)):
?>
<div class="container row">
    <h2><?=$lista['nome']?></h2>
    <p>Estoque atual: <?=$lista['estoque']?></p>
</div>
<?php
    endif;
endforeach;
?>
  
</body>
</html>