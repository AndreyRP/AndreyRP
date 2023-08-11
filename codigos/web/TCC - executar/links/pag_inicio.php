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
    <link rel="stylesheet" href="../css/pag_inicio.css">
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
        <div class="pagina">
            <section class="inicio">
                <img src="" class="baner-inicio" alt="Baner">
            </section>

            <section class="destaque">
                <div>
                    <h2 class="secundario-titulo">Novas Obras</h2>
                    <p class="descricao">essas novas obras trazidas para nossa plataforma, trazem contigo a assinatura de XXXXXXXXXXXXXX,
                        com isso nosso repertuario de livros aumenta a cada dia, obtendo cada zez mais tipod de opcóes para nosso fieis leitores,
                    gostaria de agradeçer a todos que continuam apoiando essa plataforma, obrigado.</p>
                </div>
                <img src="" alt="Tema" class="descricao-imagem">
            </section>

            <section class="sobre-livraria">
                <h2 class="secundario-titulo">Introduçao</h2>
                <p class="descricao">O conceito de texto pode variar a depender da perspectiva teórica adotada para estudá-lo. A palavra texto,
                    ao longo da história, foi ganhando diferentes sentidos, de modo que novas construções foram compreendidas como tal.
                    De acordo com o percusso de investigações sobre o texto, nas mais diversas correntes teóricas que se debruçam sobre esse objeto,
                    o conceito foi se modificando e se ampliando. Hoje o texto não é considerado uma estrutura pronta, com unidade de sentido completa,
                    pois consideram-se também os processos de planejamento,construção e recepção do texto.</p>
            </section>
        </div>
    </main>

    <footer class="rodape">
        <div class="descricao-rodape">
            <P class="texto">qualquer sugestão para melhorar nossos serviços entrar em contato com</P>
            <p class="texto">org.livraria_online@gmail.com</p>
        </div>
    </footer>
</body>
</html>