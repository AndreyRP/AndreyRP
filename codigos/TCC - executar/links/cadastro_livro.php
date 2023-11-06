    <?php
session_start();
include_once "../php/conexao.php";

$pdo = conectar();


$sql = "SELECT * FROM tb_categorias";
$stmc = $pdo -> prepare($sql);
$stmc -> execute();
$resultado = $stmc ->fetchAll(PDO::FETCH_ASSOC);

$sqla = "SELECT * FROM tb_autores";
$stmca = $pdo -> prepare($sqla);
$stmca -> execute();
$autor_res = $stmca ->fetchAll(PDO::FETCH_ASSOC);

$sqle = "SELECT * FROM tb_editoras";
$stmce = $pdo -> prepare($sqle);
$stmce -> execute();
$editora_res = $stmce ->fetchAll(PDO::FETCH_ASSOC);
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
                <p class="titulo_cadastro">cadastro novo livro</p>
    
                <label class="label" for="nome_livro">titulo do livro:</label>
                <input class="input" id="nome_livro" name="nome_livro" type="text" placeholder="titulo livro">
    
                <label class="label" for="valor_livro">valor de venda do livro:</label>
                <input class="input" id="valor_livro" name="valor_livro" type="text" placeholder="valor do livro">
    
                <label class="label" for="volume_edicao">volume da edição:</label>
                <input class="input" id="volume_edicao" name="volume_edicao" type="text" placeholder="volume da edição">

                            <label class="label" for="categoria">categoria:</label>
                            <select class="input" id="categoria" name="categoria[]" multiple><td> 
                                <?php foreach ($resultado as $ca) { ?>
                                    <option value="<?php echo $ca['id_categoria']; ?>"> <?php echo $ca['nome_categoria']; ?></option>
                                <?php } ?>
                            </select>

                            <label class="label" for="autor">autor:</label>
                            <select class="input" id="autor" name="autor[]" multiple>
                                <?php foreach ($autor_res as $autor) { ?>
                                    <option value="<?php echo $autor['id_autor']; ?>"> <?php echo $autor['nome_autor']; ?></option>
                                <?php } ?>
                            </select>

                            <label class="label" for="editora">editora:</label>
                            <select class="input" id="editora" name="editora">
                                <?php foreach ($editora_res as $editora) { ?>
                                    <option value="<?php echo $editora['id_editora']; ?>"> 
                                    <?php echo $editora['nome_editora']; ?></option>
                                <?php } ?>
                            </select>
                            
                            <label class="label" for="sinopse">sinopse:</label>
                            <input class="arquivo_img" id="sinopse" name="sinopse" type="text">        

                            <label class="label" for="img_produto">imagem do livro:</label>
                            <input class="arquivo_img" id="img_produto" name="img_produto" type="file">

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
    $nome_livro = $_POST["nome_livro"];
    $valor_livro = $_POST["valor_livro"];
    $volume_livro = $_POST["volume_edicao"];
    $categoria = $_POST["categoria"];
    $autor = $_POST["autor"];
    $editora = $_POST["editora"];
    $img = $_FILES["img_produto"];
    $imagem = $img['name'];
    $sinopse = $_POST["sinopse"];

    var_dump($autor);

// validação simples (opcional) FAZER PARA VALORES NOT NULL (TALVEZ)
// aqui verificamos se tem algum conteudo no input
    if (empty($nome_livro)) {
        echo "Necessário informar um nome";
        exit();
        //fazer para os outros
    }

// criando o sql do programa e colocando as
// variaveis magicas                    NECESSITA BANCO
    $sql = "INSERT INTO tb_livros (titulo_livro, valor_livro, volume_livro, fk_editora, imagem_livro, sinopse) 
    VALUES (:titulo_livro, :valor_livro, :volume_livro, :editora, :imagem, :sinopse)";

    
    

// preparando o sql para ser processado
    $stmt = $pdo->prepare($sql);

    //substituindo as variaveis magicas por dados digitados
    $stmt->bindParam(':titulo_livro', $nome_livro);
    $stmt->bindParam(':valor_livro', $valor_livro);
    $stmt->bindParam(':volume_livro', $volume_livro);
    $stmt->bindParam(':editora', $editora);
    $stmt->bindParam(':imagem', $imagem);
    $stmt->bindParam(':sinopse', $sinopse);

    // se o comando der certo
    if ($stmt->execute()) {

        $produtoId = $pdo -> lastInsertId(); // Obtém o ID do produto recém-inserido
    // Inserir entradas na tabela de relacionamento para cada categoria selecionada
    foreach ($categoria as $categoriaId) {
        $sqlRelacionamento = "INSERT INTO tb_categorias_livros (fk_categoria, fk_livro) VALUES ($categoriaId, $produtoId)";
        $pdo->query($sqlRelacionamento);
        }

    foreach ($autor as $auto) {
        $mult_valorada = "INSERT INTO tb_autores_livros (fk_autor, fk_livro) VALUES ($auto, $produtoId)";
        $pdo->query($mult_valorada);
        }

    }
        //mostra mensagem de realização do comando
        echo "Registro inserido com sucesso";
        //mandar pra outra pagina
        //header(Location: pagina.php);
    } else {
        echo "Não foi possivel inserir o registro";
    }

?>