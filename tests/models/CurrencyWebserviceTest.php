<?php

require_once PATH_BASE . '/models/CurrencyWebservice.php';

/**
 * Test the class CurrencyWebservice.
 */
class CurrencyWebserviceTest extends PHPUnit_Framework_TestCase
{
    /**
     * Object CurrencyWebservice to test.
     */
    protected $obj;

    /**
     * Construct the object CurrencyWebservice to test.
     */
    public function setUp()
    {
        $this->obj = new CurrencyWebservice();
    }

    /**
     * Test the method "getExchangeRate", if it returns 1 with the same currencies.
     */
    public function testGetExchangeRateSameCurrency()
    {
        $currency = 'GBP'; // USD EUR
        
        $result = $this->obj->getExchangeRate( $currency, $currency );
        
        $this->assertNotNull( $result, 'The method "getExchangeRate" cannot return NULL.' );
        $this->assertEquals( 1, $result, 'The method "getExchangeRate" with same currencies must return 1.' );
    }

    /**
     * Test the method "getExchangeRate", if it returns a permanent exchange.
     */
    public function testGetExchangeRatePermanentExchange()
    {
        $currencyFrom   = 'GBP';
        $currencyTo     = 'EUR';
        
        $result1 = $this->obj->getExchangeRate( $currencyFrom, $currencyTo );
        $result2 = $this->obj->getExchangeRate( $currencyFrom, $currencyTo );
        
        $this->assertNotNull( $result1, 'The method "getExchangeRate" cannot return NULL.' );
        $this->assertNotNull( $result2, 'The method "getExchangeRate" cannot return NULL.' );
        $this->assertEquals( $result1, $result2, 'The method "getExchangeRate" hasn\'t a permanent exchange.' );
    }

    /**
     * Test the method "getExchangeRate", if it returns the same exchange.
     */
    public function testGetExchangeRateSameExchange()
    {
        $currencyFrom   = 'GBP';
        $currencyTo     = 'EUR';
        
        $result1 = $this->obj->getExchangeRate( $currencyFrom, $currencyTo );
        $result2 = $this->obj->getExchangeRate( $currencyTo, $currencyFrom );
        
        $this->assertLessThan( 1e-6, abs( 1 - ( $result1 * $result2 ) ), 'The method "getExchangeRate" hasn\'t the same exchange.' );
    }

}
