<?php

require_once PATH_BASE . '/models/TransactionTable.php';

/**
 * Test the class TransactionTable.
 */
class TransactionTableTest extends PHPUnit_Framework_TestCase
{
    /**
     * Object TransactionTable to test.
     */
    protected $obj;

    /**
     * Construct the object TransactionTable to test.
     */
    public function setUp()
    {
        $this->obj = new TransactionTable();
    }

    /**
     * Test the method "getData", with an unexisting file.
     * 
     * @expectedException Exception
     */
    public function testGetDataUnexistingFile()
    {
        $filename = PATH_BASE . '/tests/models/fail.csv';
        
        $this->obj->getData( $filename );
    }

    /**
     * Test the method "getData", with a valid file.
     */
    public function testGetDataValidFile()
    {
        $filename = PATH_BASE . '/tests/models/data.csv';
        
        $result = $this->obj->getData( $filename );

        $expected = array(
            array(
                'merchant'  => '1',
                'date'      => '01/05/2010',
                'value'     => '£50.00',
            ),
            array(
                'merchant'  => '2',
                'date'      => '01/05/2010',
                'value'     => '$66.10',
            ),
        );
        
        $this->assertSame( $expected, $result );
    }
}
