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
    <div class="ml-3">
        <p>N° de produtos cadastrados: <?=$classe->nmr_produtos();?></p>
    </div>
<?php
foreach($listagem as $lista):
    if(!is_null($lista)):
    ?>
    <div class="container col">
        <div class="container col">
            <h2><?=$lista['nome']?></h2>
            <div class="row">
                <div class="col">
                    <p>Estoque atual: <?=$lista['estoque']?></p>
                </div>
                <div class="col">
                    <p>Preço: <?=$lista['preco']?></p>
                </div>
                <?php if($lista['descricao']):?>
                <div class="col">
                    <p>Descrição: <?=$lista['descricao']?></p>
                </div>
                <?php endif;?>
            </div class="d-flex mt-3">
                <a href="delete?id=<?=$lista['id']?>">
                    <img src="bootstrap/icons/trash3.svg" alt="Excluir" title="Excluir">
                </a>
                <a href="addedit?id=<?=$lista['id']?>">
                    <img src="bootstrap/icons/pencil-square.svg" alt="Editar" title="Editar">
                </a>
                <hr>
            </div>
    </div>
    <?php
    endif;
endforeach;
?>
  
</body>
</html>