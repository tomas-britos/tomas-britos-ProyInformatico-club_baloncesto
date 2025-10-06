<div class="row">
	<div class="col-md-6">
		<h3>Items por hacer</h3>
		<!-- Mostrar error al intentar crear un item vacio -->
		<?php if (isset($_GET['error'])): ?>
			<div class="alert alert-danger" role="alert">
				No se pueden crear items sin texto
			</div>
		<?php endif; ?>
		<!-- Crear y guardar items con save() -->
		<form action="index.php?controller=checklist&action=save" method="POST">
			<div class="input-group mb-3">
				<input type="text" class="form-control" name="text" placeholder="Nuevo item">
				<button class="btn btn-primary" type="submit">Agregar</button>
			</div>
		</form>
		<ul class="list-group">
			<!-- Listar items no checkeados -->
			<?php foreach ($dataToView["data"]['unchecked'] as $item): ?>
				<li class="list-group-item d-flex justify-content-between align-items-center">
					<?php echo $item['text']; ?>
					<input type="checkbox" class="form-check-input" title="Completar item"
						style="cursor: pointer; margin: 0; height: 24px; width: 24px;"
						onclick="window.location.href='index.php?controller=checklist&action=check&id=<?php echo $item['id']; ?>'">
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<div class="col-md-6">
		<h3>Items terminados</h3>
		<!-- Espaciado para alinear listas -->
		<div class="mb-3" style="height: 38px;"></div>
		<ul class="list-group">
			<!-- Listar items checkeados -->
			<?php foreach ($dataToView["data"]['checked'] as $item): ?>
				<li class="list-group-item d-flex justify-content-between align-items-center">
					<?php echo $item['text']; ?>
					<!-- Borrar item checkeado con metodo delete() -->
					<a href="index.php?controller=checklist&action=delete&id=<?php echo $item['id']; ?>" class="btn btn-danger"
						title="Eliminar item" style="display: flex; align-items: center; justify-content: center; padding: 3px;">
						<!-- Icono de basura -->
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash"
							viewBox="0 0 16 16">
							<path
								d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
							<path fill-rule="evenodd"
								d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
						</svg>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>