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
                    <a href="#" class="btn btn-warning">Editar</a>
                    <a href="#" class="btn btn-danger">Eliminar</a>
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
