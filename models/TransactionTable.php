<?php

require_once 'TransactionTableInterface.php';

/**
 * Class TransactionTable. Read the data from the CSV file.
 *
 */
class TransactionTable implements TransactionTableInterface
{
    /**
     * Return the data from $filename.
     *
     * @param string $filename
     * @return array
     */
    public function getData( $filename )
    {
        $handle = fopen( $filename, "r" );
        if ( FALSE !== $handle )
        {
            $data = fgetcsv($handle, 1000, ",");
            while ( FALSE !== $data ) {
                for ($c=0; $c < $num; $c++) {
                    echo $data[$c] . "<br />\n";
                }
            }
            fclose( $handle );
        }
    }
}