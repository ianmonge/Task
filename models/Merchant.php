<?php

require_once 'CurrencyConverter.php';
require_once 'TransactionTable.php';

/**
 * Class Merchant.
 */
class Merchant
{
    /**
     * Transactions.
     *
     * @var array
     */
    protected $transactions = array();

    /**
     * Construct a Merchant object, and load the transactions of the $filename.
     *
     * @param string $filename Filename of the CSV file.
     */
    public function __construct( $filename ) {
        $transactionTable = new TransactionTable();
        $this->transactions = $transactionTable->getData( $filename );
    }

    /**
     * Return the transactions of the $merchantId.
     * 
     * @param integer $merchantId
     * @return array
     */
    public function getTransactions( $merchantId )
    {
        $result = array();
        
        foreach ( $this->transactions as $transaction )
        {
            if ( $transaction[ 'merchant' ] == $merchantId )
            {
                $result[] = $transaction;
            }
        }
        
        return $result;
    }
}