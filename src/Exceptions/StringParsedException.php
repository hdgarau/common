<?php


namespace Common\Exceptions;


use Throwable;

class StringParsedException extends \Exception
{
    public function __construct( )
    {
        parent::__construct('Error in String - fail parser', 0, null);
    }
}