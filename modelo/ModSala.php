<?php

class Modsala{
	private $id_sala;
	private $descricao;
	private $numero;

	public function __construct(){
	}
	public function __get($a){
		return $this->$a;
	}
	public function __set($a,$v){
		$this->$a = $v;
	}

	// teste leo
}
?>