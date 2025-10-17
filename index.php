<?php
// Llamar configs y db
require_once 'config/config.php';
require_once 'model/db.php';

if (!isset($_GET["controller"]))
  $_GET["controller"] = constant("DEFAULT_CONTROLLER");
if (!isset($_GET["action"]))
  $_GET["action"] = constant("DEFAULT_ACTION");

$controller_path = 'controller/' . $_GET["controller"] . '.php';

// Construir ruta del controlador
if (!file_exists($controller_path))
  $controller_path = 'controller/' . constant("DEFAULT_CONTROLLER") . '.php';

// Llamar al controlador creado
require_once $controller_path;
$controllerName = $_GET["controller"] . 'Controller';
$controller = new $controllerName();

// Asegurar que el método esté definido en controlador
$dataToView["data"] = array();
if (method_exists($controller, $_GET["action"])) {
  $dataToView["data"] = $controller->{$_GET["action"]}();
}


// Llamar vistas
require_once 'view/template/header.php';
require_once 'view/' . $controller->view . '.php';
require_once 'view/template/footer.php';

?>