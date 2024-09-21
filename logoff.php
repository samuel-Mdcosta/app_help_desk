<?php
    session_start();

    session_destroy();
    //redireciona apos destruir a sessao aberta
    header('location:index.php');
