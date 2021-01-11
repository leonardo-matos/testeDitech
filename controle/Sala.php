<?php

session_start();
// session_unset();

include '../modelo/ModSala.php';
include '../persistencia/PerSala.php';

if(isset($_GET['op'])){

	switch($_GET['op']){
		
		case 'listar':
            
            $s = new PerSala();
			$listaSala = array();
            $listaSala = $s->listarSala();
            			
			$_SESSION['listaSala'] = serialize($listaSala);
			
			header('location:../interface/IntConsSala.php');
		break;
		
		case 'cadastrar':

            if(isset($_POST['descricao']) && isset($_POST['numero'])){
                
                $s = new ModSala();
				$s->descricao = $_POST['descricao'];
				$s->numero = $_POST['numero'];

                $pSala = new PerSala();
				$pSala->cadastrarSala($s);
				$_SESSION['s'] = serialize($s);
				$_SESSION['erros'] = 'Dados salvos com sucesso !!';
				header('location:../interface/IntConsSala.php');

            }else{
                $_SESSION['erros'] = 'Erro ao enviar dados !!';
				header('location:../interface/IntConsSala.php');
            }
        break;
		
		case 'buscaSalaPorId':

            $s = new PerSala();
            
			$sala = $s->buscaSalaPorId($_GET['id_sala']);
			$_SESSION['listaSala'] = serialize($sala);
			
			header('location:../interface/IntCadSala.php');
        break;
		
		case 'editar':
			
            if(isset($_POST['descricao']) && isset($_POST['numero'])){

                $s = new ModSala();
				$s->id_sala = $_GET['id_sala'];
				$s->descricao = $_POST['descricao'];
				$s->numero = $_POST['numero'];
				
                $pSala = new PerSala();
				$pSala->atualizarSala($s);
				$_SESSION['s'] = serialize($s);
				$_SESSION['erros'] = 'Dados salvos com sucesso !!';
				header('location:../interface/IntConsSala.php');
				
            }else{
				$_SESSION['erros'] = 'Erro ao alterar sala !!';
				header('location:../interface/IntConsSala.php');
            }
		break;
		
		case 'deletar':
            if(isset($_GET['id_sala'])){

                $s = new ModSala();
				$s->id_sala = $_GET['id_sala'];
				
                $pSala = new PerSala();
				$pSala->deletarSala($s);
				$_SESSION['s'] = serialize($s);
				header('location:../interface/IntConsSala.php');
				
            }else{
				$_SESSION['erros'] = 'Erro ao deletar sala !!';
				header('location:../interface/IntConsSala.php');
            }
        break;
	}
}
?>