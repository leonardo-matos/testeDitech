<?php

include 'Conexao.class.php';

class PerUsuarioSala{
    
    private $conexao = null;
	
	public function __construct(){
    
        $this->conexao = Conexao::getInstancia();	
	}
    
    public function listar($id_usuario){
        try{
            $stat = $this->conexao->query("SELECT us.id_reserva_usuario_sala,
                                                s.descricao AS descricao_sala,
                                                s.numero,
                                                us.hora_inicial AS horaInicial,
                                                us.hora_final AS horaFinal,
                                                CASE us.ativo WHEN 1 THEN 'Ativo' ELSE 'Inativo' END AS ativo
                                        
                                        FROM reserva_usuario_sala us 
                                        INNER JOIN sala s ON s.id_sala = us.id_sala
                                        WHERE id_usuario = ".$id_usuario
                                    );
            $array = array();
            
            $array = $stat->fetchAll(PDO::FETCH_CLASS,'ModUsuarioSala');
            
            $this->conexao = null;
            
            return $array;
            
		}catch(PDOException $e){
			echo 'Erro ao buscar salas reservadas';
		}
    }
    public function listarSalas(){

        try{
			$stat = $this->conexao->query("SELECT id_sala, descricao AS descricao_sala,numero AS numero_sala FROM sala");
            $array = array();
            
            $array = $stat->fetchAll(PDO::FETCH_CLASS,'ModUsuarioSala');
            
            $this->conexao = null;
            
            return $array;
            
		}catch(PDOException $e){
			echo 'Erro ao buscar pessoas';
		}
    }

    public function cadastrarUsuarioSala($us){

        $horaInicial = date("Y-m-d H:i:s",strtotime($us->horaInicial));
        $horaFinal = date("Y-m-d H:i:s",strtotime($us->horaFinal));
        
        try{
            $stat = $this->conexao->prepare("INSERT INTO reserva_usuario_sala (id_usuario,id_sala,hora_inicial,hora_final,ativo) VALUES(".$us->id_usuario.",".$us->id_sala.",'".$horaInicial."','".$horaFinal."',".$us->ativo.")"
        );
        $stat->execute();
        $this->conexao = null;
            
		}catch(PDOException $e){
			echo 'Erro ao cadastrar o usuário x sala !';
		}
    }

    public function buscaPeriodosCadastradosPorUsuario($us){
        try{
			$stat = $this->conexao->query("SELECT   us.hora_inicial AS horaInicial,
                                                    us.hora_final AS horaFinal
                                            
                                            FROM reserva_usuario_sala us 
                                            INNER JOIN sala s ON s.id_sala = us.id_sala
                                            WHERE id_usuario = ".$us->id_usuario."
                                            AND us.ativo = 1
                                            AND us.hora_inicial = '".$us->horaInicial."'
                                            AND us.hora_final = '".$us->horaFinal."'
                                            AND us.id_sala = ".$us->id_sala);
            $array = array();
            
            $array = $stat->fetchAll(PDO::FETCH_CLASS,'ModUsuarioSala');
            
            $this->conexao = null;
            
            return $array;
            
		}catch(PDOException $e){
			echo 'Erro ao buscar salas';
		}
    }
    public function buscaPeriodosCadastrados($us){
        // var_dump($us);exit;
        try{
			$stat = $this->conexao->query("SELECT   us.hora_inicial AS horaInicial,
                                                    us.hora_final AS horaFinal
                                            
                                            FROM reserva_usuario_sala us 
                                            INNER JOIN sala s ON s.id_sala = us.id_sala
                                            WHERE us.ativo = 1
                                            AND us.hora_inicial = '".$us->horaInicial."'
                                            AND us.hora_final = '".$us->horaFinal."'
                                            AND us.id_sala = ".$us->id_sala);
            $array = array();
            
            $array = $stat->fetchAll(PDO::FETCH_CLASS,'ModUsuarioSala');
            
            $this->conexao = null;
            
            return $array;
            
		}catch(PDOException $e){
			echo 'Erro ao buscar salas';
		}
    }
    
    // public function buscaUsuarioPorId($id){
    //     try{
	// 		$stat = $this->conexao->query("SELECT id_usuario,
    //                                                 id_pessoa,
    //                                                 login,
    //                                                 senha,
    //                                                 tipo 
    //                                         FROM usuario
    //                                         WHERE id_usuario = ".$id);

    //         $array = array();
	// 		$array = $stat->fetchAll(PDO::FETCH_CLASS,'ModUsuario');
            
    //         $this->conexao = null;
	// 		return $array;
        
    //     }catch(PDOException $e){
	// 		echo 'Erro ao buscar usuário';
    //     }
    // }

    // public function atualizarUsuario($u){
    //     try{
    //         $stat = $this->conexao->query("UPDATE usuario
    //                                         SET id_pessoa = ".$u->id_pessoa.",
    //                                             login = '".$u->login."',
    //                                             senha = '".$u->senha."',
    //                                             tipo = '".$u->tipo."',
    //                                             data_alteracao = SYSDATE()
    //                                         WHERE id_usuario = ".$u->id_usuario
    //                                         );	
    //         $stat->execute();
    //         $this->conexao = null;	
        
    //     }catch(PDOException $e){
    //         echo 'Erro ao atualizar usuário!';
    //     }
    // }
    // public function deletarUsuario($u){
    //     try{
    //         $stat = $this->conexao->query("DELETE FROM usuario WHERE id_usuario = ".$u->id_usuario);
    //         $stat->execute();
    //         $this->conexao = null;	
        
    //     }catch(PDOException $e){
    //         echo 'Erro ao deletar usuário!';
    //     }
    // }

    // public function buscaUsuarioLogin($dados){
    //     try{
    //         $stat = $this->conexao->query("SELECT * 
    //                                         FROM usuario
    //                                         WHERE login = '".$dados['usuario']."'
    //                                         AND senha = '".$dados['senha']."'");
    //        $array = array();
            
    //        $array = $stat->fetchAll(PDO::FETCH_CLASS,'ModUsuario');
           
    //        $this->conexao = null;
           
    //        return $array;
        
    //     }catch(PDOException $e){
    //         echo 'Erro ao deletar usuário!';
    //     }
    // }
}
?>