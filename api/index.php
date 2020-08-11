<?php
include_once("../config.php");
include_once("commons/StatusTratament.php");

$status = new StatusTratament();

if (isset($_REQUEST)) {
	$path = explode('/', $_GET['path']);
	if (count($path) > 1) {
		$version = $path[0];
		$responseId = hasRequest($version, $path[1]);
		if ($responseId == 4) {
			call_user_func_array([new $version, $path[1]], array_slice($path, 2));
		} else {
			$status->sendStatus($responseId);
		}
	} else {
		$status->sendStatus();
	}
} else {
	$status->sendStatus();
}

function hasRequest($version = '', $request = '')
{
	$versions = [
		'v1'
	];
	foreach ($versions as $folderVersion) {
		$path = "versions/{$folderVersion}/{$version}.php";
		if (!empty($path) && file_exists($path)) {
			include_once $path;
			if (class_exists($version)) {
				if (method_exists($version, $request)) {
					return 4;
				} else {
					return 3;
				}
			} else {
				return 2;
			}
		}
	}
	return 1;
}