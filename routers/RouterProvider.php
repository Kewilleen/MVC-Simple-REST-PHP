<?php
/**
 * Router provider
 */
class RouterProvider
{
	
	private $action;
	private $controller;
	private $params;

	/**
	 * Gets the action.
	 *
	 * @return     string  The action.
	 */
	public function getAction()
	{
		return $this->action;
	}

	/**
	 * Sets the action.
	 *
	 * @param      string  $action  The action
	 */
	public function setAction($action = '')
	{
		$this->action = $action;
	}

	/**
	 * Gets the name controller.
	 *
	 * @return     string  The controller name.
	 */
	public function getController()
	{
		return $this->controller;
	}

	/**
	 * Set controller name
	 * 
	 * @param string $name Set route by controller name
	 */
	public function setController($controller = '')
	{
		$this->controller = $controller;
	}

	/**
	 * Gets the parameters.
	 *
	 * @return     array  The parameters.
	 */
	public function getParams()
	{
		return $this->params;
	}

	/**
	 * Sets the parameters.
	 *
	 * @param      array  $params  The parameters
	 */
	public function setParams($params = [])
	{
		$this->params = $params;
	}
}