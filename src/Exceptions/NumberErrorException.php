<?php


namespace Common\Exceptions;


use Exception;

class NumberErrorException extends Exception
{
    protected $_errors = [ ];
    protected $_title = '';
    public function __construct( int $errorNro)
    {
        $error = $this->_errors[$errorNro] ?? 'NOT DEFINED';
        parent::__construct($this->_title . ' - Error code (' . $errorNro . ') ' . $error);
    }

}