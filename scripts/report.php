<?php 

require_once 'Bootstrap.php';
require_once 'Request.php';

$bootstrap = new Bootstrap();
$bootstrap->init();

$request = new Request();
try
{
    $merechantId = $request->getMerchantId();
}
 catch ( Exception $e )
 {
     echo $e->getMessage() . PHP_EOL;
     echo <<<HEREDOC
   php report.php <integer>

HEREDOC;
     exit( 1 );
 }

//foreach ($merchant->getTransactions() as $transaction) {
//    
//}
