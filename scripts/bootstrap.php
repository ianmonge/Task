<?php

define( 'PATH_APPLICATION', realpath(dirname(__FILE__) ) );
define( 'PATH_LIBRARY'. DIRECTORY_SEPARATOR . 'library' );

class Bootstrap
{
	public function init()
	{
		$methods = get_class_methods( self );
		
		foreach ( $methods as $method )
		{
			$this->$method();
		}
	}
	
	protected function _initZendAutoloader()
	{
		set_include_path(implode(PATH_SEPARATOR, array(
			PATH_LIBRARY,
			get_include_path(),
		)));

		require_once PATH_LIBRARY . 'Zend\Loader\Autoloader.php';
		Zend_Loader_Autoloader::getInstance();
	}
}
