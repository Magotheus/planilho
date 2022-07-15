<?php

include('conexao.php');
include('protect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planilho</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header id="header">
        <img src="imagens/planilho.png" alt="logo" id="logo">
        
    </header>

    <div>
        Bem vindo ao Painel, <?php echo $_SESSION['nome']; ?>.

        <p>
            <a href="login.php">Sair</a>
        </p>
    </div>

    <nav id="nav">

    <form action="" >
        <input name="busca" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="Nome, CPF ou Telefone." type="text">
        <button type="submit">Pesquisar</button>
        <button type="submit"><a href="index.php">Limpar</a></button>
    </form>

    </nav>
    <hr>

   

    <?php
        if (!isset($_GET['busca'])) {
            ?>
        
            <div id="msg" >Digite algo para pesquisar...</div>
        
        <?php
        } else {
            $pesquisa = $mysqli->real_escape_string($_GET['busca']);
            $sql_code = "SELECT * 
                FROM bd 
                WHERE CPF LIKE '%$pesquisa%' 
                OR Nome LIKE '%$pesquisa%'
                OR telefone1 LIKE '%$pesquisa%'  
                OR telefone2 LIKE '%$pesquisa%' 
                OR telefone3 LIKE '%$pesquisa%' LIMIT 10 ";
            $sql_query = $mysqli->query($sql_code) or die("ERRO ao consultar! " . $mysqli->error); 
            
            if ($sql_query->num_rows == 0 ) {
                ?>
            
                <div id="msg" >Nenhum resultado encontrado...</div>
            
            <?php
            } else {
                while($dados = $sql_query->fetch_assoc()) {
                    ?>
                    
                    <section class="dados">
                    <div>CPF</div>
                    <div><?php echo $dados['CPF']; ?></div>
                    </section>

                    <section class="dados">
                    <div>Nome</div>
                    <div><?php echo $dados['Nome']; ?></div>
                    </section>

                    <section class="dados">
                    <div>Nascimento</div>
                    <div><?php echo $dados['Nascimento']; ?></div>
                    </section>

                    <section class="dados">
                    <div>Beneficio</div>
                    <div><?php echo $dados['Beneficio']; ?></div>
                    </section>

                    <section class="dados">
                    <div>Especie</div>
                    <div><?php echo $dados['Especie']; ?></div>
                    </section>

                    <section class="dados">
                    <div>DIB</div>
                    <div><?php echo $dados['DIB']; ?></div>
                    </section>

                    <section class="dados">
                    <div>Salario</div>
                    <div>R$ <?php echo $dados['Salario']; ?></div>
                    </section>

                    <section class="dados">
                    <div>Endereço</div>
                    <div><?php echo $dados['endereco']; ?></div>
                    </section>

                    <section class="dados">
                    <div>Bairro</div>
                    <div><?php echo $dados['Bairro']; ?></div>
                    </section>

                    <section class="dados">
                    <div>cidade</div>
                    <div><?php echo $dados['Cidade']; ?></div>
                    </section>

                    <section class="dados">
                    <div>uf</div>
                    <div><?php echo $dados['UF']; ?></div>
                    </section>

                    <section class="dados">
                    <div>cep</div>
                    <div><?php echo $dados['CEP']; ?></div>
                    </section>
                    
                    <section class="dados">
                    <div>telefone1</div>
                    <div><?php echo $dados['Telefone1']; ?></div>
                    </section>

                    <section class="dados">
                    <div>telefone2</div>
                    <div><?php echo $dados['Telefone2']; ?></div>
                    </section>

                    <section class="dados">
                    <div>telefone3</div>
                    <div><?php echo $dados['Telefone3']; ?></div>
                    </section>

                    <section class="dados">
                    <div>telefone4</div>
                    <div><?php echo $dados['Telefone4']; ?></div>
                    </section>

                    <section class="dados">
                    <div>telefone5</div>
                    <div><?php echo $dados['Telefone5']; ?></div>
                    </section>

                    <section class="dados">
                    <div>telefone6</div>
                    <div><?php echo $dados['Telefone6']; ?></div>
                    </section>

                    <section class="dados">
                    <div>email</div>
                    <div><?php echo $dados['Email']; ?></div>
                    </section>
                     
                    <hr>
                    
                    <?php
                }
            }
            ?>
        <?php
        } ?>

</body>
</html>

<!-- <td><?php echo $dados['CPF']; ?></td> -->