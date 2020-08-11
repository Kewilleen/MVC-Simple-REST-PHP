<?php
// Include provider to remove routers folder from register
include_once 'RouterProvider.php';

/**
 * Router Manager to call controllers, models and views
 */
class Router extends RouterProvider
{

	private $path;

	function __construct($path = '')
	{
		$this->path = explode('/', $path);
		$controller = 'Home';
		if ($this->hasPath()) {
			$controller = $this->getController();
			if (class_exists($controller)) {
				if ($this->hasAction($controller)) {
					$this->setParams(array_slice($this->path, 2));
				}
			} else {
				$controller = 'Error';
			}
		}
		$controller = "{$controller}Controller";
		$action = $this->getAction() == null ? 'index' : $this->getAction();
		$params = $this->getParams() == null ? array() : $this->getParams();
		call_user_func_array([new $controller, $action], $params);
	}

	/**
	 * Determines if it has path to controller class.
	 *
	 * @return     boolean  True if has controller, False otherwise.
	 */
	public function hasPath()
	{
		if (isset($this->path[0]) && $this->path[0] != null) {
			$this->setController(ucfirst($this->path[0]));
			return true;
		}
		return false;
	}

	/**
	 * Determines if it has action.
	 *
	 * @return     boolean  True if has action, False otherwise.
	 */
	public function hasAction($controllerName)
	{
		if (count($this->path) > 1 && !empty($this->path[1]) && $this->path[1] != '') {
			if (method_exists($controllerName, $this->path[1])) {
				$this->setAction($this->path[1]);
				return true;
			} else {
				$this->setController("Error");
			}
		}
	}
}