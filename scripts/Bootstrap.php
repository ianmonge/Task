<?php

define( 'PATH_BASE', realpath( dirname( dirname( __FILE__ ) ) ) );

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
	 * Initialize the envitonment.
	 */
	protected function _initEnvironment()
	{
		error_reporting( E_ALL | E_STRICT );
		ini_set( 'display_errors', true );
	}

}
