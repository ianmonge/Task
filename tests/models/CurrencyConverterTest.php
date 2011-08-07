<?php

require_once PATH_BASE . '/models/CurrencyConverter.php';

/**
 * Test the class CurrencyConverter.
 */
class CurrencyConverterTest extends PHPUnit_Framework_TestCase
{
    /**
     * Object CurrencyConverter to test.
     */
    protected $obj;

    /**
     * Construct the object CurrencyConverter to test.
     */
    public function setUp()
    {
        $this->obj = new CurrencyConverter();
    }

    /**
     * Test the method "convert", when the amount is zero.
     */
    public function testConvertZero()
    {
        $currencyFrom = CurrencyConverter::CURRENCY_EUR;
        $amount = 0;
        
        $result = $this->obj->convert( $amount, $currencyFrom );
        
        $this->assertEquals( 0, $result, '' );
        
    }

    /**
     * Test the method "convert", with the same currency.
     */
    public function testConvertSameCurrency()
    {
        $currencyFrom = CurrencyConverter::CURRENCY_GBP;
        $amount = 55;
        
        $result = $this->obj->convert( $amount, $currencyFrom );
        
        $this->assertEquals( 55, $result, '' );
        
    }

    /**
     * Test the method "convert", if it returns the same with the same exchange.
     */
    public function testConvertSameExchange()
    {
        $currencyFrom   = CurrencyConverter::CURRENCY_USD;
        $currencyTo     = CurrencyConverter::CURRENCY_GBP;
        $amount = 55;
        
        $result = $this->obj->convert( $amount, $currencyFrom, $currencyTo );
        $result = $this->obj->convert( $result, $currencyTo, $currencyFrom );
        
        $this->assertEquals( $amount, round( $result ), '' );
        
    }
}

