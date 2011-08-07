<?php

/**
 * Interface for the classes TransactionTable.
 */
interface TransactionTableInterface
{
    /**
     * Return the data from $filename.
     *
     * @param string $filename
     * @return array
     */
    public function getData( $filename );
}