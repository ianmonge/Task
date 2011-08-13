<?php

require_once PATH_BASE . '/scripts/View.php';

/**
 * Test the class View.
 */
class ViewTest extends PHPUnit_Extensions_OutputTestCase
{
    /**
     * Object View to test.
     */
    protected $obj;

    /**
     * Construct the object View to test.
     */
    public function setUp()
    {
        $this->obj = new View();
    }

    /**
     * Test the method "showError".
     */
    public function testShowError()
    {
        $error = 'Testing my error';
        $errorRegex = '/' . $error . '(.+)/';
        $this->expectOutputRegex( $errorRegex );
        $this->obj->showError( $error );
    }

    /**
     * Test the method "showTransactions" when the array is empty.
     */
    public function testShowTransactionsEmpty()
    {
        $message = 'There isn\'t any transactions for that merchant ID';
        $this->expectOutputString( $message );
        $this->obj->showTransactions( array() );
    }

    /**
     * Test the method "showTransactions" when the array is full.
     */
    public function testShowTransactions()
    {
        $expected = <<<HEREDOC
merchant - 1
date - 01/05/2010
value - £50.00
----------------------
merchant - 2
date - 20/05/2010
value - £66.10
----------------------

HEREDOC;
        $this->expectOutputString( $expected );
        
        $transactions = array(
            array(
                'merchant'  => '1',
                'date'      => '01/05/2010',
                'value'     => '£50.00',
            ),
            array(
                'merchant'  => '2',
                'date'      => '20/05/2010',
                'value'     => '£66.10',
            ),
        );
        $this->obj->showTransactions( $transactions );
    }

}
