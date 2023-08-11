
<?php
session_start();
include_once "../php/conexao.php";

$pdo = conectar();

$sql = "SELECT * FROM tb_cidades";
$stmc = $pdo -> prepare($sql);
$stmc -> execute();
$resuldato = $stmc ->fetchAll(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="../css/cadastro_pessoa.css">
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
            <input class="input" id="nome_usuario" name="nome_usuario" type="text" placeholder="nome completo">

            <label class="label" for="email_usuario">e-mail:</label>
            <input class="input" id="email_usuario" name="email_usuario" type="text" placeholder="xxxxxxxxx@gmail.com">

            <label class="label" for="cpf_usuario">cpf:</label>
            <input class="input" id="cpf_usuario" name="cpf_usuario" type="text" placeholder="111.222.333-77">

            <label class="label" for="rg_usuario">rg:</label>
            <input class="input" id="rg_usuario" name="rg_usuario" type="text" placeholder="xxxxxxxxx">

            <label class="label" for="telefone_usuario">telefone:</label>
            <input class="input" id="telefone_usuario" name="telefone_usuario" type="text" placeholder="(45) 99999 - 8888">

            <label class="label" for="cep_usuario">cep:</label>
            <input class="input" id="cep_usuario" name="cep_usuario" type="text" placeholder="xxxxxxxxx">

            <label class="label" for="estado_usuario">estado:</label>
            <select class="input" id="estado_usuario" name="estado_usuario" >
                <option value="RS">rio grande do sul</option>
                <option value="SC">santa catarina</option>
                <option value="PR">paraná</option>
                <option value="SP">são paulo</option>
                <option value="ES">espirito santo</option>
                <option value="RJ">rio de janeiro</option>
                <option value="MG">minas gerais</option>
                <option value="MT">mato grosso</option>
                <option value="MS">mato grosso do sul</option>
                <option value="GO">goias</option>
                <option value="BA">baia</option>
                <option value="SE">sergipe</option>
                <option value="AL">alagoas</option>
                <option value="PE">pernanbuco</option>
                <option value="PB">paraíba</option>
                <option value="RN">rio grande do norte</option>
                <option value="TO">tocantins</option>
                <option value="PA">pará</option>
                <option value="AP">amapá</option>
                <option value="AM">amazona</option>
                <option value="RR">roraima</option>
                <option value="RO">rondônia</option>
                <option value="AC">acre</option>
                <option value="CE">ceará</option>
                <option value="MA">maranhão</option>
                <option value="PI">piauí</option>
            </select>

            <label class="label" for="estado_usuario">estado:</label>
            <select class="input" id="estado_usuario" name="estado_usuario" >
            <?php foreach ($resuldato as $estado) { ?>
                        <option value=""> <?php 
                            echo $estado['nome']; ?>
                            </option>
                    <?php } ?>
            </select>

            <label class="label" for="cidade">cidade:</label>
            <input class="input" id="cidade" name="cidade" type="text" placeholder="cidade">

            <label class="label" for="bairro_usuario">bairro:</label>
            <input class="input" id="bairro_usuario" name="bairro_usuario" type="text" placeholder="bairro">

            <label class="label" for="rua_usuario">rua:</label>
            <input class="input" id="rua_usuario" name="rua_usuario" type="text" placeholder="rua">

            <label class="label" for="numero_usuario">numero da casa:</label>
            <input class="input" id="numero_usuario" name="numero_usuario" type="text" placeholder="numero da casa:">

            <label class="label" for="complemento">complemento:</label>
            <textarea class="input text_area" name="complemento" id="complemento" cols="50" rows="4"></textarea>

            <label class="label" for="senha_usuario">senha:</label>
            <input class="input" id="senha_usuario" name="senha_usuario" type="password" placeholder="**********">

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
    $nome_usuario = $_POST["nome_usuario"];
    $email_usuario = $_POST["email_usuario"];
    $cpf_usuario = $_POST["cpf_usuario"];
    $rg_usuario = $_POST["rg_usuario"];
    $telefone_usuario = $_POST["telefone_usuario"];
    $cep_usuario = $_POST["cep_usuario"];
    //$cidade = $_POST["cidade"];
    $bairro_usuario = $_POST["bairro_usuario"];
    $rua_usuario = $_POST["rua_usuario"];
    $numero_usuario = $_POST["numero_usuario"];
    $complemento = $_POST["complemento"];
    $senha_usuario = $_POST["senha_usuario"];


// validação simples (opcional) FAZER PARA VALORES NOT NULL (TALVEZ)
// aqui verificamos se tem algum conteudo no input
    if (empty($nome_usuario)) {
        echo "Necessário informar um nome";
        exit();
        //fazer para os outros
    }

// criando o sql do programa e colocando as
// variaveis magicas                    NECESSITA BANCO
    $sql = "INSERT INTO tb_usuarios 
    (nome_usuario, email_usuario, cpf_usuario, rg_usuario, telefone_usuario, cep_usuario,
    rua_usuario, bairro_usuario, numero_casa_usuario, complemento, senha_usuario) 
    VALUES 
    (:nome_usuario, :email_usuario, :cpf_usuario, :rg_usuario, :telefone_usuario, :cep_usuario,
    :rua_usuario, :bairro_usuario, :numero_casa_usuario, :complemento, :senha_usuario) ";

// preparando o sql para ser processado
    $stmt = $pdo->prepare($sql);

    //substituindo as variaveis magicas por dados digitados
    $stmt->bindParam(':nome_usuario', $nome_usuario);
    $stmt->bindParam(':email_usuario', $email_usuario);
    $stmt->bindParam(':cpf_usuario', $cpf_usuario);
    $stmt->bindParam(':rg_usuario', $rg_usuario);
    $stmt->bindParam(':telefone_usuario', $telefone_usuario);
    $stmt->bindParam(':cep_usuario', $cep_usuario);
    //$stmt->bindParam(':estado_usuario', $estado_usuario);
    $stmt->bindParam(':rua_usuario', $rua_usuario);
    $stmt->bindParam(':bairro_usuario', $bairro_usuario);
    $stmt->bindParam(':numero_casa_usuario', $numero_usuario);
    $stmt->bindParam(':complemento', $complemento);
    $stmt->bindParam(':senha_usuario', $senha_usuario);
    //$stmt->bindParam(':cidade', $cidade);


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
  

    