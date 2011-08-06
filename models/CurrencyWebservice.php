<?php

require_once 'CurrencyWebserviceInterface.php';

/**
 * Dummy web service returning random exchange rates
 *
 */
class CurrencyWebservice implements CurrencyWebserviceInterface
{
    protected $exchanges = array();

    /**
     * Return the exchange from $currencyFrom to $currencyTo.
     *
     * @param string $currencyFrom
     * @param string $currencyTo
     * @return float
     */
    public function getExchangeRate( $currencyFrom, $currencyTo )
    {
        // If they are the same currency.
        if ( $currencyFrom == $currencyTo )
        {
            return 1;
        }
        
        // If the exchange was calculated before.
        if ( isset( $this->exchanges[ $currencyFrom ][ $currencyTo ] ) )
        {
            return $this->exchanges[ $currencyFrom ][ $currencyTo ];
        }
        
        $exchange = $this->getRandomNumber();
        $this->exchanges[ $currencyFrom ][ $currencyTo ] = $exchange;
        $this->exchanges[ $currencyTo ][ $currencyFrom ] = ( 1 / $exchange );

        return $exchange;
    }
    
    /**
     * Return a random number.
     *
     * @return float
     */
    protected function getRandomNumber()
    {
        return (float) rand( 1, 200 ) / 100;
    }
}