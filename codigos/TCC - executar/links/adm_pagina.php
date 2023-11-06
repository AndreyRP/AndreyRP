<?php
session_start();
include_once "../php/conexao.php";

$pdo = conectar();

$sqlp = "SELECT * FROM tb_usuarios";
$stmcp = $pdo -> prepare($sqlp);
$stmcp -> execute();
//buscando todas as linhas da tabela
$usuarios = $stmcp ->fetchAll(PDO::FETCH_ASSOC);

$sqlpr = "SELECT * FROM tb_livros";
$stmcpr = $pdo -> prepare($sqlpr);
$stmcpr -> execute();
//buscando todas as linhas da tabela
$produtos = $stmcpr ->fetchAll(PDO::FETCH_ASSOC);

$sqlc = "SELECT * FROM tb_categorias";
$stmc = $pdo -> prepare($sqlc);
$stmc -> execute();
//buscando todas as linhas da tabela
$categorias = $stmc ->fetchAll(PDO::FETCH_ASSOC);

$sqla = "SELECT * FROM tb_autores";
$stma = $pdo -> prepare($sqla);
$stma -> execute();
//buscando todas as linhas da tabela
$autores = $stma ->fetchAll(PDO::FETCH_ASSOC);

$sqle = "SELECT * FROM tb_editoras";
$stmce = $pdo -> prepare($sqle);
$stmce -> execute();
//buscando todas as linhas da tabela
$editoras = $stmce ->fetchAll(PDO::FETCH_ASSOC);


?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/cabecalho_login.css">
    <link rel="stylesheet" href="../css/pag_adm.css">

