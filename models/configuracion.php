<?php
session_start();
if ($_SERVER['SERVER_NAME'] == 'localhost') {
	$servidor = 'localhost';
	$usuariobd = 'root';
	$clavebd = 'd3vr00t';
	$bd = 'db_univer_mipc';
} else {
	$servidor = '';
	$usuariobd = '';
	$clavebd = '';
	$bd = '';
}

?>