<?php
session_start();
include_once "../php/conexao.php";

$pdo = conectar();
?> 

    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../css/cabecalho_site.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/pag_produto.css">
    </head>
    <body>
        <header class="cabecalho">
            <img src="" alt="Logo" class="cabecalho-logo">
                
            <nav class="menu">
                <a href="../links/pag_inicio.php"  class="menu-link">Inicio</a>
                <a href="../links/pag_loja.php"  class="menu-link">Loja</a>
                <a href="../links/pag_destaque.php"  class="menu-link">Destaques</a>
                <a href=""  class="menu-link carrinho">Carrinho</a>
            </nav>
                
            <div class="cabecalho-perfil">
                <img src="" alt="foto-perfil">
                <p class="nome-perfil">Demothezis walkirea</p>
            </div>
        </header>
    
        <main>
    
            <section class="caixa_produto">

                <img class="imagem_produto" src="../imgs/img2 (1).jpg" alt="imagem do produto">
                
                <div class="caixa_informacao">
                    <div class="caixa_principal">
                        <h2 class="nome_produto">Trono de vidro</h2>
                        <p class="valor_livro">R$ 39,90</p>
                    </div>

                    <div class="caixa_segundaria">
                        <p class="informacao">categoria: aventura - drama</p>
                        <p class="informacao">altor: fulando</p>
                        <p class="informacao">editora: editora de baia</p>
                        <p class="informacao">volume do livro: 1 volume</p>
                    </div>

                    <div>
                        <button class="btn_add">+ adicionar ao carrinho</button>
                    </div>
                </div>

            </section>

        </main>
    
        <footer class="rodape">
            <div class="descricao-rodape">
                <P class="texto">qualquer sugestão para melhorar nossos serviços entrar em contato com</P>
                <p class="texto">org.livraria_online@gmail.com</p>
            </div>
        </footer>s
    </body>
    </html>