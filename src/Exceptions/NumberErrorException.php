<?php


namespace Common\Exceptions;


class NumberErrorException extends \Exception
{
    protected $_errors = [ ];
    protected $_title = '';
    public function __construct( int $errorNro)
    {
        $error = isset ($this->_errors[$errorNro]) ? $this->_errors[$errorNro] : 'NOT DEFINED';
        parent::__construct($this->_title . ' - Error code (' . $errorNro . ') ' . $error, 0, null);
    }

}