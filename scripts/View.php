<?php



/**

 * Class View. Process the information to return.
 */















class View
{
    /**

     * Show the error to the output.
     * 
     * @param string $error
     */
    public function showError( $error )
    {





        echo $error . PHP_EOL;
        echo <<<HEREDOC
    php report.php <integer>









HEREDOC;
    }

    
    /**

     * Show the transactions to the output.
     *
     * @return array $transactions
     */

    public function showTransactions( array $transactions )
    {












        if ( empty( $transactions ) )
        {
            echo 'There isn\'t any transactions for that merchant ID';
            return;
        }
        
        foreach ( $transactions as $transaction )












        {
            foreach ( $transaction as $key => $value )
            {
                echo $key . ' - ' . $value . PHP_EOL;
            }
            echo '----------------------' . PHP_EOL;
        }
        
    }

}
