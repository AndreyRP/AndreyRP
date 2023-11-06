<?php
include_once "../php/conexao.php";

$pdo = conectar();

$id = $_GET['id'];
$sql = "SELECT * FROM tb_editoras WHERE id_editora = :id";
$stmc = $pdo -> prepare($sql);
$stmc -> bindParam(':id', $id);
$stmc -> execute();

if($stmc->rowCount() > 0) {
    $sqlex = "DELETE FROM tb_editoras WHERE id_editora = $id";
    $stmex = $pdo -> query($sqlex);
    echo 'editora excluido com sucesso';
}else{
    echo 'editora nao encontrado';
}

header('location: adm_pagina.php');
?> 