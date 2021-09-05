<?php


namespace Common\Exceptions;


use Throwable;

class ParsedGroupConfigException extends NumberErrorException
{
    const ERROR_RECURSIVE_AND_EQUAL_SIGN = 0;
    const ERROR_EMPTY_TOKEN = 1;

    protected $_errors = [
        self::ERROR_RECURSIVE_AND_EQUAL_SIGN => 'If is recursive open and close must be different',
        self::ERROR_EMPTY_TOKEN => 'Empty token'
    ];
    protected $_title = 'Error in Config ParsedGroup';
}