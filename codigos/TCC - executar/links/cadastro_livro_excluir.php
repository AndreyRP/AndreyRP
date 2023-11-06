<?php
include_once "../php/conexao.php";

$pdo = conectar();

$id = $_GET['id'];
$sql = "SELECT * FROM tb_livros WHERE id_livro = :id";
$stmc = $pdo -> prepare($sql);
$stmc -> bindParam(':id', $id);
$stmc -> execute();

if($stmc->rowCount() > 0) {
    $sqlex = "DELETE FROM tb_livros WHERE id_livro = $id";
    $stmex = $pdo -> query($sqlex);
    echo 'livro excluido com sucesso';
}else{
    echo 'livro nao encontrado';
}

header('location: adm_pagina.php');
?> 
