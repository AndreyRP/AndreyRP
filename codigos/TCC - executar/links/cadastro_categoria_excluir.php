<?php
include_once "../php/conexao.php";

$pdo = conectar();

$id = $_GET['id'];
$sql = "SELECT * FROM tb_categorias WHERE id_categoria = :id";
$stmc = $pdo -> prepare($sql);
$stmc -> bindParam(':id', $id);
$stmc -> execute();

if($stmc->rowCount() > 0) {
    $sqlex = "DELETE FROM tb_categorias WHERE id_categoria = $id";
    $stmex = $pdo -> query($sqlex);
    echo 'categoria excluido com sucesso';
}else{
    echo 'categoria nao encontrado';
}

header('location: adm_pagina.php');
?> 