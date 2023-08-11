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
    <link rel="stylesheet" href="../css/destaque.css">
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
        <h2 class="titulo_promocao">promoção da semana</h2>
        <section class="itens_destaque">
            <section class="item">
                <div class="caixa_img">
                    <div>
                        <img class="imagem" src="../imgs/img2 (1).jpg" alt="imagem livro" >
                    </div>
                    <div>
                        <p class="descricao_destaque">autor: paulinho dos padres filho terceiro</p>
                        <h3 class="titulo_descricao">sinopse</h3>
                        <p class="descricao_destaque">esse livro ...</p>
                    </div>
                </div>

                <div class="valor_antigo">
                    <p>De: R$ 29,90  por</p>
                </div>

                <div class="valor_novo"> 
                    <p>R$ 19,90</p>
                </div>

                <div class="btn_destaque"> 
                    <a class="btn" href="#">saiba mais</a>
                </div>
            </section>

            <section class="item">
                <div class="caixa_img">
                    <div>
                        <img class="imagem" src="../imgs/img2 (1).jpg" alt="imagem livro" >
                    </div>
                    <div>
                        <p class="descricao_destaque">autor: paulinho dos padres filho terceiro</p>
                        <h3 class="titulo_descricao">sinopse</h3>
                        <p class="descricao_destaque">esse livro ...</p>
                    </div>
                </div>

                <div class="valor_antigo">
                    <p>De: R$ 29,90  por</p>
                </div>

                <div class="valor_novo"> 
                    <p>R$ 19,90</p>
                </div>

                <div class="btn_destaque"> 
                    <a class="btn" href="#">saiba mais</a>
                </div>
            </section>

            <section class="item">
                <div class="caixa_img">
                    <div>
                        <img class="imagem" src="../imgs/img2 (1).jpg" alt="imagem livro" >
                    </div>
                    <div>
                        <p class="descricao_destaque">autor: paulinho dos padres filho terceiro</p>
                        <h3 class="titulo_descricao">sinopse</h3>
                        <p class="descricao_destaque">esse livro ...</p>
                    </div>
                </div>

                <div class="valor_antigo">
                    <p>De: R$ 29,90  por</p>
                </div>

                <div class="valor_novo"> 
                    <p>R$ 19,90</p>
                </div>

                <div class="btn_destaque"> 
                    <a class="btn" href="#">saiba mais</a>
                </div>
            </section>

        </section>

        <h2 class="titulo_promocao">promoção da semana</h2>
        <section class="itens_destaque">
            <section class="item">
                <div class="caixa_img">
                    <div>
                        <img class="imagem" src="../imgs/img2 (1).jpg" alt="imagem livro" >
                    </div>
                    <div>
                        <p class="descricao_destaque">autor: paulinho dos padres filho terceiro</p>
                        <h3 class="titulo_descricao">sinopse</h3>
                        <p class="descricao_destaque">esse livro ...</p>
                    </div>
                </div>

                <div class="valor_antigo">
                    <p>De: R$ 29,90  por</p>
                </div>

                <div class="valor_novo"> 
                    <p>R$ 19,90</p>
                </div>

                <div class="btn_destaque"> 
                    <a class="btn" href="#">saiba mais</a>
                </div>
            </section>

            <section class="item">
                <div class="caixa_img">
                    <div>
                        <img class="imagem" src="../imgs/img2 (1).jpg" alt="imagem livro" >
                    </div>
                    <div>
                        <p class="descricao_destaque">autor: paulinho dos padres filho terceiro</p>
                        <h3 class="titulo_descricao">sinopse</h3>
                        <p class="descricao_destaque">esse livro ...</p>
                    </div>
                </div>

                <div class="valor_antigo">
                    <p>De: R$ 29,90  por</p>
                </div>

                <div class="valor_novo"> 
                    <p>R$ 19,90</p>
                </div>

                <div class="btn_destaque"> 
                    <a class="btn" href="#">saiba mais</a>
                </div>
            </section>

            <section class="item">
                <div class="caixa_img">
                    <div>
                        <img class="imagem" src="../imgs/img2 (1).jpg" alt="imagem livro" >
                    </div>
                    <div>
                        <p class="descricao_destaque">autor: paulinho dos padres filho terceiro</p>
                        <h3 class="titulo_descricao">sinopse</h3>
                        <p class="descricao_destaque">esse livro ...</p>
                    </div>
                </div>

                <div class="valor_antigo">
                    <p>De: R$ 29,90  por</p>
                </div>

                <div class="valor_novo"> 
                    <p>R$ 19,90</p>
                </div>

                <div class="btn_destaque"> 
                    <a class="btn" href="#">saiba mais</a>
                </div>
            </section>

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