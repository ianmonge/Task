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
        if ( !is_file( $filename) )
        {
            throw new Exception( 'Error with the filename.' );
        }

        $data = array();

        $file = fopen( $filename, "r" );
        if ( FALSE !== $file )
        {
            $line = fgetcsv( $file, 0, ';' );
            while ( FALSE !== $line ) {
                $data[] = $line;
                $line = fgetcsv( $file, 0, ';' );
            }

            fclose( $file );
        }
        
        $table = $this->processData( $data );

        return $table;
    }
    
    /**
     * Process the data readed from the CSV file, to a table.
     *
     * @param array $data
     * @return array 
     */
    protected function processData( array $data )
    {
        $table  = array();
        
        $fields         = array_shift( $data );
        $fields_count   = count( $fields );
        
        foreach ( $data as $line ) {
            $row = array();
            
            for( $i = 0; $i < $fields_count; $i++ )
            {
                $row[ $fields[$i] ] = $line[ $i ];
            }
            
            $table[] = $row;
        }
        
        return $table;
    }
}