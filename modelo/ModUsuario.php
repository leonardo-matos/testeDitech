<?php

class ModUsuario{
	private $id_pessoa;
	private $nome;
	private $id_usuario;
	private $login;
	private $senha;
	private $tipo;

	public function __construct(){
	}
	public function __get($a){
		return $this->$a;
	}
	public function __set($a,$v){
		$this->$a = $v;
	}
}
?>