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
    <link rel="stylesheet" href="../css/cabecalho_login.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/cadastro.css">
</head>
<body>
    <header class="cabecalho">
        <img src="../imgs/logo.png" alt="Logo" class="cabecalho-logo">
        <p class="nome_pagina">Livraria Online</p>
    </header>


     <main class="">
            <form action="" method="post" enctype=multipart/form-data class="formulario" action="action_page.php">
                <p class="titulo_cadastro">cadastro novo autor</p>
    
                <label class="label" for="nome_autor">nome do autor:</label>
                <input class="input" id="nome_autor" name="nome_autor" type="text" placeholder="nome do autor">

                <input class="input btn_enviar" name="bt_cadastrar" value="cadastrar" type="submit">
            </form>
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
if (isset($_POST['bt_cadastrar'])) {
// receba o conteudo digitado no input
// deve ser feito um para cada input
    $nome_autor = $_POST["nome_autor"];

// validação simples (opcional) FAZER PARA VALORES NOT NULL (TALVEZ)
// aqui verificamos se tem algum conteudo no input
    if (empty($nome_autor)) {
        echo "Necessário informar um nome";
        exit();
     
    }

// criando o sql do programa e colocando as
// variaveis magicas                    NECESSITA BANCO
    $sql = "INSERT INTO tb_autores (nome_autor) 
    VALUES (:nome_autor)";


// preparando o sql para ser processado
    $stmt = $pdo->prepare($sql);

    //substituindo as variaveis magicas por dados digitados
    $stmt->bindParam(':nome_autor', $nome_autor);

    // se o comando der certo
    if ($stmt->execute()) {
        //mostra mensagem de realização do comando
        echo "Registro inserido com sucesso";
        //mandar pra outra pagina
        //header(Location: pagina.php);
    } else {
        echo "Não foi possivel inserir o registro";
    }
}
?>
  

    