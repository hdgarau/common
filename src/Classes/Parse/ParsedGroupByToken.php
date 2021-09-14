<?php


namespace Common\Classes\Parse;


use Common\Exceptions\ParsedGroupConfigException;

class ParsedGroupByToken extends ParsedGroup
{
    protected $_recursive = false;

    public function __construct( string $token)
    {
        if(empty($token))
        {
            throw new ParsedGroupConfigException(ParsedGroupConfigException::ERROR_EMPTY_TOKEN);
        }
        $this->_openSymbol = $token;
        $this->_closeSymbol = $token;
    }
}