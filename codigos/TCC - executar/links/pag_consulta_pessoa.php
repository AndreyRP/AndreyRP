<?php
session_start();
include_once "../php/conexao.php";

$pdo = conectar();
//traz dados

$id = $_GET['id'];
$sql = "SELECT * FROM tb_usuarios WHERE id_usuario = :id";
$stmc = $pdo -> prepare($sql);
$stmc -> bindParam(':id', $id);
$stmc -> execute();
//buscando todas as linhas da tabela
$chave = $stmc -> fetch(PDO::FETCH_OBJ);


$id_cdd = $chave -> fk_cidade;
$sqle = "SELECT * FROM tb_cidades WHERE id = $id_cdd";
$stmce = $pdo -> prepare($sqle);
$stmce -> execute();
$cidade = $stmce ->fetch(PDO::FETCH_OBJ);

?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/cabecalho_login.css">
    <link rel="stylesheet" href="../css/cadastro.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>

    <header class="cabecalho">
        <img src="../imgs/logo.png" alt="Logo" class="cabecalho-logo">
        <p class="nome_pagina">Livraria Online</p>
    </header>

    <main class="">
        <form action="" method="post" enctype=multipart/form-data class="formulario">
            <p class="titulo_cadastro">cadastro de usuario</p>

            <label class="label" for="nome_usuario">nome completo:</label>
            <input class="input" id="nome_usuario" name="nome_usuario" type="text" value="<?php echo $chave -> nome_usuario; ?>" readonly>

            <label class="label" for="email_usuario">e-mail:</label>
            <input class="input" id="email_usuario" name="email_usuario" type="text" value="<?php echo $chave -> email_usuario; ?>" readonly>

            <label class="label" for="data">data nascimento:</label>
            <input class="input" id="data" name="data" type="date" value="<?php echo mybr($chave -> data_nasc); ?>" readonly>

            <label class="label" for="cpf_usuario">cpf:</label>
            <input class="input" id="cpf_usuario" name="cpf_usuario" type="text" value="<?php echo $chave -> cpf_usuario; ?>" readonly>

            <label class="label" for="rg_usuario">rg:</label>
            <input class="input" id="rg_usuario" name="rg_usuario" type="text" value="<?php echo $chave -> rg_usuario; ?>" readonly>

            <label class="label" for="telefone_usuario">telefone:</label>
            <input class="input" id="telefone_usuario" name="telefone_usuario" type="text" value="<?php echo $chave -> telefone_usuario; ?>" readonly>

            <label class="label" for="cep_usuario">cep:</label>
            <input class="input" id="cep_usuario" name="cep_usuario" type="text" value="<?php echo $chave -> cep_usuario; ?>" readonly>
            
            <label class="label" for="estado_usuario">estado:</label>
            <input class="input" id="cep_usuario" name="cep_usuario" type="text" value="<?php echo $cidade -> estado; ?>" readonly>

            <label class="label" for="estado_usuario">cidade:</label>
            <input class="input" id="cep_usuario" name="cep_usuario" type="text" value="<?php echo $cidade -> nome; ?>" readonly>

            <label class="label" for="bairro_usuario">bairro:</label>
            <input class="input" id="bairro_usuario" name="bairro_usuario" type="text" value="<?php echo $chave -> bairro_usuario; ?>" readonly>

            <label class="label" for="rua_usuario">rua:</label>
            <input class="input" id="rua_usuario" name="rua_usuario" type="text" value="<?php echo $chave -> rua_usuario; ?>" readonly>

            <label class="label" for="numero_usuario">numero da casa:</label>
            <input class="input" id="numero_usuario" name="numero_usuario" type="text" value="<?php echo $chave -> numero_casa_usuario; ?>" readonly>

            <label class="label" for="complemento">complemento:</label>
            <input class="input text_area" name="complemento" id="complemento" type="text" value="<?php echo $chave -> complemento;?>" readonly >

            <label class="label" for="senha_usuario">senha:</label>
            <input class="input" id="senha_usuario" name="senha_usuario" type="password" value="<?php echo $chave -> senha_usuario; ?>" readonly>

            <label class="label" for="ativo">ativo:</label>
            <input class="input" id="cep_usuario" name="cep_usuario" type="text" value="<?php echo $chave -> ativo; ?>" readonly>

            <label class="label" for="tipo">tipo:</label>
            <input class="input" id="cep_usuario" name="cep_usuario" type="text" value="<?php echo $chave -> tipo_usuario; ?>" readonly>

            <a href="./cadastro_pessoa_alterar.php?id= <?php echo $chave -> id_usuario?>">alterar</a> 
            <a href="./cadastro_pessoa_excluir.php?id= <?php echo $chave -> id_usuario?>">excluir</a>
        </form>
    </main>

</body>
</html>