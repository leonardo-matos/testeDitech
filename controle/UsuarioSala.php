<?php

session_start();
// session_unset();

include '../modelo/ModUsuarioSala.php';
include '../persistencia/PerUsuarioSala.php';

if(isset($_GET['op'])){
	switch($_GET['op']){
		
		case 'listar':
            
            $u = new PerUsuarioSala();
            $listaUsuarioSala = array();
            
            $listaUsuarioSala = $u->listar($_SESSION['id_usuario']);

			$_SESSION['listaUsuarioSala'] = serialize($listaUsuarioSala);
			
			header('location:../interface/IntConsUsuarioSala.php');
		break;
        
        case 'listarUsuarioSala':
            
            $s = new PerUsuarioSala();
			$listaSalas = array();
			$listaSalas = $s->listarSalas();
			$acao = 'cadastrar';
            			
			$_SESSION['listaSalas'][0] = serialize($listaSalas);
			$_SESSION['listaSalas'][1] = $acao;
			
			header('location:../interface/IntCadUsuarioSala.php');
		break;
		
        case 'cadastrar':

            if(isset($_POST['id_sala']) && isset($_POST['horaInicial']) && isset($_POST['horaFinal']) && isset($_POST['ativo'])){
                
                $us = new ModUsuarioSala();
				$us->id_sala = $_POST['id_sala'];
				$us->horaInicial = $_POST['horaInicial'];
				$us->horaFinal = $_POST['horaFinal'];
                $us->ativo = $_POST['ativo'];
                $us->id_usuario = $_SESSION['id_usuario'];
                
                $pUsuarioSalaPorUsuario = new PerUsuarioSala();
                $verificaPeriodoExistentePorUsuario = $pUsuarioSalaPorUsuario->buscaPeriodosCadastradosPorUsuario($us);
                
                $pUsuarioSala = new PerUsuarioSala();
                $verificaPeriodoExistente = $pUsuarioSala->buscaPeriodosCadastrados($us);

                // Regra para um usuário não pode reservar mais de 1 sala no mesmo período.
                if(!empty($verificaPeriodoExistentePorUsuario)){
                    $_SESSION['erros'] = 'Reserva já Existe !!';
                    header('location:../interface/IntConsUsuarioSala.php');
                // Regra para 1 sala não pode estar reservado por mais de 1 usuário no mesmo período,simultaneamente.

                }else if(!empty($verificaPeriodoExistente)){
                    $_SESSION['erros'] = 'Reserva já Existe !!';
                    header('location:../interface/IntConsUsuarioSala.php');

                }else{
                    $pUserRoom = new PerUsuarioSala();
                    $pUserRoom->cadastrarUsuarioSala($us);
                    $_SESSION['u'] = serialize($us);
                    header('location:../interface/IntConsUsuarioSala.php');
                }
            }else{
                $_SESSION['erros'] = 'Erro ao enviar dados !!';
				header('location:../interface/IntConsUsuarioSala.php');
            }
        break;
    }
}
?>