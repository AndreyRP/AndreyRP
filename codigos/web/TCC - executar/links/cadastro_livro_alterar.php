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

    <main class="">
            <form action="" method="post" enctype=multipart/form-data class="formulario">
                <p class="titulo_cadastro">alterar cadastro livro</p>
    
                <label class="label" for="nome_livro">titulo do livro:</label>
                <input class="input" id="nome_livro" name="nome_livro_alt" type="text" value="<?php echo $chave -> titulo_livro; ?>">
    
                <label class="label" for="valor_livro">valor de venda do livro:</label>
                <input class="input" id="valor_livro" name="valor_livro" type="text" value="<?php echo $chave -> valor_livro; ?>">
    
                <label class="label" for="volume_edicao">volume da edição:</label>
                <input class="input" id="volume_edicao" name="volume_edicao" type="text" value="<?php echo $chave -> volume_livro; ?>">
<!-- 
                <label class="label" for="categoria">categoria do livro:</label>
                <div class="categoria">
                    <div>
                        <label class="label" for="suspense">suspense:</label>
                        <input class="input" id="suspense" name="categoria[]" type="checkbox">
                    </div>

                    <div>
                        <label class="label" for="aventura">aventura:</label>
                        <input class="input" id="aventura" name="categoria[]" type="checkbox">
                    </div>

                    <div>
                        <label class="label" for="romance">romance:</label>
                        <input class="input" id="romance" name="categoria[]" type="checkbox">
                    </div>

                    <div>
                        <label class="label" for="drama">drama:</label>
                        <input class="input" id="drama" name="categoria[]" type="checkbox">
                    </div>

                    <div>
                        <label class="label" for="terro">terro:</label>
                        <input class="input" id="terro" name="categoria[]" type="checkbox">
                    </div>

                    <div>
                        <label class="label" for="cientifico">cientifico:</label>
                        <input class="input" id="cientifico" name="categoria[]" value="C" type="checkbox">
                    </div>
                </div>
    
                <label class="label" for="altor_livro">altor do livro:</label>
                <input class="input" id="altor_livro" name="altor_livro" type="text" placeholder="altor do livro">

                <label class="label" for="editora">editora:</label>
                <select class="input" id="editora" name="editora" >
                    <option value="alguma_editora">alguma editora</option>
                    <option value="aquela_editora">aquela editora</option>
                    <option value="editora_boa">editora boa</option>
                </select>


                <label class="label" for="ativo">livro ativo:</label>
                <select class="input" id="ativo" name="livro_ativo" >
                    <option value="ativo">S</option>
                    <option value="ativo">N</option>
                </select>
-->
                <label class="label" for="img_produto">imagem do livro:</label>
                <input class="arquivo_img" id="img_produto" name="img_produto" type="file">

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
       // $categoria = $_POST["categoria[]"];
       // $altor_livro = $_POST["altor_livro"];
       // $editora = $_POST["editora"];
       // $ativo = $_POST["livro_ativo"];
       // $imagem = $_POST["img_produto"];
    
    
    // validação simples (opcional) FAZER PARA VALORES NOT NULL (TALVEZ)
    // aqui verificamos se tem algum conteudo no input
        if (empty($nome_livro)) {
            echo "Necessário informar um nome";
            exit();
            //fazer para os outros
        }
    
    // criando o sql do programa e colocando as
        $sqlup = "UPDATE tb_livros SET 
        titulo_livro = :titulo_livro, 
        valor_livro = :valor_livro, 
        volume_livro = :volume_livro 
                  WHERE id_livro = :id";
    
    
    // preparando o sql para ser processado
        $stmup = $pdo->prepare($sqlup);
    
        //substituindo as variaveis magicas por dados digitados
        $stmup->bindParam(':id', $id);
        $stmup->bindParam(':titulo_livro', $nome_livro);
        $stmup->bindParam(':valor_livro', $valor_livro);
        $stmup->bindParam(':volume_livro', $volume_livro);
        //$stmt->bindParam(':editora', $editora);
        //$stmt->bindParam(':imagem', $imagem);
    
        // se o comando der certo
        if ($stmup->execute()) {
            //mostra mensagem de realização do comando
            echo "alterado com sucesso";
            //mandar pra outra pagina
            //header(Location: pagina.php);
        } else {
            echo "Não foi possivel alterar o registro";
        }
    }
?>