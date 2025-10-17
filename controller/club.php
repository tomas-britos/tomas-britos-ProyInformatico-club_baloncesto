<?php

require_once 'model/club.php';

class clubController
{
	public $page_title;
	public $view;
	public $clubObj;

	public function __construct()
	{
		$this->view = 'list_categorias';
		$this->page_title = 'Categorias de Basquet';
		$this->clubObj = new Club();
	}

	// Traer todos los jugadores
	public function list()
	{
		return $this->clubObj->getCategoriasConJugadores();
	}

}

?>