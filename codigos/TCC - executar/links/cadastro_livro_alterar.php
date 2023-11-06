<?php
session_start();
include_once "../php/conexao.php";

$pdo = conectar();
//traz dados
$id = $_GET['id'];
$sql = "SELECT * FROM tb_livros WHERE id_livro = :id";
$stmc = $pdo -> prepare($sql);
$stmc -> bindParam(':id', $id);
$stmc -> execute();
//buscando todas as linhas da tabela
$chave = $stmc -> fetch(PDO::FETCH_OBJ);

$sqlc = "SELECT * FROM tb_categorias";
$stmcc = $pdo -> prepare($sqlc);
$stmcc -> execute();
$resultado = $stmcc ->fetchAll(PDO::FETCH_ASSOC);

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
            <form action="" method="post" enctype=multipart/form-data class="formulario">
                <p class="titulo_cadastro">alterar cadastro livro</p>
    
                <label class="label" for="nome_livro">titulo do livro:</label>
                <input class="input" id="nome_livro" name="nome_livro_alt" type="text" value="<?php echo $chave -> titulo_livro; ?>">
    
                <label class="label" for="valor_livro">valor de venda do livro:</label>
                <input class="input" id="valor_livro" name="valor_livro" type="text" value="<?php echo $chave -> valor_livro; ?>">
    
                <label class="label" for="volume_edicao">volume da edição:</label>
                <input class="input" id="volume_edicao" name="volume_edicao" type="text" value="<?php echo $chave -> volume_livro; ?>">
 
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
                        <option value="<?php echo $editora['id_editora']; ?>"> <?php echo $editora['nome_editora']; ?></option>
                    <?php } ?>
                </select>

                <label class="label" for="ativo">livro ativo:</label>
                <select class="input" id="ativo" name="livro_ativo" >
                    <option value="S">Ativo</option>
                    <option value="N">DESATIVADO</option>
                </select>

                <label class="label" for="sinopse">sinopse:</label>
                <input class="arquivo_img" id="sinopse" name="sinopse" value="<?php echo $chave -> sinopse; ?>" type="text">

                <label class="label" for="img_produto">imagem do livro:</label>
                <input class="arquivo_img" id="img_produto" name="img_produto" value="<?php echo $chave -> imagem_livro; ?>" type="file">

                <button class="input btn_enviar" name="bt_alterar" type="submit">Alterar</button>
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
if (isset($_POST['bt_alterar'])) {
    // receba o conteudo digitado no input
    // deve ser feito um para cada input
        $nome_livro = $_POST["nome_livro_alt"];
        $valor_livro = $_POST["valor_livro"];
        $volume_livro = $_POST["volume_edicao"];
        $categoria = $_POST["categoria"];
        $autor = $_POST["autor"];
       $editora = $_POST["editora"];
       $ativo = $_POST["livro_ativo"];
       $img = $_FILES["img_produto"];
       $imagem = $img['name'];
       $sinopse = $_POST['sinopse'];
    
    // validação simples (opcional) FAZER PARA VALORES NOT NULL (TALVEZ)
    // aqui verificamos se tem algum conteudo no input
        if (empty($nome_livro && $imagem && $ativo)) {
            echo "Necessário informar um campo";
            exit();
            //fazer para os outros
        }
    
    // criando o sql do programa e colocando as
        $sqlup = "UPDATE tb_livros SET 
        titulo_livro = :titulo_livro, 
        valor_livro = :valor_livro, 
        ativo = :ativo,
        volume_livro = :volume_livro,
        fk_editora = :editora,
        imagem_livro = :imagem,
        sinopse = :sinopse
                  WHERE id_livro = :id";
    
        $delete_categoria = "DELETE FROM tb_categorias_livros WHERE fk_livro = $id";
        $pdo->query($delete_categoria);
        $delete_autor = "DELETE FROM tb_autores_livros WHERE fk_livro = $id";
        $pdo->query($delete_autor);
        


            foreach ($categoria as $categoriaId) {
                $sqlRelacionamento = "INSERT INTO tb_categorias_livros (fk_categoria, fk_livro) VALUES ($categoriaId, $id)";
                $pdo->query($sqlRelacionamento);
                }
        
            foreach ($autor as $auto) {
                $mult_valorada = "INSERT INTO tb_autores_livros (fk_autor, fk_livro) VALUES ($auto, $id)";
                $pdo->query($mult_valorada);
                }

    // preparando o sql para ser processado
        $stmup = $pdo->prepare($sqlup);
    
        //substituindo as variaveis magicas por dados digitados
        $stmup->bindParam(':id', $id);
        $stmup->bindParam(':titulo_livro', $nome_livro);
        $stmup->bindParam(':valor_livro', $valor_livro);
        $stmup->bindParam(':volume_livro', $volume_livro);
        $stmup->bindParam(':editora', $editora);
        $stmup->bindParam(':imagem', $imagem);
        $stmup->bindParam(':ativo', $ativo);
        $stmup->bindParam(':sinopse', $sinopse);
    
        // se o comando der certo
        if ($stmup->execute()) {
            
            


            //mostra mensagem de realização do comando
            echo "alterado com sucesso";
            //mandar pra outra pagina
            //header('location: pag_consulta_livro.php');
        } else {
            echo "Não foi possivel alterar o registro";
        }
        
    }
?>