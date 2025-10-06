<?php

class Checklist
{

	private $table = 'checklist';
	private $conection;

	public function __construct()
	{

	}

	// Conectar y asegurar conexión con la DB
	public function getConection()
	{
		$dbObj = new Db();
		$this->conection = $dbObj->conection;
	}

	// Traer todos los items
	public function getItems()
	{
		$this->getConection();
		$sql = "SELECT * FROM " . $this->table;
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();
		$resultado = $stmt->get_result();

		return $resultado->fetch_all(MYSQLI_ASSOC);
	}

	// Consultar item instanciado por id
	public function getItemById($id)
	{
		if (is_null($id))
			return false;
		$this->getConection();
		$sql = "SELECT * FROM " . $this->table . " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$resultado = $stmt->get_result();
		return $resultado->fetch_assoc();
	}

	// Crear y guardar item
	public function save($param)
	{
		$this->getConection();

		$text = "";

		if (isset($param["text"]))
			$text = $param["text"];

		// Insertar item en la DB
		$sql = "INSERT INTO " . $this->table . " (text) values(?)";
		$stmt = $this->conection->prepare($sql);
		$stmt->execute([$text]);
		$id = $this->conection->insert_id;

		return $id;
	}

	// Checkear item
	public function checkItem($id)
	{
		$this->getConection();
		$sql = "UPDATE " . $this->table . " SET checked=1 WHERE id=?";
		$stmt = $this->conection->prepare($sql);
		return $stmt->execute([$id]);
	}

	// Borrar item instanciado por id
	public function deleteItemById($id)
	{
		$this->getConection();
		$sql = "DELETE FROM " . $this->table . " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		return $stmt->execute([$id]);
	}

}

?>