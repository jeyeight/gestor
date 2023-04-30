<?php 
include_once("cabecalho.php"); 
include_once("Produto.php");
$classe = new Produto();
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);
$edicao = !is_null($id);
if($edicao){
    $info = $classe->info_prod($id);
    $info = $info[0];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title></title>
</head>
<body>
    <div class="container">
        <div class="progress" role="progressbar" aria-label="Example with label" aria-valuemin="0" aria-valuemax="100">
        <div div class="progress-bar"></div>
        </div>
        <form action="formaccept.php" method="get">
                <div class ="container d-flex justify-content-start row">
                    <div class="container d-flex justify-content-start col Order-first">
                        <div class="container d-flex justify-content-start text-center form-group" >
                            <label class="form-label">
                                Nome do Produto:
                                <input type="text" name="nomeProduto" placeholder="Nome" value = <?php $edicao ? $info[0]['nome'] : '' ?> class="input-group-text col" required >
                            </label>
                        </div>
                        <div class="container d-flex justify-content-start text-center form-group">
                            <label>
                                Quantidade disponível:
                            <input type="number" name="nmrProduto" placeholder="N°" min="0" class="input-group-text col"  required >
                            </label>
                        </div>
                        <div class="container d-flex justify-content-start text-center form-group">
                            <label class="form-label">
                                Preço do Produto (Unidade):
                                <input type="number" name="precoProduto" placeholder="Preço" class="input-group-text col"  step="0.01" required >
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class ="container d-flex justify-content-center col text-center form-group">
                        <div class=""></div>
                            <div class = "container d-flex col-12">
                                <label class="form-label">
                                    Descrição/Especificações do produto:
                                        <textarea name="especProduto" placeholder="Descrição" id="desc" class="input-group-text align-itens-start justify-content-end"></textarea>
                                    </label>
                            </div>
                        <div class =""></div>
                        </div>
                        <div class ="container d-flex justify-content-center row">
                            <button type="submit" class = "btn btn-success">Salvar</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</body>
</html>