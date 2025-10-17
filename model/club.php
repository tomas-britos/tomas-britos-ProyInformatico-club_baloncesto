<?php
class Club
{

	private $table = 'categorias';
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

	// Traer todos los items con sus jugadores
	public function getItemsWithPlayers()
	{
		$this->getConection();
		$sql = "SELECT * FROM " . $this->table;
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();
		$categorias = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

		$sql_jugadores = "SELECT * FROM jugadores WHERE id_categoria = ?";
		$stmt_jugadores = $this->conection->prepare($sql_jugadores);

		foreach ($categorias as $key => $categoria) {
			$stmt_jugadores->bind_param('i', $categoria['id']);
			$stmt_jugadores->execute();
			$jugadores = $stmt_jugadores->get_result()->fetch_all(MYSQLI_ASSOC);
			$categorias[$key]['jugadores'] = $jugadores;
		}

		return $categorias;
	}
}

?>