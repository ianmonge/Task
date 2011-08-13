<?php 

require_once 'Bootstrap.php';
require_once 'Request.php';

$bootstrap = new Bootstrap();
$bootstrap->init();

$request    = new Request();
$view       = new View();

try
{
    $merechantId = $request->getMerchantId();
}
 catch ( Exception $e )
 {
     $view->showError( $e->getMessage );
     exit( 1 );
 }

$merchant = new Metchant();
$transactions = $merchant->getTransactions( $merchantId );
$view->showTransactions( $transactions );
exit(0);