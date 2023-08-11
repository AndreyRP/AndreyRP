
<?php
session_start();
include_once "../php/conexao.php";

$pdo = conectar();
//traz dados
$id = $_GET['id'];
$sql = "SELECT * FROM tb_usuarios WHERE id_usuario = :id";
$stmc = $pdo -> prepare($sql);
$stmc -> bindParam(':id', $id);
$stmc -> execute();
//buscando todas as linhas da tabela
$chave = $stmc -> fetch(PDO::FETCH_OBJ);

?> 

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/cabecalho_login.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>
    <header class="cabecalho">
        <img src="" alt="Logo" class="cabecalho-logo">
        <p class="nome_pagina">Livraria Online</p>
    </header>

    <main class="">
        <form action="" method="post" enctype=multipart/form-data class="formulario">
            <p class="titulo_cadastro">cadastro de usuario</p>

            <label class="label" for="nome_usuario">nome completo:</label>
            <input class="input" id="nome_usuario" name="nome_usuario" type="text" value="<?php echo $chave -> nome_usuario; ?>">

            <label class="label" for="email_usuario">e-mail:</label>
            <input class="input" id="email_usuario" name="email_usuario" type="text" value="<?php echo $chave -> email_usuario; ?>">

            <label class="label" for="cpf_usuario">cpf:</label>
            <input class="input" id="cpf_usuario" name="cpf_usuario" type="text" value="<?php echo $chave -> cpf_usuario; ?>">

            <label class="label" for="rg_usuario">rg:</label>
            <input class="input" id="rg_usuario" name="rg_usuario" type="text" value="<?php echo $chave -> rg_usuario; ?>">

            <label class="label" for="telefone_usuario">telefone:</label>
            <input class="input" id="telefone_usuario" name="telefone_usuario" type="text" value="<?php echo $chave -> telefone_usuario; ?>">

            <label class="label" for="cep_usuario">cep:</label>
            <input class="input" id="cep_usuario" name="cep_usuario" type="text" value="<?php echo $chave -> cep_usuario; ?>">
<!-- 
            <label class="label" for="estado_usuario">estado:</label>
            <select class="input" id="estado_usuario" name="estado_usuario">
                <option value="rs">rio grande do sul</option>
                <option value="sc">santa catarina</option>
                <option value="pr">paraná</option>
                <option value="sp">são paulo</option>
                <option value="es">espirito santo</option>
                <option value="rj">rio de janeiro</option>
                <option value="mg">minas gerais</option>
                <option value="mg">mato grosso</option>
                <option value="ms">mato grosso do sul</option>
                <option value="go">goias</option>
                <option value="ba">baia</option>
                <option value="se">sergipe</option>
                <option value="al">alagoas</option>
                <option value="pe">pernanbuco</option>
                <option value="pb">paraíba</option>
                <option value="rn">rio grande do norte</option>
                <option value="to">tocantins</option>
                <option value="pa">pará</option>
                <option value="ap">amapá</option>
                <option value="am">amazona</option>
                <option value="rr">roraima</option>
                <option value="ro">rondônia</option>
                <option value="ac">acre</option>
                <option value="ce">ceará</option>
                <option value="ma">maranhão</option>
                <option value="pi">piauí</option>
            </select>

            <label class="label" for="cidade">cidade:</label>
            <input class="input" id="cidade" name="cidade" type="text" value="<?php echo $chave -> fk_cidade; ?>">
-->
            <label class="label" for="bairro_usuario">bairro:</label>
            <input class="input" id="bairro_usuario" name="bairro_usuario" type="text" value="<?php echo $chave -> bairro_usuario; ?>">

            <label class="label" for="rua_usuario">rua:</label>
            <input class="input" id="rua_usuario" name="rua_usuario" type="text" value="<?php echo $chave -> rua_usuario; ?>">

            <label class="label" for="numero_usuario">numero da casa:</label>
            <input class="input" id="numero_usuario" name="numero_usuario" type="text" value="<?php echo $chave -> numero_casa_usuario; ?>">

            <label class="label" for="complemento">complemento:</label>
            <textarea class="input text_area" name="complemento" id="complemento" cols="50" rows="4"></textarea>

            <label class="label" for="senha_usuario">senha:</label>
            <input class="input" id="senha_usuario" name="senha_usuario" type="password" value="<?php echo $chave -> senha_usuario; ?>">
