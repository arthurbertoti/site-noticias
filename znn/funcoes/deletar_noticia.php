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
                $_SESSION['usuario'] = $_POST['usuario']
                ;
            } else{
                echo "Login inválido!";
            }
        } elseif(isset($_POST['titulo'])){
            $titulo = mysqli_real_escape_string($link, $_POST['titulo']);

            $query = "DELETE from noticias where titulo = '{$titulo}'";
        
            $resultado = mysqli_query($link, $query);
            if (mysqli_query($link, $query)){
                echo "Notícia deletada!";
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
                <a href="inserir_noticia.php">Inserir notícia</a> |
                <a href="editar_noticia.php">Editar notícia</a> |
                <a href="sair.php">Sair</a>
            </p>
            <h2>Delete uma notícia:</h2>
            <form action="deletar_noticia.php" method="post" id="login">
                <input type="text" name="titulo" placeholder="Título" id="titulo" required></input>
                <button type="submit" id="deletar">Deletar</button>
            </form>
    <?php 
        } else{?>
            <form action="deletar_noticia.php" method="post">
            <div id="login">
                <input type="text" name="usuario" id="txtusuario" placeholder="Usuário"><br><br>
                <input type="password" name="senha" id="txtsenha" placeholder="Senha"> <br><br>
                <input type="submit" value="Log in" class="login">
            </div>
            </form>
    <?php } ?>
</body>
</html>