<?php

include 'Conexao.class.php';

class PerSala{
    
    private $conexao = null;
	
	public function __construct(){
    
        $this->conexao = Conexao::getInstancia();	
	}
    
    public function listarSala(){

        try{
			$stat = $this->conexao->query("SELECT s.id_sala,
                                                s.descricao,
                                                s.numero                                        
                                        FROM 	sala s"
                                        );
            $array = array();
            
            $array = $stat->fetchAll(PDO::FETCH_CLASS,'ModSala');
            
            $this->conexao = null;
            
            return $array;
            
		}catch(PDOException $e){
			echo 'Erro ao buscar salas';
		}
    }

    public function cadastrarSala($s){

        try{
                $stat = $this->conexao->prepare("INSERT INTO sala(descricao,numero,data_criacao,data_alteracao)
                                                VALUES('".$s->descricao."',".$s->numero.",SYSDATE(),SYSDATE())"
                                                );	
                $stat->execute();
                $this->conexao = null;	
            
		}catch(PDOException $e){
			echo 'Erro ao cadastrar sala!';
		}
    }
    
    public function buscaSalaPorId($id){
        try{
			$stat = $this->conexao->query("SELECT id_sala,
                                                    descricao,
                                                    numero
                                            FROM sala
                                            WHERE id_sala = ".$id);

            $array = array();
			$array = $stat->fetchAll(PDO::FETCH_CLASS,'ModSala');
            
            $this->conexao = null;
			return $array;
        
        }catch(PDOException $e){
			echo 'Erro ao buscar sala';
        }
    }

    public function atualizarSala($s){
        try{
            $stat = $this->conexao->query("UPDATE sala
                                            SET descricao = '".$s->descricao."',
                                                numero = ".$s->numero.",
                                                data_alteracao = SYSDATE()
                                            WHERE id_sala = ".$s->id_sala
                                            );	
            $stat->execute();
            $this->conexao = null;	
        
        }catch(PDOException $e){
            echo 'Erro ao atualizar sala!';
        }
    }
    public function deletarSala($s){
        try{
            $stat = $this->conexao->query("DELETE FROM sala WHERE id_sala = ".$s->id_sala);
            $stat->execute();
            $this->conexao = null;	
        
        }catch(PDOException $e){
            echo 'Erro ao deletar sala!';
        }
    }
}
?>