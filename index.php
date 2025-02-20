<?php
// llama al fichero que contiene las líneas de código (script)
// que realiza la conexión a la base de datos
require_once("./config/database.php");

// indica que se va a trabajar con la clase User
use Formacom\Core\App;
// crea nuevo objeto (instancia) de la clase App
$app=new App();

?>