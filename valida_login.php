<?php

	session_start();

	// variável que verifica se a autenticação foi realizada
	$usuario_autenticado = false;

	// armazena a identificacao do USUARIO, ou seja, pra dizer se eh o adm, user, jose ou maria
	$usuario_id = null;

	// armazena a identifacao do PERFIL do usuario, ou seja, para dizer se eh adminstrativo ou um perfil de usuario
	$usuario_perfil_id = null;

	$perfis = array(1 => 'Adminstrativo', 2 => 'Usuario');
	
	// usuários do sistema
    $usuarios_app = array(
    	array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '1234','perfil_id' => 1), // estou usando o id para ajudar na identificacao do usuario
		array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
		array('id' => 3, 'email' => 'jose@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
		array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => '1234', 'perfil_id' => 2)
    ); 

    foreach($usuarios_app as $user){
    	
    	if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
			$usuario_autenticado = true;
			$usuario_id = $user['id']; // armazenando o id nessa variavel que criei para posteriormente atribuir o valor a uma variavel de sessao
			$usuario_perfil_id = $user['perfil_id'];
    	}
    }

    if($usuario_autenticado){
		echo 'Usuário autenticado';
		$_SESSION['autenticado'] = 'SIM';
		$_SESSION['id'] = $usuario_id; // atribuindo o id do usuario logado dentro dessa variavel de sessao para que fique disponivel em todo  o escopo da aplicacao
		$_SESSION['perfil_id'] = $usuario_perfil_id; 
		header('Location: home.php');	
    }else {
		$_SESSION['autenticado'] = 'NAO';
    	header('Location: index.php?login=erro');
    }
 	


?>

