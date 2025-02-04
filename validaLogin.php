<?php
    // o carcter "-" é para mostrar que é uma frase só, e que a de baixo faz parte do contexto
    //autenticando usuario 
    //fazendo a validação do usuario

    session_start();

    //variavel que verifica se a autenticação foi realizada
    $usuarioAutenticado = false;
    //seta o id do usuario
    $usuarioId = null;
    $usuarioPerfilId = null;

    //validaçao de quem pode ver os chamdos abertos em caso de adm pode ver todos, em caso de pessoa normal so ve aqueles chamados que ele mesmo abriu
    $perfil = array(1 => 'Administrativo', 2 => 'usuário');

    //como não estou usando banco de dados ainda, o armazenamento do -
    //usuario sera em hardCode
    //simulando um banco de dados o fakeDb
    $usuario_app = array(
        array('id' => 1, 'email' =>'adm@teste.com.br','senha'=> '1234', 'perfilID' => 1),
        array('id' => 2,'email'=> 'user@teste.com.br','senha'=> '1234','perfilID' => 1),
        array('id' => 2,'email'=> 'openadm@adiministrador.com.br','senha'=> '1234','perfilID' => 1),
        array('id' => 3,'email'=> 'jose@teste.com.br','senha'=> '1234', 'perfilID' => 2),
        array('id' => 4,'email'=> 'maria@teste.com.br','senha'=> '1234', 'perfilID' => 2),
        array('id' => 5, 'email' => 'marcos@teste.com.br', 'senha' => '1234', 'perfilID' => 2)
    );

    //percorre o array que simula o banco de dados (fakeDb), para que -
    //faca a condiçao se existe ou nao o login do fakeDb com o que ta -
    //sendo inseri dentro do formulario
    foreach($usuario_app as $user){
        //valida se o email e senha cadastradas no fakeDb ($usuario_app) é a mesma que o usurio digitou no formulario
        //faz o tratamento de negocio onde valida se o login esta send feito por um adm ou usuario
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
            $usuarioAutenticado = true;
            $usuario_Id = $user['id'];
            $usuarioPerfilId = $user['perfilID'];
        }
    
        //autentica a variavel
        if($usuarioAutenticado){

            //inicio de uma sessão para que seja criada uma instancia tipo proxy -
            //para comunicar as requisiçoes que o front faz para o back-end
            echo 'usuario autenticado';
            $_SESSION['autenticado'] = 'SIM';
            $_SESSION['id'] = $usuario_Id;
            $_SESSION['perfilID'] = $usuarioPerfilId;
            //direcionando o usuario para home.php
            header('location:home.php');
        }else{
            //header (função nativa do php para um desvio, caso a condição) -
            //chegue aqui ela ira ir para outra pagina

            $_SESSION['autenticado'] = 'NÃo';
            header('location:index.php?login=erro');
        }
    }

