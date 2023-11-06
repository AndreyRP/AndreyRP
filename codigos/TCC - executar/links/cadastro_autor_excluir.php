<?php
include_once "../php/conexao.php";

$pdo = conectar();

$id = $_GET['id'];
$sql = "SELECT * FROM tb_autores WHERE id_autor = :id";
$stmc = $pdo -> prepare($sql);
$stmc -> bindParam(':id', $id);
$stmc -> execute();

if($stmc->rowCount() > 0) {
    $sqlex = "DELETE FROM tb_autores WHERE id_autor = $id";
    $stmex = $pdo -> query($sqlex);
    echo 'autor excluido com sucesso';
}else{
    echo 'autor nao encontrado';
}
header('location: adm_pagina.php');
?> 
