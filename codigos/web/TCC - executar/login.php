<?php
session_start();
include_once "./php/conexao.php";

$pdo = conectar();
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>

    <main>
        <section class="caixa_login">
            <div class="div_site">
                <img src="" alt="Logo" class="login-logo">
                <p class="nome_pagina_login">Livraria Online</p>
            </div>
            
            <form method="post" class="formulario_login" enctype="multipart/form-data">
                <h2 class="titulo_login">Login</h2>
                <label class="label" for="usuario">Usuário</label>
                <input class="input" id="usuario" type="text" name="usuario" placeholder="Insira o nome">

                <label class="label">Senha</label>
                <input class="input" type="password" name="senha">

                <input type="submit" name="btn_login" value="salvar" class="btn_login">
            </form>
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

<?php
// faça o teste se o botão foi pressionado
if (isset($_POST['btn_login'])) {

    // receba o conteudo digitado no input
    // deve ser feito um para cada input
    $usuario = $_POST["usuario"];
    $senha = md5($_POST["senha"]);


    // validação simples (opcional)
    // aqui verificamos se tem algum conteudo no input
    if (empty($usuario) && empty($senha)) {
        echo "Necessário informar usuario ou senha";
        exit();
    }

    // criando o sql do programa e colocando as
    // variaveis magicas
    $sql = "SELECT * from tb_usuarios WHERE nome_usuario = :usuario AND senha_usuario = :senha";

    // preparando o sql para ser processado
    $stmt = $pdo->prepare($sql);

    //substituindo as variaveis magicas por dados digitados
    $stmt -> bindParam(':usuario', $usuario);
    $stmt -> bindParam(':senha', $senha);

    // se o comando der certo
    if ($stmt->execute()) {
        //mostra mensagem de realização do comando
        if ($stmt->rowCount() > 0) {
            echo "Usuario logado com sucesso";
            //mandar pra outra pagina
            header('location: pag_inicio.php');
        }
    } else {
        echo "Usuario ou Senha Invalido<br>";
        
    }
}
?>