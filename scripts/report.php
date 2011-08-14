<?php 

error_reporting( E_ALL | E_STRICT );
ini_set( 'display_errors', true );

define( 'PATH_BASE', realpath( dirname( dirname( __FILE__ ) ) ) . DIRECTORY_SEPARATOR );

require_once 'Request.php';
require_once 'View.php';
require_once PATH_BASE . 'models/Merchant.php';

$request    = new Request();
$view       = new View();

try
{
    $merchantId = $request->getMerchantId();
}
 catch ( Exception $e )
 {
     $view->showError( $e->getMessage() );
     exit( 1 );
 }

$filename = '../data.csv';
$merchant = new Merchant( $filename );
$transactions = $merchant->getTransactions( $merchantId );
$view->showTransactions( $transactions );
exit( 0 );