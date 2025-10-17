<h3>Categorías de Basquet</h3>
<?php foreach ($dataToView["data"] as $categoria): ?>
	<h4 class="mt-4"><?php echo $categoria['categoria']; ?></h4>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Entrenador</th>
				<th>Preparador Físico</th>
				<th>Cantidad de Jugadores</th>
				<th>Capitán del Equipo</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $categoria['entrenador']; ?></td>
				<td><?php echo $categoria['preparador_fisico']; ?></td>
				<td><?php echo $categoria['cantidad_jugadores']; ?></td>
				<td><?php echo $categoria['capitan_del_equipo']; ?></td>
				<td>
					<a href="#" class="btn btn-warning">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
							stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
							class="lucide lucide-pencil-icon lucide-pencil">
							<path
								d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
							<path d="m15 5 4 4" />
						</svg>
					</a>
					<a href="#" class="btn btn-danger">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
							stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
							class="lucide lucide-trash2-icon lucide-trash-2">
							<path d="M10 11v6" />
							<path d="M14 11v6" />
							<path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6" />
							<path d="M3 6h18" />
							<path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
						</svg>
					</a>
				</td>
			</tr>
		</tbody>
	</table>

	<h5>Jugadores</h5>
	<table class="table table-sm table-bordered">
		<thead>
			<tr>
				<th>Jugador</th>
				<th>Número</th>
				<th>Estado</th>
				<th>Rol</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($categoria["jugadores"] as $jugador): ?>
				<tr>
					<td><?php echo $jugador['jugador']; ?></td>
					<td><?php echo $jugador['numero']; ?></td>
					<td><?php echo $jugador['estado']; ?></td>
					<td><?php echo $jugador['rol']; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php endforeach; ?>