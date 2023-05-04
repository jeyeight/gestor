<?php
require('Produto.php');
$classe = new Produto();
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);
$classe->delete($id);
header("location: index.php");
exit();
?>