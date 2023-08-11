<?php
session_start();
include_once "../php/conexao.php";

$pdo = conectar();
//traz dados
$sql = "SELECT * FROM tb_livros";
$stmc = $pdo -> prepare($sql);
$stmc -> execute();
//buscando todas as linhas da tabela
$resuldato = $stmc ->fetchAll(PDO::FETCH_ASSOC);

//buscando um unico registro
//$resuldato = $stmc ->fetch(PDO::FETCH_ASSOC);
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/cabecalho_site.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>
    <header class="cabecalho">
        <img src="" alt="Logo" class="cabecalho-logo">
            
        <nav class="menu">
            <a href=""  class="menu-link">Inicio</a>
            <a href=""  class="menu-link">Loja</a>
            <a href=""  class="menu-link">Destaques</a>
            <a href=""  class="menu-link">Carrinho</a>
        </nav>
            
        <div class="cabecalho-perfil">
            <img src="" alt="foto-perfil">
            <p class="nome-perfil">Demothezis walkirea</p>
        </div>
    </header>

    <main>
        <table>
            <tr>
                <!-- titulos -->
                <th>ID Livro</th>
                <th>Tirulo livro</th>
                <th>valor</th>
                <th>esta ativo</th>
                <th>volume</th>
                <th>editora</th>
                <th>imagem</th>
            </tr>

                <?php foreach ($resuldato as $livro) { ?>
                    <tr>
                        <!-- coluna com informacao -->
                        <td> <?php echo $livro['id_livro']; ?> </td>
                        <td> <?php echo $livro['titulo_livro']; ?> </td>
                        <td> <?php echo $livro['valor_livro']; ?> </td>
                        <td> <?php echo $livro['ativo']; ?> </td>
                        <td> <?php echo $livro['volume_livro']; ?> </td>
                        <td> <?php echo $livro['fk_editora']; ?> </td>
                        <td> <?php echo $livro['imagem_livro']; ?> </td>
                        <!-- coluna com link para alteracao e exclussao -->
                        <td><a href="../links/cadastro_livro_alterar.php?id= <?php echo $livro['id_livro']?>">alterar</a> <a href="../links/cadastro_livro_excluir.php?id= <?php echo $livro['id_livro']?>">excluir</a></td>
                    </tr>
                <?php } ?>
        </table>
    </main>

    <footer class="rodape">
        <div class="descricao-rodape">
            <P class="texto">qualquer sugestão para melhorar nossos serviços entrar em contato com</P>
            <p class="texto">org.livraria_online@gmail.com</p>
        </div>
    </footer>
</body>
</html>