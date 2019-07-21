<?php

    session_start();
    
    // montando os textos
    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);

    $texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;

    // abrindo o arquivo
    $arquivo = fopen('arquivo.hd', 'a');
    // Escrevendo o texto
    fwrite($arquivo, $texto);
    // Fechando o arquivo
    fclose($arquivo);

    // redirecionando novamente para a pagina abrir_chamado.php
    header('Location: abrir_chamado.php');

    

?>