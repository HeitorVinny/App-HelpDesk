<? require_once "validador_acesso.php" ?>

<?php

    // chamados
    $chamados = array();

    // abrir o arquivo .hd
    $arquivo = fopen('arquivo.hd', 'r');

    //enquanto houver registros (linhas) a serem recuperados
    while(!feof($arquivo)) { //vai testando ate encontrar o fim do arquivo 
      $registro = fgets($arquivo); //recupera o que esta na linha e..
      $chamados[] = $registro;  // armazena cada linha em um indice do array
    } 

    // fechar o arquivo aberto
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
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item nav-custom">
          <a href="logoff.php" class="nav-link text-light">SAIR</a>
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
              
              <? foreach($chamados as $chamado) { ?>

              <?php

                // retorna um array
                $chamado_dados = explode('#', $chamado);

                // identificando se eh o perfil do usuario
                if($_SESSION['perfil_id'] == 2){
                  // so vamos exibir o chamado, se ele foi criado pelo usuario
                  if($_SESSION['id'] != $chamado_dados[0]){
                    continue;
                  }
                }

                // verifica se esta faltando titulo, categoria ou descricao, se estiver, ele ira pular essa iteracao
                if(count($chamado_dados) < 3){
                  continue;
                }

              ?>    

              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?=$chamado_dados[1]?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?=$chamado_dados[2]?></h6>
                  <p class="card-text"><?=$chamado_dados[3]?></p>
                </div>
              </div>

              <? } ?>

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