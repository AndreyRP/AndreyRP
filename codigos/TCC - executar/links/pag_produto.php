<?php
session_start();
include_once "../php/conexao.php";

$pdo = conectar();

$id = $_GET['id'];

$sql = "SELECT * FROM tb_livros WHERE id_livro = :id";
$stmc = $pdo -> prepare($sql);
$stmc -> bindParam(':id', $id);
$stmc -> execute();
//buscando todas as linhas da tabela
$chave = $stmc -> fetch(PDO::FETCH_OBJ);

$id_edi = $chave -> fk_editora;

$sqld = "SELECT * FROM tb_editoras Where id_editora = $id_edi";
$stmd = $pdo -> prepare($sqld);
$stmd -> execute();
//buscando todas as linhas da tabela
$resuldato = $stmd ->fetch(PDO::FETCH_ASSOC);

$sqlv = "SELECT nome_categoria FROM tb_categorias
JOIN tb_categorias_livros
ON tb_categorias.id_categoria = tb_categorias_livros.fk_categoria
WHERE fk_livro = $id";
$stmv = $pdo -> prepare($sqlv);
$stmv -> execute();
$mult_valor = $stmv -> fetchAll(PDO::FETCH_ASSOC);

$sqlva = "SELECT nome_autor FROM tb_autores
JOIN tb_autores_livros
ON tb_autores.id_autor = tb_autores_livros.fk_autor
WHERE fk_livro = $id";
$stmva = $pdo -> prepare($sqlva);
$stmva -> execute();
$mult_valor_autor = $stmva -> fetchAll(PDO::FETCH_ASSOC);


//carrinho
if(isset( $_GET['acao'])){
    if($_GET['acao'] == 'add'){
            if(!isset($_SESSION['carrinho'][$id])){
            $_SESSION['carrinho'][$id] = 1;
            }else{
            $_SESSION['carrinho'][$id] += 1;
        }
        }
}

?> 

    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../css/cabecalho_login.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/produto_pag.css">
    </head>
    <body>
    <header class="cabecalho">
        <img src="../imgs/logo.png" alt="Logo" class="cabecalho-logo">
        <p class="nome_pagina">Livraria Online</p>
    </header>
    
        <main>
    
            <section class="caixa_produto">

                <img class="imagem_produto" src="../imgs/<?php echo $chave -> imagem_livro ?>" alt="imagem do produto">
                
                <div class="caixa_informacao">
                    <div class="caixa_principal">
                        <h2 class="nome_produto"><?php echo $chave -> titulo_livro ?></h2>
                        <p class="valor_livro">R$ <?php echo formatar($chave -> valor_livro) ?></p>
                    </div>

                    <div class="caixa_segundaria">
                        <p>Categoria:
                            <?php foreach($mult_valor as $valor){ ?> - <?php echo $valor['nome_categoria'];?><?php }?> 
                        </p>
                        <p>autor: 
                            <?php foreach($mult_valor_autor as $autor){ ?> - <?php echo $autor['nome_autor'];?><?php }?> 
                        </p>
                        <p class="informacao">editora: <?php echo $resuldato['nome_editora'] ?></p>
                        <p class="informacao">volume do livro: <?php echo $chave -> volume_livro ?></p>
                        <p class="informacao">sinopse: <br><?php echo $chave -> sinopse ?></p>
                    </div>

                    <div>
                        <a href="./pag_produto.php?id=<?php echo$id?>&acao=add" class="btn_add"> + adicionar ao carrinho</a>
                    </div>
                </div>

            </section>

        </main>
    
        <footer class="rodape">
            <div class="descricao-rodape">
                <P class="texto">qualquer sugestão para melhorar nossos serviços entrar em contato com</P>
                <p class="texto">org.livraria_online@gmail.com</p>
            </div>
        </footer>
    </body>
    </html>