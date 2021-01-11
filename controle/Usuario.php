<?php

session_start();
// session_unset();

include '../modelo/ModUsuario.php';
include '../persistencia/PerUsuario.php';

if(isset($_GET['op'])){

	switch($_GET['op']){
		
		case 'listar':
            
            $u = new PerUsuario();
			$listaUsuario = array();
            $listaUsuario = $u->listarUsuarios();
            			
			$_SESSION['listaUsuario'] = serialize($listaUsuario);
			
			header('location:../interface/IntConsUsuario.php');
		break;
        
        case 'listarPessoas':
            
            $p = new PerUsuario();
			$listaPessoas = array();
			$listaPessoas = $p->listarPessoas();
			$acao = 'cadastrar';
            			
			$_SESSION['listaPessoas'][0] = serialize($listaPessoas);
			$_SESSION['listaPessoas'][1] = $acao;
			
			header('location:../interface/IntCadUsuario.php');
		break;
		
		case 'cadastrar':

            if(isset($_POST['pessoa']) && isset($_POST['login']) && isset($_POST['senha']) && isset($_POST['tipo'])){
                
                $u = new ModUsuario();
				$u->id_pessoa = $_POST['pessoa'];
				$u->login = $_POST['login'];
				$u->senha = $_POST['senha'];
                $u->tipo = $_POST['tipo'];

                $pUsuario = new PerUsuario();
				$pUsuario->cadastrarUsuario($u);
				$_SESSION['u'] = serialize($u);
				$_SESSION['erros'] = 'Dados salvos com sucesso !!';
				header('location:../interface/IntConsUsuario.php');

            }else{
                $_SESSION['erros'] = 'Erro ao enviar dados !!';
				header('location:../interface/IntConsUsuario.php');
            }
        break;
		
		case 'buscaUsuarioPorId':

            $p = new PerUsuario();
            $u = new PerUsuario();
            
			$listaPessoas = $p->listarPessoas();
			$usuario = $u->buscaUsuarioPorId($_GET['id']);
			$acao = 'editar';			
			
			$_SESSION['listaPessoas'][0] = serialize($listaPessoas);
			$_SESSION['listaPessoas'][1] = $acao;
			$_SESSION['listaPessoas'][2] = serialize($usuario);
			
			header('location:../interface/IntCadUsuario.php');    
        break;
		
		case 'editar':
			
            if(isset($_POST['pessoa']) && isset($_POST['login']) && isset($_POST['senha']) && isset($_POST['tipo']) && isset( $_GET['id_usuario'])){

                $u = new ModUsuario();
				$u->id_usuario = $_GET['id_usuario'];
				$u->id_pessoa = $_POST['pessoa'];
				$u->login = $_POST['login'];
				$u->senha = $_POST['senha'];
                $u->tipo = $_POST['tipo'];
				
                $pUsuario = new PerUsuario();
				$pUsuario->atualizarUsuario($u);
				$_SESSION['u'] = serialize($u);
				$_SESSION['erros'] = 'Dados salvos com sucesso !!';
				header('location:../interface/IntConsUsuario.php');
				
            }else{
				$_SESSION['erros'] = 'Erro ao alterar usuário !!';
				header('location:../interface/IntConsUsuario.php');
            }
		break;
		
		case 'deletar':
			
            if(isset($_GET['id_usuario'])){

                $u = new ModUsuario();
				$u->id_usuario = $_GET['id_usuario'];
				
                $pUsuario = new PerUsuario();
				$pUsuario->deletarUsuario($u);
				$_SESSION['u'] = serialize($u);
				header('location:../interface/IntConsUsuario.php');
				
            }else{
				$_SESSION['erros'] = 'Erro ao deletar usuário !!';
				header('location:../interface/IntConsUsuario.php');
            }
        break;
	}
}
?>