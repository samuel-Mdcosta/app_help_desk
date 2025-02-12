<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>
    
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <!-- mana como requisiçao o arquvo validaLogin.php no comando submit do formulario -->
               <!-- o comando action define para onde sera levado as informaçoes do formulario, como se fosse o <a> para um link -->
              <form action="validaLogin.php" method="post">
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>

                <!-- pega informação pelo nome coma a tag get, assim vendo com a função isset-
                 se o nome do indice foi devidamente setado -->
                <?php
                if(isset($_GET['login']) && $_GET['login'] == 'erro') {
                ?>

                  <div class="text-danger">
                    usuario ou senha invalido(s)
                  </div>                  

                <?php } ?>
                
                <?php
                if(isset($_GET['login']) && $_GET['login'] == 'erro2') {
                ?>

                  <div class="text-danger">
                    faça login antes de ascessar a pagina
                  </div>                  

                <?php } ?>
                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>