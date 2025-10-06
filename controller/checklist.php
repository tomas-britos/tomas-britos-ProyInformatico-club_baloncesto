<?php

require_once 'model/checklist.php';

class checklistController
{
	public $page_title;
	public $view;
	public $checklistObj;

	public function __construct()
	{
		$this->view = 'list_checklist';
		$this->page_title = 'Checklist';
		$this->checklistObj = new Checklist();
	}

	// Traer todos los items
	public function list()
	{
		$items = $this->checklistObj->getItems();
		$unchecked_items = array_filter($items, function ($item) {
			return $item['checked'] == 0;
		});
		$checked_items = array_filter($items, function ($item) {
			return $item['checked'] == 1;
		});
		return ['unchecked' => $unchecked_items, 'checked' => $checked_items];
	}

	// Crear item
	public function save()
	{
		// Manejar el error si el texto está vacío
		if (isset($_POST["text"]) && !empty(trim($_POST["text"]))) {
			$this->checklistObj->save($_POST);
			header('Location: index.php');
		} else {
			header('Location: index.php?error=1');
		}
	}

	// Checkear item
	public function check()
	{
		$this->checklistObj->checkItem($_GET["id"]);
		header('Location: index.php');
	}

	// Borrar item
	public function delete()
	{
		$this->checklistObj->deleteItemById($_GET["id"]);
		header('Location: index.php');
	}

}

?>