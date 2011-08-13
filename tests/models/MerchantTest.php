<?php

require_once PATH_BASE . '/models/Merchant.php';

/**
 * Test the class Merchant.
 */
class MerchantTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test the method "getTransactions", if there aren't transactions on the CSV file.
     */
    public function testGetTransactions()
    {
        $filename = PATH_BASE . '/tests/models/data_empty.csv';

        $merchant = new Merchant( $filename );
    }


}
