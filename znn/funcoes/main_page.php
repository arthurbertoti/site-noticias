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
</head>
<body>
        <h2>O que você deseja fazer?</h2>
        <p>
            <a href="../index.php">Página Inicial</a> |
            <a href="inserir_noticia.php">Inserir notícia</a> | 
            <a href="editar_noticia.php">Editar noticia</a> | 
            <a href="deletar_noticia.php">Deletar noticia</a> |
            <a href="sair.php">Sair</a>
        </p>

</body>
</html>