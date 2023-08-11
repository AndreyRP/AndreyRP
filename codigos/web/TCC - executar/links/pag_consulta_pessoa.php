<?php
session_start();
include_once "../php/conexao.php";

$pdo = conectar();
//traz dados
$sql = "SELECT * FROM tb_usuarios";
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
                <th>ID usuario</th>
                <th>nome usuario</th>
                <th>email</th>
                <th>cpf</th>
                <th>rg</th>
                <th>telefone</th>
                <th>cep</th>
                <th>rua</th>
                <th>bairro</th>
                <th>numero da casa</th>
                <th>complemento</th>
                <th>senha</th>
                <th>tipo</th>
                <th>ativo</th>
                <th>id cidade</th>
            </tr>

                <?php foreach ($resuldato as $usuario) { ?>
                    <tr>
                        <!-- coluna com informacao -->
                        <td> <?php echo $usuario['id_usuario']; ?> </td>
                        <td> <?php echo $usuario['nome_usuario']; ?> </td>
                        <td> <?php echo $usuario['email_usuario']; ?> </td>
                        <td> <?php echo $usuario['cpf_usuario']; ?> </td>
                        <td> <?php echo $usuario['rg_usuario']; ?> </td>
                        <td> <?php echo $usuario['telefone_usuario']; ?> </td>
                        <td> <?php echo $usuario['cep_usuario']; ?> </td>
                        <td> <?php echo $usuario['rua_usuario']; ?> </td>
                        <td> <?php echo $usuario['bairro_usuario']; ?> </td>
                        <td> <?php echo $usuario['numero_casa_usuario']; ?> </td>
                        <td> <?php echo $usuario['complemento']; ?> </td>
                        <td> <?php echo $usuario['senha_usuario']; ?> </td>
                        <td> <?php echo $usuario['tipo_usuario']; ?> </td>
                        <td> <?php echo $usuario['ativo']; ?> </td>
                        <td> <?php echo $usuario['id']; ?> </td>
                        <!-- coluna com link para alteracao e exclussao -->
                        <td><a href="../links/cadastro_pessoa_alterar.php?id= <?php echo $usuario['id_usuario']?>">alterar</a> <a href="../links/cadastro_pessoa_excluir.php?id= <?php echo $usuario['id_usuario']?>">excluir</a></td>
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