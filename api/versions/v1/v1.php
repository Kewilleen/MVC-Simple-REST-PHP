<?php
include_once("versions/Version.php");
/**
 * Version manager to execute func.
 */
class v1 implements Version
{
	public function users()
	{
		echo 'working';
	}
}