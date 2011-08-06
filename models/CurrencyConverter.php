<?php

require_once 'CurrencyConverterInterface.php';
require_once 'CurrencyWebservice.php';

/**
 * Uses CurrencyWebservice
 *
 */
class CurrencyConverter implements CurrencyConverterInterface
{
    /**
     * Different currencies.
     */
    const CURRENCY_USD = 'USD';
    const CURRENCY_EUR = 'EUR';
    const CURRENCY_GBP = 'GBP';

    /**
     * Currency webservice.
     * 
     * @var CurrencyWebservice
     */
    protected $currencyWebservice;

    /**
     * Default currency.
     * 
     * @var string
     */
    protected $defaultCurrency;

    /**
     * Construct the CurrencyConverter.
     *
     * @param type $defaultCurrency
     * @param CurrencyWebserviceInterface $currencyWebservice
     */
    public function __construct( $defaultCurrency = self::CURRENCY_USD, CurrencyWebserviceInterface $currencyWebservice = null )
    {
        if ( NULL === $currencyWebservice )
        {
            $currencyWebservice = new CurrencyWebservice();
        }
        
        $this->currencyWebservice = $currencyWebservice;
        $this->defaultCurrency = $defaultCurrency;
    }

    /**
     * Converts the $amount from the currency $currencyFrom to $currencyTo.
     * 
     * @param float $amount
     * @param string $currencyFrom
     * @param string $currencyTo
     * @return float
     */
    public function convert( $amount, $currencyFrom, $currencyTo = null )
    {
        if ( NULL === $currencyTo )
        {
            $currencyTo = $this->defaultCurrency;
        }

        $exchange = $this->currencyWebservice->getExchangeRate( $currencyFrom, $currencyTo );
        
        return ( $amount * $exchange );
    }
}