<?php
include_once 'config.php';
include_once 'routers/Router.php';

spl_autoload_register("register");
if (isset($_REQUEST)) {
	$router = new Router($_GET['path']);
}
function register($class = '')
{
	$folders = [
		'application/controllers',
		'application/models'
	];
	foreach ($folders as $folder) {
		$path = "{$folder}/{$class}.php";
		if (!empty($path) && file_exists($path)) {
			return include_once $path;
		}
	}
}