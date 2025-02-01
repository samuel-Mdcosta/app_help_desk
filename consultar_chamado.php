<?php
require_once "validadorAcesso.php";

$chamados = array();

// Abre o arquivo já arquivado
$arquivo = fopen('arquivo.txt', 'r');

// Percorre o arquivo enquanto tiver linhas para serem executadas
while (!feof($arquivo)) {
    $registro = fgets($arquivo);
    // Aloca dinamicamente de modo sequencial dentro do array
    $chamados[] = $registro;
}

// Fechar o arquivo aberto
fclose($arquivo);

?>

<html>
<head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .card-consultar-chamado {
            padding: 30px 0 0 0;
            width: 100%;
            margin: 0 auto;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="home.php">
            <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            App Help Desk
        </a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="logoff.php">SAIR</a>
            </li>
        </ul>
    </nav>

        <div class="container">
            <div class="row">
                <div class="card-consultar-chamado">
                    <div class="card">
                        <div class="card-header">
                            Consulta de chamado
                        </div>
                        <div class="card-body">
                            <!--aloca os dados do arquivo dentro cards percorrendo o arquivo com o foreach -->
                            <?php foreach ($chamados as $chamado) { ?>

                                <?php
                                //trasforma a variavel em string para alocar denrtro dos card
                                $chamado_dados = explode('#', trim($chamado));

                                if($_SESSION['perfilID'] == 2){
                                    //so exibe o chamado de ele foi feito pelo usuario
                                    if($_SESSION['id'] != $chamado_dados[0]){
                                        continue;
                                    }
                                }

                                //elimina a ultima linha dentro do arquivo por causa do php_odl
                                if (count($chamado_dados) < 3) {
                                    continue;
                                }
                                ?>
                                <!--onde sera impresso as informações do arquivo -->
                                <div class="card mb-3 bg-light">
                                    <div class="card-body">
                                    <!--nao comeca do zero por causa que o zero seria aposiçao do id da pessoa -->
                                        <h5 class="card-title"><?= $chamado_dados[1] ?></h5>
                                        <h6 class="card-subtitle mb-2 text-muted"><?= $chamado_dados[2] ?></h6>
                                        <p class="card-text"><?= $chamado_dados[3] ?></p>
                                    </div>
                                </div>

                            <?php } ?>

                            <div class="row mt-5">
                                <div class="col-6">
                                    <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>