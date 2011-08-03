<?php

define( 'PATH_BASE', realpath( dirname( dirname( __FILE__ ) ) ) );
define( 'PATH_LIBRARY', PATH_BASE. DIRECTORY_SEPARATOR . 'library' );

/**
 * Initialize the application.
 */
class Bootstrap
{
	/**
	 * Call of the methods that start with "_init", for initialize the application.
	 */
	public function init()
	{
		$methods = get_class_methods( get_class( $this ) );
		$methods = array_filter(
			$methods,
			function ( $element ) { return ( 0 === strpos( $element, '_init' ) ); } ); 
		
		foreach ( $methods as $method )
		{
			$this->$method();
		}
	}

	/**
	 * Instance the Zend_Loader_Autoloader class.
	 */
	protected function _initZendAutoloader()
	{
		set_include_path( implode( PATH_SEPARATOR, array(
			PATH_LIBRARY,
			get_include_path(),
		) ) );

		require_once 'Zend\Loader\Autoloader.php';
		Zend_Loader_Autoloader::getInstance();
	}
}
