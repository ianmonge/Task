<?php 

require_once 'Bootstrap.php';

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
