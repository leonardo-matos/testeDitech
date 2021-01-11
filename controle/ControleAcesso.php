<?php
session_start();
include_once '../persistencia/PerUsuario.php';
include '../modelo/ModUsuario.php';

if(isset($_GET['op'])){
	switch($_GET['op']){
		case 'logar':
			if(isset($_POST['usuario']) && isset($_POST['senha'])){
			   	
				$u = new PerUsuario();
            
				$u = $u->buscaUsuarioLogin($_POST);
				
				if($u == null){
					$mensagem = 'usuário não encontrado';
					header('location:../index.php?mensagem='.$mensagem);
				}else{
					$_SESSION['id_usuario'] = $u[0]->id_usuario;
					header('location:../interface/Dashboard.php');
				}

			}else{
				return 'Erro !!';
			}
		break;
		
		case 'deslogar':
			session_start();
			session_destroy();
			header("location:../index.php");
		break;	
	}
}
?>