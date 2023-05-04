<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>Gestor</title>
</head>
<body>
    <div class="row">
        <div class="container d-flex" id="header">
            <a href="index.php" class="btn btn-primary col rounded-0 header">Início</a>
            <form action="index.php">            <input type="text" name="filtro" value="<?= isset($_GET['filtro']) ? $_GET['filtro'] : '' ?>" placeholder="Pesquise (Enter)" <?= isset($_GET['edicao']) ? 'disabled' : '' ?> class="input-group-text col rounded-0"></form>

            <a href="addedit.php?edicao=false" class="btn btn-primary col rounded-0 header">Adicionar</a>
        </div>
    </div>
    <script src="bootstrap/bootstrap.js"></script>
</body>
</html>