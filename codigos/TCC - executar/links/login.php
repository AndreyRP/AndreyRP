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
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/pag_login.css">
</head>
<body>

    <main>
        <section class="caixa_login">
            <div class="div_site">
                <img src="../imgs/logo.png" alt="Logo" class="login-logo">
                <p class="nome_pagina_login">Livraria Online</p>
            </div>
            
            <form method="post" class="formulario_login" enctype="multipart/form-data">
                <h2 class="titulo_login">Login</h2>
                <label class="label" for="email">E-mail do Usuário</label>
                <input class="input" id="email" type="text" name="email" placeholder="Insira o nome">

                <label class="label">Senha</label>
                <input class="input" type="password" name="senha">

                <input type="submit" name="btn_login" value="logar" class="btn_login">

                <a href="./cadastro_pessoa.php">cadastrar-se</a>
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
    $usuario = $_POST["email"];
    $senha = md5($_POST["senha"]);

    // validação simples (opcional)
    // aqui verificamos se tem algum conteudo no input
    
    if (empty($usuario) && empty($senha)) {
        echo "Necessário informar usuario ou senha";
        exit();
    }

    // criando o sql do programa e colocando as
    // variaveis magicas
    $sql = "SELECT * from tb_usuarios WHERE email_usuario = :usuario AND senha_usuario = :senha";
   
    // preparando o sql para ser processado
    $stmt = $pdo->prepare($sql);
    //substituindo as variaveis magicas por dados digitados
    $stmt -> bindParam(':usuario', $usuario);
    $stmt -> bindParam(':senha', $senha);

    $sqlt = "SELECT * FROM tb_usuarios WHERE email_usuario = :usuario AND senha_usuario = :senha";
    $stmc = $pdo -> prepare($sqlt);
    $stmc -> bindParam(':usuario', $usuario);
    $stmc -> bindParam(':senha', $senha);
    $stmc -> execute();
    //buscando todas as linhas da tabela
    $chave = $stmc -> fetch(PDO::FETCH_OBJ);

    $tipo = $chave -> tipo_usuario;
    $id = $chave -> id_usuario;
    // se o comando der certo
    if ($stmt->execute()) {
        //mostra mensagem de realização do comando
        if ($stmt->rowCount() > 0) {
            //mandar pra outra pagina

            $_SESSION['nome_usuario'] = $chave -> nome_usuario;
            $_SESSION['carrinho'] = array();

            if ($tipo == 'C') {
                header("Location: pag_loja.php"); // Página do cliente
            } elseif ($tipo == 'A') {
                header("Location: adm_pagina.php"); // Página do administrador
            }
           
        }
    } 
        
    }
?>


