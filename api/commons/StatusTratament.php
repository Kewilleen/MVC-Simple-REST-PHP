<?php
/**
 * 
 */
class StatusTratament
{

	public function sendStatus($id = 0)
	{
		header('Content-Type: application/json');
		$format = [
			"statusId" => $id,
			"message" => $this->getMessageId($id)
		];
		echo(json_encode($format, JSON_PRETTY_PRINT));
	}

	public function getMessageId($id = 0)
	{
		switch ($id) {
			case 1:
				return "Invalid version.";
			case 2:
				return "An internal problem has occurred, please contact the site manager. (Class in version not found)";
			case 3:
				return "Method requested not found.";
			default:
				return "Invalid syntax, check the documentation to request.";
		}
	}
}