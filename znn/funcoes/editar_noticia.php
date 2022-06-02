<?php
    $link = mysqli_connect('localhost', 'root', '', 'site');
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <title>ZNN</title>

    <?php
        if(isset($_POST['usuario'])){
            $query = "SELECT * FROM usuarios WHERE usuario = '" . $_POST['usuario'] . "' and senha = '" . $_POST['usuario'] . "'";
            $resultado = mysqli_query($link, $query);
    
            if (mysqli_num_rows($resultado) == 1){
                $_SESSION['usuario'] = $_POST['usuario'];
            } else{
                echo "Login inválido!";
            }
        } elseif(isset($_POST['titulo_antigo'])){
            $titulo_antigo = mysqli_real_escape_string($link, $_POST['titulo_antigo']);
            $titulo_novo = mysqli_real_escape_string($link, $_POST['titulo_novo']);
            $texto_novo = mysqli_real_escape_string($link, $_POST['texto_novo']);
            $query = "UPDATE noticias set titulo = '{$titulo_novo}', texto = '{$texto_novo}' where titulo = '{$titulo_antigo}'";
            if (mysqli_query($link, $query)){
                echo "Notícia editada!";
            } else{
                echo "<p id='error;'>Erro!</p>";
            }
        }
    ?>
</head>
<body>
    <h1>ZNN</h1>
    <?php
        if (isset($_SESSION['usuario'])){ ?>
            <h1>Bem-vindo(a)!</h1>
            <p>
                <a href="../index.php">Página inicial</a> |
                <a href="inserir_noticia.php">Inserir notícia</a> |
                <a href="deletar_noticia.php">Deletar notícia</a> |
                <a href="sair.php">Sair</a>
            </p>
            <h2>Edite sua notícia:</h2>
            <form action="editar_noticia.php" method="post" id="login">
                <input type="text" name="titulo_antigo" placeholder="Título antigo" id="titulo" required></input>
                <input type="text" name="titulo_novo" placeholder="Título novo" id="titulo_novo" required></input>
                <input type="text" name="texto_novo" placeholder="Novo texto da Notícia..." id="texto" required></input>
                <button type="submit" id="enviar">Enviar</button>
            </form>
            <!--Fazer o 'Texto da Notícia' fica maior, e possível do usuário aumentar com o mouse. O texto de começar na direita em cima, como em uma página.-->
    <?php 
        } else{?>
            <form action="editar_noticia.php" method="post" id='login'>
                <h2>Efetue o login!</h2>
                <input type="text" name="usuario" id="usuario" placeholder="Usuário" required></input>
                <input type="password" name="senha" id="senha" placeholder="Senha" required></input>
                <button type="submit">Efetuar o login</button>
            </form>
            <!--Colocar todo o campo de login (botão, inputs e texto) no centro-->
    <?php } ?>
</body>
</html>