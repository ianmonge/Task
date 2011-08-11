<?php

require_once PATH_BASE . '/scripts/Request.php';

/**
 * Test the class Request.
 */
class RequestTest extends PHPUnit_Framework_TestCase
{
    /**
     * Return a mocked Request object.
     * 
     * @param array $arguments
     * @return Request
     */
    protected function getMockedRequest( $arguments = array() )
    {
        $mockedRequest = $this->getMock( 'Request', array( 'getArguments' ) );
        $mockedRequest->expects( $this->once() )
                ->method( 'getArguments' )
                ->will( $this->returnValue( $arguments ) );
        
        return $mockedRequest;
    }

    /**
     * Test the method "getMerchantId", without arguments.
     * 
     * @expectedException Exception
     * @expectedExceptionMessage Error: there must be only one argument.
     */
    public function testGetMerchantIdWithoutArguments()
    {
        $arguments = array();
        $request = $this->getMockedRequest( $arguments );
        
        $request->getMerchantId();
    }

    /**
     * Test the method "getMerchantId", with some arguments.
     * 
     * @expectedException Exception
     * @expectedExceptionMessage Error: there must be only one argument.
     */
    public function testGetMerchantIdWithSomeArguments()
    {
        $arguments = array( 1, 2, 3 );
        $request = $this->getMockedRequest( $arguments );
        
        $request->getMerchantId();
    }

    /**
     * Test the method "getMerchantId", with invalid argument (string).
     * 
     * @expectedException Exception
     * @expectedExceptionMessage Error: the argument must an integer greater than zero.
     */
    public function testGetMerchantIdWithInvalidArgumentString()
    {
        $arguments = array( 'report.php', 'a' );
        $request = $this->getMockedRequest( $arguments );
        
        $request->getMerchantId();
    }

    /**
     * Test the method "getMerchantId", with invalid argument (negative).
     * 
     * @expectedException Exception
     * @expectedExceptionMessage Error: the argument must an integer greater than zero.
     */
    public function testGetMerchantIdWithInvalidArgumentNegative()
    {
        $arguments = array( 'report.php', -1 );
        $request = $this->getMockedRequest( $arguments );
        
        $request->getMerchantId();
    }

    /**
     * Test the method "getMerchantId", with invalid argument (decimal).
     * 
     * @expectedException Exception
     * @expectedExceptionMessage Error: the argument must an integer greater than zero.
     */
    public function testGetMerchantIdWithInvalidArgumentDecimal()
    {
        $arguments = array( 'report.php', -2.5 );
        $request = $this->getMockedRequest( $arguments );
        
        $request->getMerchantId();
    }

    /**
     * Test the method "getMerchantId", with a valid argument.
     */
    public function testGetMerchantIdWithValidArgument()
    {
        $arguments = array( 'report.php', 5 );
        $request = $this->getMockedRequest( $arguments );
        
        $merchantId = $request->getMerchantId();
        $this->assertEquals( 5, $merchantId );
    }
}
