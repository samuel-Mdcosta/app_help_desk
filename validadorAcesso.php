<?php
    session_start();
    //caso a autenticação não for valida ela ira retornar para o index de qulaquer maneira
    if (!isset($_SESSION['autenticado']) or $_SESSION['autenticado'] != 'SIM'){
    header('location: index.php?login=erro2');
    }
    