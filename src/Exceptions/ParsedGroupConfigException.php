<?php


namespace Common\Exceptions;


use Throwable;

class ParsedGroupConfigException extends NumberErrorException
{
    const ERROR_RECURSIVE_AND_EQUAL_SIGN = 0;
    protected $_errors = [
        self::ERROR_RECURSIVE_AND_EQUAL_SIGN => 'If is recursive open and close must be different'
    ];
    protected $_title = 'Error in Config ParsedGroup';
}