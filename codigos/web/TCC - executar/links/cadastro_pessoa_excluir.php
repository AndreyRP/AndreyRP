<?php
include_once "../php/conexao.php";

$pdo = conectar();

$id = $_GET['id'];
$sql = "SELECT * FROM tb_usuarios WHERE id_usuario = :id";
$stmc = $pdo -> prepare($sql);
$stmc -> bindParam(':id', $id);
$stmc -> execute();

if($stmc->rowCount() > 0) {
    $sqlex = "DELETE FROM tb_usuarios WHERE id_usuario = $id";
    $stmex = $pdo -> query($sqlex);
    echo 'usuario excluido com sucesso';
}else{
    echo 'usuario nao encontrado';
}

header('location: pag_consulta_pessoa.php');
?> 