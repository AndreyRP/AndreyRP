<?php
session_start();
include_once "../php/conexao.php";

$pdo = conectar();
//traz dados

$id = $_GET['id'];
$sql = "SELECT * FROM tb_livros WHERE id_livro = :id";
$stmc = $pdo -> prepare($sql);
$stmc -> bindParam(':id', $id);
$stmc -> execute();
//buscando todas as linhas da tabela
$chave = $stmc -> fetch(PDO::FETCH_OBJ);


$id_ed = $chave -> fk_editora;
$sqle = "SELECT nome_editora FROM tb_editoras WHERE id_editora = $id_ed";
$stmce = $pdo -> prepare($sqle);
$stmce -> execute();
$editora_res = $stmce ->fetch(PDO::FETCH_OBJ);


$sqlv = "SELECT nome_categoria FROM tb_categorias
JOIN tb_categorias_livros
ON tb_categorias.id_categoria = tb_categorias_livros.fk_categoria
WHERE fk_livro = $id";
$stmv = $pdo -> prepare($sqlv);
$stmv -> execute();
$mult_valor = $stmv -> fetchAll(PDO::FETCH_ASSOC);

$sqla = "SELECT nome_autor FROM tb_autores
JOIN tb_autores_livros
ON tb_autores.id_autor = tb_autores_livros.fk_autor
WHERE fk_livro = $id";
$stma = $pdo -> prepare($sqla);
$stma -> execute();
$mult_valor_autor = $stma -> fetchAll(PDO::FETCH_ASSOC);
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
                <p class="titulo_cadastro">alterar cadastro livro</p>
    
                <label class="label" for="nome_livro">titulo do livro:</label>
                <input class="input" id="nome_livro" name="nome_livro_alt" type="text" value="<?php echo $chave -> titulo_livro; ?>" readonly>
    
                <label class="label" for="valor_livro">valor de venda do livro:</label>
                <input class="input" id="valor_livro" name="valor_livro" type="text" value="<?php echo $chave -> valor_livro; ?>" readonly>
    
                <label class="label" for="volume_edicao">volume da edição:</label>
                <input class="input" id="volume_edicao" name="volume_edicao" type="text" value="<?php echo $chave -> volume_livro; ?>" readonly>
 
                <label class="label" for="editora">editora:</label>       
                <input class="input" id="editora" name="" type="text" value="<?php echo $editora_res -> nome_editora;; ?>" readonly>
                
                <?php foreach($mult_valor as $valor){ ?>                   
                    <label class="label" for="categoria">categoria:</label>       
                    <input class="input" id="categoria" name="" type="text" value="<?php echo $valor['nome_categoria'];?>" readonly>
                <?php }?>

                <?php foreach($mult_valor_autor as $autor){ ?>                   
                    <label class="label" for="autor">autor:</label>       
                    <input class="input" id="autor" name="" type="text" value="<?php echo $autor['nome_autor'];?>" readonly>
                <?php }?>

                <label class="label" for="ativo">livro ativo:</label>
                <input class="input" id="ativo" name="" type="text" value="<?php echo $chave -> ativo; ?>" readonly>

                <label class="label" for="sinopse">sinopse:</label>
                <input class="input" id="sinopse" name="sinopse" value="<?php echo $chave -> sinopse; ?>" type="text" readonly>

                <label class="label" for="img_produto">imagem do livro:</label>
                <input class="input" id="img_produto" name="img_produto" value="<?php echo $chave -> imagem_livro; ?>" type="text" readonly>
                
                <a href="./cadastro_livro_alterar.php?id= <?php echo $chave -> id_livro?>">alterar</a> 
                <a href="./cadastro_livro_excluir.php?id= <?php echo $chave -> id_livro?>">excluir</a>
            </form>
                
    </main>

</body>
</html>