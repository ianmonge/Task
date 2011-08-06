<?php

/**
 * Interface for the classes CurrencyWebservice.
 */
interface CurrencyWebserviceInterface
{
    /**
     * Return the exchange from $currencyFrom to $currencyTo.
     *
     * @param string $currencyFrom
     * @param string $currencyTo
     * @return float
     */
    public function getExchangeRate( $currencyFrom, $currencyTo );
}