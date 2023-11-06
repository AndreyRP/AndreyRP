<?php
session_start();
include_once "../php/conexao.php";

$pdo = conectar();

$sql = "SELECT * FROM tb_livros";
$stmc = $pdo -> prepare($sql);
$stmc -> execute();
$resuldato = $stmc ->fetchAll(PDO::FETCH_ASSOC);

$sqlc = "SELECT * FROM tb_categorias";
$stmt = $pdo -> prepare($sqlc);
$stmt -> execute();
$classe = $stmt ->fetchAll(PDO::FETCH_ASSOC);

$sqlv = "SELECT nome_categoria, fk_livro FROM tb_categorias
JOIN tb_categorias_livros
ON tb_categorias.id_categoria = tb_categorias_livros.fk_categoria";
$stmv = $pdo -> prepare($sqlv);
$stmv -> execute();
$mult_valor = $stmv -> fetchAll(PDO::FETCH_ASSOC);

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
                        
                        <a href="./carrinho.php">carrinho</a>

                    <?php }else { ?>
                        <a class="btn_logar" href="./login.php">logar/cadastrar</a>
                        
                    <?php } ?>
            </p>
            
        </div>
    </header>

    <main>
        
            <ul class="filtro">
                <li class="input_titulo">Categoria</li>

                <li><button class="input_categoria" href="#" id="todos" value="todos">todos</button>
                </li>
                <?php ?>
                <li><button class="input_categoria" href="#" id="suspense" value="suspence">suspence</button>
                </li>
                <li><button class="input_categoria" href="#" id="terror" value="terror">terror</button>
                </li>
                <li><button class="input_categoria" href="#" id="aventura" value="aventura">aventura</button>
                </li>
                <li><button class="input_categoria" href="#" id="romance" value="romance">romance</button>
                </li>
                <li><button class="input_categoria" href="#" id="drama" value="drama">drama</button>
                </li>
              </ul>



        </section>

        <section class="loja">
            <h2 class="titulo_loja">promoção da semana</h2>
                <section class="itens_loja">
                    <?php foreach($resuldato as $livro) { ?>
                        
                        <section class="item">   
                            <img class="imagem" src="../imgs/<?php echo $livro['imagem_livro']; ?>" alt="imagem livro" >
                            <h3 class="titulo_livro" id="titulo"><?php echo $livro['titulo_livro']; ?></h3>
                            <p class="valor_livro">valor: R$<?php echo formatar($livro['valor_livro']); ?></p>
                            <div class="categoria none" >
                               <p>Categoria:</p>

                                <?php foreach($mult_valor as $valor){ 
                                    if($valor['fk_livro'] == $livro['id_livro']){  ?>
                                                      
                                    <p class="nome_categoria" ><?php 
                                        echo $valor['nome_categoria']; }?></p>
                                
                                <?php }?>

                            </div>
                            <a class="btn_compra" href="../links/pag_produto.php?id=<?php echo $livro['id_livro']; ?>">compre agora</a>
                        </section>
                    <?php } ?>
                </section>   
            
                    
                         
        </section>
    </main>

    <footer class="rodape">
        <div class="descricao-rodape">
            <P class="texto">qualquer sugestão para melhorar nossos serviços entrar em contato com</P>
            <p class="texto">org.livraria_online@gmail.com</p>
        </div>
    </footer>

    <script src="../js/filtro_loja.js"></script>
    
    <script> 
        
function performSearch() {
    let searchTerm = document.getElementById('txt_busca').value;
    const searchResults = document.querySelectorAll('.titulo_livro');
    searchTerm = searchTerm.toLowerCase();
  
    // Lógica da pesquisa aqui
    // Por exemplo, você pode usar AJAX para buscar dados no servidor e exibir os resultados aqui
  
    // Exemplo: Vamos apenas exibir a consulta como texto
    console.log(searchResults[2]);
    console.log(searchTerm);
   
    for(i = 0; i < searchResults.length; i++){
        if(!searchResults[i].innerHTML.toLowerCase().includes(searchTerm)){
            searchResults[i].parentNode.classList.add('none');
        }else{
            console.log(searchResults[i].innerHTML);
            searchResults[i].parentNode.classList.remove('none');
        }
    }
  }
  
  // Event listener para o botão de pesquisa
  document.getElementById('btn_busca').addEventListener('click', performSearch);
  
  // Event listener para a tecla "Enter" no campo de pesquisa
  document.getElementById('txt_busca').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
      performSearch();
    }
  });

</script>
</body>
</html>