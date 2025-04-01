<?php
/*cargar en memoria el entorno y atiende la petición principal*/
define("RUTA_APP","/Crud/");
require_once("libs/MySQLdb.php");//retorna objeto tipo interfaz
require_once("libs/Controlador.php");//clase tipo fabrica de métodos
require_once("libs/Control.php");//gestiona el desgloce de la url y controla el flujo por  i)omisión ii)elementos url-encontrados.
?>