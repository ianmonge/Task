<?php 

require_once 'Bootstrap.php';
require_once 'Request.php';
require_once 'View.php';
require_once PATH_BASE . '/models/Merchant.php';

$bootstrap = new Bootstrap();
$bootstrap->init();

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
exit(0);