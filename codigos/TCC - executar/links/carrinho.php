<?php
session_start();
include_once "../php/conexao.php";

$pdo = conectar();

$sql = "SELECT * FROM tb_livros";
$stmc = $pdo -> prepare($sql);
$stmc -> execute();
$resuldato = $stmc ->fetchAll(PDO::FETCH_ASSOC);

if(isset( $_GET['acao'])){
    $id = $_GET['id'];
    $acao = $_GET['acao'];
    if($acao == 'dell'){
        if($_SESSION['carrinho'][$id] == 0){

        }else{
            $_SESSION['carrinho'][$id] -= 1;
        }}
        
    if($acao == 'add'){
            $_SESSION['carrinho'][$id] += 1;
        }
        
    header('?');
}

?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/cabecalho_site.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/css_loja.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <header class="cabecalho">
        <img src="../imgs/logo.png" alt="Logo" class="cabecalho-logo">
            
        <div id="barra_busca">
                <input class="para_pesquisa" type="text" id="txt_busca" placeholder="Buscar..."/>
                <!-- <img src="search3.png" id="txt_busca" alt="Buscar"/> -->
                <button class="btn_buscar" id="btn_busca"></button>
        </div>

        <div class="cabecalho-perfil">
            <p class="nome-perfil">
                <?php 
                    if($_SESSION == true){?>
                        <p class="nome_usuario"><?php echo $_SESSION['nome_usuario'];?></p>

                        <a class="btn_sair" href="./fim_sessao.php">deslogar</a>

                    <?php }else { ?>
                        <a class="btn_logar" href="./login.php">logar/cadastrar</a>
                        <a href="./carrinho.php">carrinho</a>
                    <?php } ?>
            </p>
            
        </div>
    </header>

    <main>
            <p>produtos</p>
           

                <table class="tabela">
                    <h3 class="titulo_tabela" id="produto">Registro produto</h3>
                    <tr>
                        <th class="subtitulo_tabela">produto</th>
                        <th class="subtitulo_tabela">valor</th>
                        <th class="subtitulo_tabela">quantidade</th>
                        <th class="subtitulo_tabela">sub valor</th>
                        <th class="subtitulo_tabela">remover</th>
                        <th class="subtitulo_tabela">adicionar</th>
                    </tr> 
                    
            <?php foreach(array_keys($_SESSION['carrinho']) as $id_produto){ ?>
                <?php foreach($resuldato as $livro) {                    

                        if($id_produto == $livro['id_livro']){
                    ?>
                    <tr>
                        <td><?php echo $livro['titulo_livro']; ?></td>
                        <td><?php echo $livro['valor_livro']; ?></td>
                        <td><?php echo $_SESSION['carrinho'][$id_produto]; 
                            
                        ?></td>
                        <td><?php echo ($livro['valor_livro']*$_SESSION['carrinho'][$id_produto]); ?></td>
                            <td><a href="?id=<?php echo $id_produto?>&acao=add"> + </a></td>
                            <td><a href="?id=<?php echo $id_produto?>&acao=dell"> - </a></td>   
                    </tr>

                    <?php
        
        
    ?>


            <?php }}} ?>

                </table>
           
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



?>