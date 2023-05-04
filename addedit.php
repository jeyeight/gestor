<?php 
include_once("cabecalho.php"); 
include_once("Produto.php");

$classe = new Produto();
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);
if(!is_null($id)){
    $info = $classe->info_prod($id);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?= $GET['edicao'] ? 'Editar' : 'Adicionar' ?></title>
</head>
<body>
    <div class="container">
        <form action="formaccept.php" method="POST">
            <input type="hidden" name="id" value="<?= isset($info) ? $info['id'] : '' ?>">
                <div class ="container">
                    <div class ="container d-flex flex-start">
                        <div class="container d-flex text-center form-group col-4">
                            <label class="form-label">
                                Nome do Produto:
                                <input type="text" name="nomeProduto" placeholder="Nome"  value = "<?= isset($info) ? $info['nome'] : '' ?>" class="input-group-text col" required  >
                            </label>
                        </div>
                        <div class="container d-flex text-center form-group col-4">
                                <label class="form-label">
                                    Preço do Produto (Unidade):
                                    <input type="number" name="precoProduto" placeholder="Preço" value ="<?= isset($info) ? $info['preco'] : '' ?>" class="input-group-text col"  step="0.01" required >
                                </label>
                            </div>
                        
                    </div>
                    <div class ="container d-flex flex-start">
                            <div class="container d-flex text-center form-group col-4">
                                <label>
                                    Quantidade mínima:
                                    <input type="number" name="minimoProduto" placeholder="N°" value = "<?= isset($info) ? $info['estoque_minimo'] : '' ?>" min="0" class="input-group-text col"  required >
                                </label>
                            </div>
                            <div class="container d-flex text-center form-group col-4">
                            <label>
                                Quantidade disponível:
                                <input type="number" name="nmrProduto" placeholder="N°" value = "<?= isset($info) ? $info['estoque'] : '' ?>" min="0" class="input-group-text col"  required >
                            </label>
                        </div>
                            
                    </div>
                    </div>

                    <div class ="container d-flex justify-content-center col text-center form-group">
                        <div class="container col-3"></div>
                        <div class = "container d-flex justify-content-center col-6">
                            <label class="form-label">
                                Descrição/Especificações do produto:
                                <textarea maxlength="200" name="especProduto" placeholder="Descrição" id="desc" resize="none" max="100" class="input-group-text align-itens-start justify-content-end"><?= isset($info) ? $info['descricao'] : '' ?></textarea>
                            </label>
                        </div>
                        <div class="container col-3"></div>
                    </div>
                        <div class ="container d-flex justify-content-center row">
                            <button type="submit" class = "btn btn-success">Salvar</button>
                        </div>
                        <?php
                        if(isset($info['data_registro'])):
                            echo "Data de registro: ".date('H:i:s - d/m/Y',strtotime($info['data_registro']));
                        endif;
                        ?>
                    </div>
                </div>
        </form>
    </div>
</body>
</html>