<!-- 
            <select class="input" id="ativo" name="ativo" >
                    <option value="ativo">S</option>
                    <option value="ativo">N</option>
            </select>

            <select class="input" id="tipo" name="tipo" >
                    <option value="tipo">C</option>
                    <option value="tipo">A</option>
            </select>
-->
            <input class="input btn_enviar" name="bt_alterar" value="alterar" type="submit">
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
    $nome_usuario = $_POST["nome_usuario"];
    $email_usuario = $_POST["email_usuario"];
    $cpf_usuario = $_POST["cpf_usuario"];
    $rg_usuario = $_POST["rg_usuario"];
    $telefone_usuario = $_POST["telefone_usuario"];
    $cep_usuario = $_POST["cep_usuario"];
    //$estado_usuario = $_POST["estado_usuario"];
    //$cidade = $_POST["cidade"];
    $bairro_usuario = $_POST["bairro_usuario"];
    $rua_usuario = $_POST["rua_usuario"];
    $numero_usuario = $_POST["numero_usuario"];
    $complemento = $_POST["complemento"];
    $senha_usuario = $_POST["senha_usuario"];
    //$ativo = $_POST["ativo"];


// validação simples (opcional) FAZER PARA VALORES NOT NULL (TALVEZ)
// aqui verificamos se tem algum conteudo no input
    if (empty($nome_usuario)) {
        echo "Necessário informar um nome";
        exit();
        //fazer para os outros
    }

// criando o sql do programa e colocando as
// variaveis magicas                    NECESSITA BANCO
    $sqlup = "UPDATE tb_usuarios SET 
    nome_usuario = :nome_usuario, 
    email_usuario = :email_usuario, 
    cpf_usuario = :cpf_usuario,
    rg_usuario = :rg_usuario,
    telefone_usuario = :telefone_usuario, 
    cep_usuario = :cep_usuario, 
    bairro_usuario = :bairro_usuario, 
    rua_usuario = :rua_usuario, 
    numero_casa_usuario = :numero_usuario, 
    complemento = :complemento,
    senha_usuario = :senha_usuario   
              WHERE id_usuario = :id";

// preparando o sqlup para ser processado
    $stmup = $pdo->prepare($sqlup);

    //substituindo as variaveis magicas por dados digitados
    $stmup->bindParam(':id', $id);
    $stmup->bindParam(':nome_usuario', $nome_usuario);
    $stmup->bindParam(':email_usuario', $email_usuario);
    $stmup->bindParam(':cpf_usuario', $cpf_usuario);
    $stmup->bindParam(':rg_usuario', $rg_usuario);
    $stmup->bindParam(':telefone_usuario', $telefone_usuario);
    $stmup->bindParam(':cep_usuario', $cep_usuario);
    //$stmup->bindParam(':estado_usuario', $estado_usuario);
    $stmup->bindParam(':rua_usuario', $rua_usuario);
    $stmup->bindParam(':bairro_usuario', $bairro_usuario);
    $stmup->bindParam(':numero_usuario', $numero_usuario);
    $stmup->bindParam(':complemento', $complemento);
    $stmup->bindParam(':senha_usuario', $senha_usuario);
    //$stmup->bindParam(':cidade', $cidade);
    //$stmup->bindParam(':ativo', $ativo);


    // se o comando der certo
    if ($stmup->execute()) {
        //mostra mensagem de realização do comando
        echo "Registro alterado com sucesso";
        //mandar pra outra pagina
        //header(Location: pagina.php);
    } else {
        echo "Não foi possivel inserir o registro";
    }
}
?>
  

    