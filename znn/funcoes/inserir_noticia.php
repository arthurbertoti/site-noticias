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
            $query = "SELECT * FROM usuarios WHERE usuario = '" . $_POST['usuario'] . "' and senha = '" . $_POST['senha'] . "'";
            $resultado = mysqli_query($link, $query);
    
            if (mysqli_num_rows($resultado) == 1){
                $_SESSION['usuario'] = $_POST['usuario'];
            } else{
                echo "Login inválido!";
            }
        } elseif(isset($_POST['titulo'])){
            $query = "INSERT INTO noticias (id, titulo, texto) VALUES ( NULL, '" . $_POST['titulo'] . "', '" . $_POST['texto'] . "');";
            if (mysqli_query($link, $query)){
                echo "Notícia inserida!";
            } else{
                echo "<p>Erro!</p>";
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
                <a href="editar_noticia.php">Editar notícia</a> |
                <a href="deletar_noticia.php">Deletar notícia</a> |
                <a href="sair.php">Sair</a>
            </p>
            <h2>Insira sua notícia:</h2>
            <form action="inserir_noticia.php" method="post">
                <input type="text" name="titulo" placeholder="Título" id="titulo" required></input>
                <input type="text" name="texto" placeholder="Texto da notícia..." id="texto" required></input>
                <button type="submit" id="enviar">Enviar</button>
            </form>
            <!--Fazer o 'Texto da Notícia' fica maior, e possível do usuário aumentar com o mouse. O texto de começar na direita em cima, como em uma página.-->
    <?php 
        } else{?>
            <form action="inserir_noticia.php" method="post" id='login'>
                <h2>Efetue o login!</h2>
                <input type="text" name="usuario" id="usuario" placeholder="Usuário" required></input>
                <input type="password" name="senha" id="senha" placeholder="Senha" required></input>
                <button type="submit">Efetuar o login</button>
            </form>
    <?php } ?>
</body>
</html>