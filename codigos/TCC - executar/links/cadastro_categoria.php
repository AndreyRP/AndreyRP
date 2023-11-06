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
                <p class="titulo_cadastro">cadastro nova categoria</p>
    
                <label class="label" for="nome_categoria">nome da categoria:</label>
                <input class="input" id="nome_categoria" name="nome_categoria" type="text" placeholder="nome da categoria">

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
    $nome_categoria = $_POST["nome_categoria"];

// validação simples (opcional) FAZER PARA VALORES NOT NULL (TALVEZ)
// aqui verificamos se tem algum conteudo no input
    if (empty($nome_categoria)) {
        echo "Necessário informar um nome";
        exit();
     
    }

// criando o sql do programa e colocando as
// variaveis magicas                    NECESSITA BANCO
    $sql = "INSERT INTO tb_categorias (nome_categoria) 
    VALUES (:nome_categoria)";


// preparando o sql para ser processado
    $stmt = $pdo->prepare($sql);

    //substituindo as variaveis magicas por dados digitados
    $stmt->bindParam(':nome_categoria', $nome_categoria);

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
  

    