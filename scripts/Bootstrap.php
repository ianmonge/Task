<?php

/**
 * Configuration of the environment.
 */
error_reporting( E_ALL | E_STRICT );
ini_set( 'display_errors', true );

/**
 * Defines of the constants.
 */
define( 'PATH_BASE', realpath( dirname( dirname( __FILE__ ) ) ) . DIRECTORY_SEPARATOR );

/**
 * Includes required files.
 */
require_once 'Request.php';
require_once 'View.php';
require_once PATH_BASE . 'models/Merchant.php';
