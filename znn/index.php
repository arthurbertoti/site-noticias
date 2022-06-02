<?php
    include ('funcoes/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/main_style.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <title>ZNN</title>
</head>
<body>
    <header>
        <h1>Bem-vindo ao Central da notícia</h1>
        <a href="funcoes/main_page.php">É um editor(a)?</a>
    </header>
    <?php
        $sql = 'select * from noticias';
        $resultados = mysqli_query($link, $sql);
        
        if(mysqli_num_rows($resultados) > 0) {
            while ($linha = mysqli_fetch_assoc($resultados)) {
                echo "<div>";
                echo "<h2>", $linha['titulo'],"</h2>";
                echo '<p> &nbsp;&nbsp;&nbsp;&nbsp;', $linha['texto'], '</p>';
                echo "</div>";
            }
        }else{
            echo "Nenhuma notícia encontrada!";
        }
    ?>
    <!--Tornar cada nova notícia em um novo bloco, que fique uma abaixo da outra com seu tamanho automático de acordo com o tamanho do texto-->
</body>
</html>