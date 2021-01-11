<?php

class ModUsuarioSala{
    private $id_reserva_usuario_sala;
    private $id_sala;
    private $descricao_sala;
    private $numero_sala;
	private $horaInicial;
	private $horaFinal;
	private $ativo;

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