</head>
<body>

    <header class="cabecalho">
        <img src="../imgs/logo.png" alt="Logo" class="cabecalho-logo">
        <p class="nome_pagina">Livraria Online</p>
    </header>
    
    <main>
        <section class="navegacao">
            <ul class="lista_itens">
                <li class="titulo_nav">registro de cadastros</li>
                <li class="itens">
                    <button class="btn_iten" id="pessoa">pessoa</button>
                </li>
                <li class="itens">
                    <button class="btn_iten" id="produto">produto</button>
                </li>
                <li class="itens">
                    <button class="btn_iten" id="categoria">categoria</button>
                </li>
                <li class="itens">
                    <button class="btn_iten" id="altor">autor</button>
                </li>
                <li class="itens">
                    <button class="btn_iten" id="editora">editora</button>
                </li>
                <li class="itens">
                    <button class="btn_iten" id="adicionar">adicionar</button>
                </li>
            </ul>
        </section>
        <section>
            <div>
                <table class="tabela">
                        <h3 class="titulo_tabela" id="pessoa">Registro Pessoas</h3> 
                        <tr>
                            <th class="subtitulo_tabela">id</th>
                            <th class="subtitulo_tabela">nome</th>
                            <th class="subtitulo_tabela">e-mail</th>
                            <th class="subtitulo_tabela">ativo</th>
                            <th class="subtitulo_tabela">tipo</th>
                            <th class="subtitulo_tabela">consultar</th>
                        </tr>
                        
                        
                            <?php foreach ($usuarios as $pessoa) { ?>
                                <tr>
                                    <td><?php echo $pessoa['id_usuario']; ?></td>
                                    <td><?php echo $pessoa['nome_usuario']; ?></td>
                                    <td><?php echo $pessoa['email_usuario']; ?></td>
                                    <td><?php echo $pessoa['ativo']; ?></td>
                                    <td><?php echo $pessoa['tipo_usuario']; ?></td>
                                    <td><a href="../links/pag_consulta_pessoa.php?id=<?php echo $pessoa['id_usuario']; ?>">consulta</a></td>
                                </tr>
                            <?php }?>
                </table>
            </div>

            <div>
                <table class="tabela">
                    <h3 class="titulo_tabela" id="produto">Registro produto</h3>
                    <tr>
                        <th class="subtitulo_tabela">id</th>
                        <th class="subtitulo_tabela">titulo livro</th>
                        <th class="subtitulo_tabela">valor livro</th>
                        <th class="subtitulo_tabela">ativo</th>
                        <th class="subtitulo_tabela">consultar</th>
                    </tr>

                        <?php foreach ($produtos as $livro) { ?>
                                    <tr>
                                        <td><?php echo $livro['id_livro']; ?></td>
                                        <td><?php echo $livro['titulo_livro']; ?></td>
                                        <td><?php echo $livro['valor_livro']; ?></td>
                                        <td><?php echo $livro['ativo']; ?></td>
                                        <td><a href="../links/pag_consulta_livro.php?id=<?php echo $livro['id_livro']; ?>">consulta</a></td>
                                    </tr>
                        <?php }?>

                </table>
            </div>

            <div> 
                <table class="tabela">
                    <h3 class="titulo_tabela" id="categoria">Registro categoria</h3>
                    <tr>
                        <th class="subtitulo_tabela">id</th>
                        <th class="subtitulo_tabela">nome</th>
                        <th class="subtitulo_tabela">alterar</th>
                        <th class="subtitulo_tabela">excluir</th>
                    </tr>

                    <?php foreach ($categorias as $categoria) { ?>
                                    <tr>
                                        <td><?php echo $categoria['id_categoria']; ?></td>
                                        <td><?php echo $categoria['nome_categoria']; ?></td>
                                        <td><a href="../links/cadastro_categoria_alterar.php?id=<?php echo $categoria['id_categoria']; ?>">alterar</a></td>
                                        <td><a href="../links/cadastro_categoria_excluir.php?id=<?php echo $categoria['id_categoria']; ?>">excluir</a></td>
                                    </tr>
                    <?php }?>
                </table>
            </div>   

            <div>
                <table class="tabela">
                    <h3 class="titulo_tabela" id="altor">Registro altor</h3>
                    <tr>
                        <th class="subtitulo_tabela">id</th>
                        <th class="subtitulo_tabela">nome</th>
                        <th class="subtitulo_tabela">alterar</th>
                        <th class="subtitulo_tabela">excluir</th>
                    </tr>

                    <?php foreach ($autores as $autor) { ?>
                            <tr>
                                <td><?php echo $autor['id_autor']; ?></td>
                                <td><?php echo $autor['nome_autor']; ?></td>
                                <td><a href="../links/cadastro_autor_alterar.php?id=<?php echo $autor['id_autor']; ?>">alterar</a></td>
                                <td><a href="../links/cadastro_autor_excluir.php?id=<?php echo $autor['id_autor']; ?>">excluir</a></td>
                            </tr>
                    <?php }?>
                </table>
            </div>

            <div>
                <table class="tabela">
                    <h3 class="titulo_tabela" id="editora">Registro editora</h3>
                    <tr>
                        <th class="subtitulo_tabela">id</th>
                        <th class="subtitulo_tabela">nome</th>
                        <th class="subtitulo_tabela">ativo</th>
                        <th class="subtitulo_tabela">alterar</th>
                        <th class="subtitulo_tabela">excluir</th>
                    </tr>

                    <?php foreach ($editoras as $editora) { ?>
                        <tr>
                            <td><?php echo $editora['id_editora']; ?></td>
                            <td><?php echo $editora['nome_editora']; ?></td>
                            <td><?php echo $editora['ativo']; ?></td>
                            <td><a href="../links/cadastro_editora_alterar.php?id=<?php echo $editora['id_editora']; ?>">alterar</a></td>
                            <td><a href="../links/cadastro_editora_excluir.php?id=<?php echo $editora['id_editora']; ?>">excluir</a></td>
                        </tr>
                    <?php }?>
                </table>
            </div>

            <div>
                <table class="tabela">
                    <h3 class="titulo_tabela" id="adicionar">Adicionar item</h3>
                    <tr>
                        <td class="">usuario</td>
                        <td class=""><a href="../links/cadastro_pessoa.php">ADD+</a></td>
                    </tr>
                    
                    <tr>
                        <td class="">livro</td>
                        <td class=""><a href="../links/cadastro_livro.php">ADD+</a></td>
                    </tr>

                    <tr>
                        <td class="">categoria</td>
                        <td class=""><a href="../links/cadastro_categoria.php">ADD+</a></td>
                    </tr>

                    <tr>
                        <td class="">autor</td>
                        <td class=""><a href="../links/cadastro_autor.php">ADD+</a></td>
                    </tr>

                    <tr>
                        <td class="">editora</td>
                        <td class=""><a href="../links/cadastro_editora.php">ADD+</a></td>
                    </tr>
                </table>
            </div>
        </section>
    </main>



    <script src="../js/pag_adm_filtro.js"></script>
</body>
</html>