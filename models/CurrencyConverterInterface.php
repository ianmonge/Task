<?php

/**
 * Interface for the classes CurrencyConverter.
 */
interface CurrencyConverterInterface
{
    /**
     * Converts the $amount from the currency $currencyFrom to $currencyTo.
     * 
     * @param float $amount
     * @param string $currencyFrom
     * @param string $currencyTo
     * @return float
     */
    public function convert( $amount, $currencyFrom, $currencyTo );
}