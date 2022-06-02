<?php
    $link = mysqli_connect('localhost', 'root', '', 'site');
    if(!$link){
        echo "Error: Falha ao conectar-se com o banco de dados MySQL.";
        echo "Debugging error: " . mysqli_connect_error();
        exit;
    }
?>