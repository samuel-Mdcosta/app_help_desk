<?php

    session_start();

    //mosntgem do texto
    $titulo = str_replace('#','-', $_POST['titulo']);
    $categoria = str_replace('#','-', $_POST['categoria']);
    $descricao = str_replace('#','-', $_POST['descricao']);

    $texto = $_SESSION['id'] . '#' . $_POST['titulo'] . '#' . $_POST['categoria'] . '#' . $_POST['descricao'] . PHP_EOL;
    
    //fazeno o tratamento doarquivo
    $arquivo = fopen('arquivo.txt','a');
    //nome do aquivo que quer abrir    //tipo de manipulaçao desse arquivo, pode ser consultado em php.net, nesse caso o a ele abre o arquivo para escrita pura

    fwrite($arquivo, $texto);

    fclose( $arquivo );

    header('location:abrir_chamado.php');