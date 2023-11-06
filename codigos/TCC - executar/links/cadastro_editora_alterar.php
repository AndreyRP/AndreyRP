<?php
session_start();
include_once "../php/conexao.php";

$pdo = conectar();
//traz dados
$id = $_GET['id'];
$sql = "SELECT * FROM tb_editoras WHERE id_editora = :id";
$stmc = $pdo -> prepare($sql);
$stmc -> bindParam(':id', $id);
$stmc -> execute();
//buscando todas as linhas da tabela
$chave = $stmc -> fetch(PDO::FETCH_OBJ);

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
                <p class="titulo_cadastro">alterar editora</p>
    
                <label class="label" for="nome_editora">nome da editora:</label>
                <input class="input" id="nome_editora" name="nome_editora" type="text" value="<?php echo $chave -> nome_editora; ?>">

                <label class="label" for="ativo">ativo:</label>
                <input class="input" id="ativo" name="ativo" type="text" value="<?php echo $chave -> ativo; ?>">

                <input class="input btn_enviar" name="bt_cadastrar" value="alterar" type="submit">
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
    $nome_editora = $_POST["nome_editora"];
    $ativo = $_POST["ativo"];

// validação simples (opcional) FAZER PARA VALORES NOT NULL (TALVEZ)
// aqui verificamos se tem algum conteudo no input
    if (empty($nome_editora)) {
        echo "Necessário informar um nome";
        exit();
     
    }

// criando o sql do programa e colocando as
// variaveis magicas                    NECESSITA BANCO
        $sqlup = "UPDATE tb_editoras SET 
        nome_editora = :nome_editora,
        ativo = :ativo
                WHERE id_editora = :id";


// preparando o sql para ser processado
    $stmup = $pdo->prepare($sqlup);

    //substituindo as variaveis magicas por dados digitados
    $stmup->bindParam(':id', $id);
    $stmup->bindParam(':nome_editora', $nome_editora);
    $stmup->bindParam(':ativo', $ativo);

    // se o comando der certo
    if ($stmup->execute()) {
        //mostra mensagem de realização do comando
        echo "Registro inserido com sucesso";
    } else {
        echo "Não foi possivel inserir o registro";
    }
}
?>
  

    