<?php

include 'Conexao.class.php';

class PerUsuario{
    
    private $conexao = null;
	
	public function __construct(){
    
        $this->conexao = Conexao::getInstancia();	
	}
    
    public function listarUsuarios(){

        try{
			$stat = $this->conexao->query("SELECT p.id_pessoa,
                                                p.nome,
                                                u.id_usuario,
                                                u.login,
                                                u.senha,
                                                u.tipo
                                        
                                        FROM 	pessoa p
                                                INNER JOIN usuario u ON p.id_pessoa = u.id_pessoa"
                                        );
            $array = array();
            
            $array = $stat->fetchAll(PDO::FETCH_CLASS,'ModUsuario');
            
            $this->conexao = null;
            
            return $array;
            
		}catch(PDOException $e){
			echo 'Erro ao buscar usuarios';
		}
    }
    public function listarPessoas(){

        try{
			$stat = $this->conexao->query("SELECT id_pessoa,
                                                nome
                                            FROM pessoa"
                                        );
            $array = array();
            
            $array = $stat->fetchAll(PDO::FETCH_CLASS,'ModUsuario');
            
            $this->conexao = null;
            
            return $array;
            
		}catch(PDOException $e){
			echo 'Erro ao buscar pessoas';
		}
    }

    public function cadastrarUsuario($u){

        try{
                $stat = $this->conexao->prepare("INSERT INTO usuario(id_pessoa,login,senha,tipo,data_criacao,data_alteracao)
                                                VALUES(".$u->id_pessoa.",'".$u->login."','".$u->senha."','".$u->tipo."',SYSDATE(),SYSDATE())"
                                                );	
                $stat->execute();
                $this->conexao = null;	
            
		}catch(PDOException $e){
			echo 'Erro ao cadastrar o usuário!';
		}
    }
    
    public function buscaUsuarioPorId($id){
        try{
			$stat = $this->conexao->query("SELECT id_usuario,
                                                    id_pessoa,
                                                    login,
                                                    senha,
                                                    tipo 
                                            FROM usuario
                                            WHERE id_usuario = ".$id);

            $array = array();
			$array = $stat->fetchAll(PDO::FETCH_CLASS,'ModUsuario');
            
            $this->conexao = null;
			return $array;
        
        }catch(PDOException $e){
			echo 'Erro ao buscar usuário';
        }
    }

    public function atualizarUsuario($u){
        try{
            $stat = $this->conexao->query("UPDATE usuario
                                            SET id_pessoa = ".$u->id_pessoa.",
                                                login = '".$u->login."',
                                                senha = '".$u->senha."',
                                                tipo = '".$u->tipo."',
                                                data_alteracao = SYSDATE()
                                            WHERE id_usuario = ".$u->id_usuario
                                            );	
            $stat->execute();
            $this->conexao = null;	
        
        }catch(PDOException $e){
            echo 'Erro ao atualizar usuário!';
        }
    }
    public function deletarUsuario($u){
        try{
            $stat = $this->conexao->query("DELETE FROM usuario WHERE id_usuario = ".$u->id_usuario);
            $stat->execute();
            $this->conexao = null;	
        
        }catch(PDOException $e){
            echo 'Erro ao deletar usuário!';
        }
    }

    public function buscaUsuarioLogin($dados){
        try{
            $stat = $this->conexao->query("SELECT * 
                                            FROM usuario
                                            WHERE login = '".$dados['usuario']."'
                                            AND senha = '".$dados['senha']."'");
           $array = array();
            
           $array = $stat->fetchAll(PDO::FETCH_CLASS,'ModUsuario');
           
           $this->conexao = null;
           
           return $array;
        
        }catch(PDOException $e){
            echo 'Erro ao deletar usuário!';
        }
    }
}
?>