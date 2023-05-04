<?php 
include_once("cabecalho.php"); 
include_once("Produto.php"); 

$classe   = new Produto();
$filtro   = filter_input(INPUT_GET, "filtro", FILTER_SANITIZE_SPECIAL_CHARS);
$listagem = $classe->listagem($filtro);
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
    if($classe->nmr_produtos() > 0):
    ?>
    <div class="ml-3">
        <p>N° de produtos cadastrados: <?=$classe->nmr_produtos($filtro);?></p>
    </div>
    <?php
    endif;
    ?>
<?php
foreach($listagem as $lista):
    if(!is_null($lista)):
    ?>
    <div class="container col item">
        <div class="container col">
            <?php
            if($lista['estoque'] <= $lista['estoque_minimo']):
                echo "<h2 style='color: red;'>". $lista['nome']. " <img class = 'bi bi-exclamation-triangle text-warning' src='bootstrap/icons/exclamation-triangle.svg' alt='Estoque baixo' title='Estoque baixo'></h2>";
            else:
                echo "<h2>". $lista['nome']. "</h2>";
            endif;
            ?>
        
            <div class="row">
                <div class="col">
                    <p>Estoque atual: <?=$lista['estoque']?></p>
                </div>
                <div class="col">
                    <p>Preço: R$<?=number_format($lista['preco'], 2, ',', '.');?></p>
                </div>
                <?php if($lista['descricao']):?>
                <div class="col">
                    <p>Descrição: <?=$lista['descricao']?></p>
                </div>
                <?php endif;?>
            </div class="d-flex mt-3">
                <a href="addedit?id=<?=$lista['id']?>&edicao=true">
                    <img src="bootstrap/icons/pencil-square.svg" alt="Editar" title="Editar">
                </a>
                <a href="delete?id=<?=$lista['id']?>">
                    <img src="bootstrap/icons/trash3.svg" alt="Excluir" title="Excluir">
                </a>
                <br>
                <?= $lista['data_alteracao'] != '0000-00-00 00:00:00' ? 'Última alteração: '.date('H:i:s - d/m/Y',strtotime($lista['data_alteracao'])) : ''; ?>
                <hr>
            </div>
    </div>
    <?php
    endif;
endforeach;
?>
  
</body>
</html>