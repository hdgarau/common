<?php


namespace Common\Exceptions;


use Exception;

class StringParsedException extends Exception
{
    public function __construct( )
    {
        parent::__construct('Error in String - fail parser');
    }
}