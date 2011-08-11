<?php

/**
 * Class Request. Process the request to the application.
 */

class Request
{
    /**
     * Return the merchant id passed to the script.
     */
    public function getMerchantId()
    {
        $arguments = $this->getArguments();

        if ( 1 >= count( $arguments ) || 2 < count( $arguments ) )
        {
            throw new Exception( 'Error: there must be only one argument.' );
        }

        $merchantId = (int) $arguments[1];
        if ( 0 >= $merchantId )
        {
            throw new Exception( 'Error: the argument must an integer greater than zero.' );
        }

        return $merchantId;
    }
    
    /**
     * Return the arguments $_SERVER['argv].
     *
     * @return array
     */
    protected function getArguments()
    {
        return $_SERVER[ 'argc' ];
    }
}