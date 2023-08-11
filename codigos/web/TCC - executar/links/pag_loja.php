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
    <link rel="stylesheet" href="../css/pag_loja.css">
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

    <main><!--
        <section class="filtro">
            
            <form class="formulario_categoria" action="">
                <h2 class="titulo_filtro">categorias</h2>
                
                <div class="caixa_categoria">
                    <input class="input_categoria" type="radio" name="categoria" checked>todos
                </div>
                <div class="caixa_categoria">
                    <input class="input_categoria" type="radio" name="categoria">suspense
                </div>
                <div class="caixa_categoria">
                    <input class="input_categoria" type="radio" name="categoria">terror
                </div>
                <div class="caixa_categoria">
                    <input class="input_categoria" type="radio" name="categoria">suspence
                </div>
                <div class="caixa_categoria">
                    <input class="input_categoria" type="radio" name="categoria">romance
                </div>
                <div class="caixa_categoria">
                    <input class="input_categoria" type="radio" name="categoria">drama
                </div>
                <div class="caixa_categoria">
                    <input class="input_categoria" type="radio" name="categoria">cientifico
                </div>

            </form>
        -->
            <ul class="filtro">
                <li><button class="input_categoria" href="#" id="todos" value="todos">todos</button>
                </li>
                <li><button class="input_categoria" href="#" id="suspense" value="suspence">suspence</button>
                </li>
                <li><button class="input_categoria" href="#" id="terror" value="terror">terror</button>
                </li>
                <li><button class="input_categoria" href="#" id="aventura" value="aventura">aventura</button>
                </li>
                <li><button class="input_categoria" href="#" id="romance" value="romance">romance</button>
                </li>
                <li><button class="input_categoria" href="#" id="drama" value="drama">drama</button>
                </li>
              </ul>



        </section>

        <section class="loja">
            <h2 class="titulo_loja">promoção da semana</h2>
                <section class="itens_loja">
                    <section class="item">   
                            <img class="imagem" src="../imgs/img2 (1).jpg" alt="imagem livro" >
                            <h3 class="titulo_livro">O trono de vidro</h3>
                            <div class="categoria">
                                <p>Categoria:</p>
                                <p class="nome_categoria">terror</p>
                                <p class="nome_categoria">aventura</p>
                            </div>
                            <p class="valor_livro">R$ 39,90 </p>
                    </section>

                    <section class="item">   
                        <img class="imagem" src="../imgs/img2 (1).jpg" alt="imagem livro" >
                        <h3 class="titulo_livro">O trono de vidro</h3>
                        <div class="categoria">
                            <p>Categoria:</p>
                            <p class="nome_categoria">terror</p>
                            <p class="nome_categoria">aventura</p>
                        </div>
                        <p class="valor_livro">R$ 39,90 </p>
                    </section>

                    <section class="item">   
                    <img class="imagem" src="../imgs/img2 (1).jpg" alt="imagem livro" >
                    <h3 class="titulo_livro">O trono de vidro</h3>
                    <div class="categoria">
                        <p>Categoria:</p>
                        <p class="nome_categoria">terror</p>
                        <p class="nome_categoria">aventura</p>
                    </div>
                    <p class="valor_livro">R$ 39,90 </p>
                    </section>

                    <section class="item">   
                        <img class="imagem" src="../imgs/img2 (1).jpg" alt="imagem livro" >
                        <h3 class="titulo_livro">O trono de vidro</h3>
                        <div class="categoria">
                            <p>Categoria:</p>
                            <p class="nome_categoria">terror</p>
                            <p class="nome_categoria">aventura</p>
                        </div>
                        <p class="valor_livro">R$ 39,90 </p>
                    </section>

                    <section class="item">   
                        <img class="imagem" src="../imgs/img2 (1).jpg" alt="imagem livro" >
                        <h3 class="titulo_livro">O trono de vidro</h3>
                        <div class="categoria">
                            <p>Categoria:</p>
                            <p class="nome_categoria">drama</p>
                            <p class="nome_categoria">aventura</p>
                        </div>
                        <p class="valor_livro">R$ 39,90 </p>
                    </section>

                </section>

                <h2 class="titulo_loja">promoção da semana</h2>
                <section class="itens_loja">
                    <section class="item">   
                            <img class="imagem" src="../imgs/img2 (1).jpg" alt="imagem livro" >
                            <h3 class="titulo_livro">O trono de vidro</h3>
                            <div class="categoria">
                                <p>Categoria:</p>
                                <p class="nome_categoria">romance</p>
                                <p class="nome_categoria">aventura</p>
                            </div>
                            <p class="valor_livro">R$ 39,90 </p>
                    </section>

                    <section class="item">   
                        <img class="imagem" src="../imgs/img2 (1).jpg" alt="imagem livro" >
                        <h3 class="titulo_livro">O trono de vidro</h3>
                        <div class="categoria">
                            <p>Categoria:</p>
                            <p class="nome_categoria">romance</p>
                            <p class="nome_categoria">cientifico</p>
                        </div>
                        <p class="valor_livro">R$ 39,90 </p>
                    </section>

                    <section class="item">   
                    <img class="imagem" src="../imgs/img2 (1).jpg" alt="imagem livro" >
                    <h3 class="titulo_livro">O trono de vidro</h3>
                    <div class="categoria">
                        <p>Categoria:</p>
                        <p class="nome_categoria">romance</p>
                        <p class="nome_categoria">cientifico</p>
                    </div>
                    <p class="valor_livro">R$ 39,90 </p>
                    </section>

                    <section class="item">   
                        <img class="imagem" src="../imgs/img2 (1).jpg" alt="imagem livro" >
                        <h3 class="titulo_livro">O trono de vidro</h3>
                        <div class="categoria">
                            <p>Categoria:</p>
                            <p class="nome_categoria">drama</p>
                            <p class="nome_categoria">cientifico</p>
                        </div>
                        <p class="valor_livro">R$ 39,90 </p>
                    </section>

                    <section class="item">   
                        <img class="imagem" src="../imgs/img2 (1).jpg" alt="imagem livro" >
                        <h3 class="titulo_livro">O trono de vidro</h3>
                        <div class="categoria">
                            <p>Categoria:</p>
                            <p class="nome_categoria">drama</p>
                            <p class="nome_categoria">suspence</p>
                        </div>
                        <p class="valor_livro">R$ 39,90 </p>
                    </section>

                    <section class="item">   
                        <img class="imagem" src="../imgs/img2 (1).jpg" alt="imagem livro" >
                        <h3 class="titulo_livro">O trono de vidro</h3>
                        <div class="categoria">
                            <p>Categoria:</p>
                            <p class="nome_categoria">drama</p>
                            <p class="nome_categoria">suspence</p>
                        </div>
                        <p class="valor_livro">R$ 39,90 </p>
                    </section>

                </section>
        </section>
    </main>

    <footer class="rodape">
        <div class="descricao-rodape">
            <P class="texto">qualquer sugestão para melhorar nossos serviços entrar em contato com</P>
            <p class="texto">org.livraria_online@gmail.com</p>
        </div>
    </footer>

    <script src="../js/filtro_loja.js"></script>
</body>
</html>